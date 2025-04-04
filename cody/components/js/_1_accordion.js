// File#: _1_accordion
// Usage: codyhouse.co/license
(function () {
	var Accordion = function (element) {
		this.element = element;
		this.items = getChildrenByClassName(this.element, 'js-accordion__item');
		this.version = this.element.getAttribute('data-version') ? '-' + this.element.getAttribute('data-version') : '';
		this.showClass = 'accordion' + this.version + '__item--is-open';
		this.animateHeight = (this.element.getAttribute('data-animation') == 'on');
		this.multiItems = !(this.element.getAttribute('data-multi-items') == 'off');
		// deep linking options
		this.deepLinkOn = this.element.getAttribute('data-deep-link') == 'on';
		// init accordion
		this.initAccordion();
	};

	Accordion.prototype.initAccordion = function () {
		//set initial aria attributes
		for (var i = 0; i < this.items.length; i++) {
			var button = this.items[i].getElementsByTagName('button')[0],
				content = this.items[i].getElementsByClassName('js-accordion__panel')[0],
				isOpen = this.items[i].classList.contains(this.showClass) ? 'true' : 'false';
			var data_id = content.getAttribute('data-panel-id') ? content.getAttribute('data-panel-id') : 'accordion-content-' + i;

			button.setAttribute('aria-expanded', isOpen);
			button.setAttribute('aria-controls', data_id);
			button.setAttribute('id', 'accordion-header-' + i);
			button.classList.add('js-accordion__trigger');
			content.setAttribute('aria-labelledby', 'accordion-header-' + i);
			content.setAttribute('id', data_id);


		}

		//listen for Accordion events
		this.initAccordionEvents();

		// check deep linking option
		this.initDeepLink();
	};

	Accordion.prototype.initAccordionEvents = function () {
		var self = this;

		this.element.addEventListener('click', function (event) {
			var trigger = event.target.closest('.js-accordion__trigger');
			//check index to make sure the click didn't happen inside a children accordion
			if (trigger && Array.prototype.indexOf.call(self.items, trigger.parentElement) >= 0) self.triggerAccordion(trigger);
		});
	};

	Accordion.prototype.triggerAccordion = function (trigger) {
		var bool = (trigger.getAttribute('aria-expanded') === 'true');

		this.animateAccordion(trigger, bool, false);

		if (!bool && this.deepLinkOn) {
			history.replaceState(null, '', '#' + trigger.getAttribute('aria-controls'));
		}
	};

	Accordion.prototype.animateAccordion = function (trigger, bool, deepLink) {
		var self = this;
		var item = trigger.closest('.js-accordion__item'),
			content = item.getElementsByClassName('js-accordion__panel')[0],
			ariaValue = bool ? 'false' : 'true';

		if (!bool) item.classList.add(this.showClass);
		trigger.setAttribute('aria-expanded', ariaValue);
		self.resetContentVisibility(item, content, bool);

		if (!this.multiItems && !bool || deepLink) this.closeSiblings(item);
	};

	Accordion.prototype.resetContentVisibility = function (item, content, bool) {
		item.classList.toggle(this.showClass, !bool);
		content.removeAttribute("style");
		if (bool && !this.multiItems) { // accordion item has been closed -> check if there's one open to move inside viewport 
			this.moveContent();
		}
	};

	Accordion.prototype.closeSiblings = function (item) {
		//if only one accordion can be open -> search if there's another one open
		var index = Array.prototype.indexOf.call(this.items, item);
		for (var i = 0; i < this.items.length; i++) {
			if (this.items[i].classList.contains(this.showClass) && i != index) {
				this.animateAccordion(this.items[i].getElementsByClassName('js-accordion__trigger')[0], true, false);
				return false;
			}
		}
	};

	Accordion.prototype.moveContent = function () { // make sure title of the accordion just opened is inside the viewport
		var openAccordion = this.element.getElementsByClassName(this.showClass);
		if (openAccordion.length == 0) return;
		var boundingRect = openAccordion[0].getBoundingClientRect();
		if (boundingRect.top < 0 || boundingRect.top > window.innerHeight) {
			var windowScrollTop = window.scrollY || document.documentElement.scrollTop;
			window.scrollTo(0, boundingRect.top + windowScrollTop);
		}
	};

	Accordion.prototype.initDeepLink = function () {
		if (!this.deepLinkOn) return;
		var hash = window.location.hash.substr(1);
		if (!hash || hash == '') return;
		var trigger = this.element.querySelector('.js-accordion__trigger[aria-controls="' + hash + '"]');
		if (trigger && trigger.getAttribute('aria-expanded') !== 'true') {
			this.animateAccordion(trigger, false, true);
			setTimeout(function () { trigger.scrollIntoView(true); });
		}
	};

	function getChildrenByClassName(el, className) {
		var children = el.children,
			childrenByClass = [];
		for (var i = 0; i < children.length; i++) {
			if (children[i].classList.contains(className)) childrenByClass.push(children[i]);
		}
		return childrenByClass;
	};

	window.Accordion = Accordion;

	//initialize the Accordion objects
	var accordions = document.getElementsByClassName('js-accordion');
	if (accordions.length > 0) {
		for (var i = 0; i < accordions.length; i++) {
			(function (i) { new Accordion(accordions[i]); })(i);
		}
	}
}());