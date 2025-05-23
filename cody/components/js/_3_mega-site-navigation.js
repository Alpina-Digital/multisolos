// File#: _3_mega-site-navigation
// Usage: codyhouse.co/license
(function () {
  var MegaNav = function (element) {
    this.element = element;
    this.search = this.element.getElementsByClassName('js-mega-nav__search');
    this.searchActiveController = false;
    this.menu = this.element.getElementsByClassName('js-mega-nav__nav');
    this.menuItems = this.menu[0].getElementsByClassName('js-mega-nav__item');
    this.menuActiveController = false;
    this.itemExpClass = 'mega-nav__item--expanded';
    this.classIconBtn = 'mega-nav__icon-btn--state-b';
    this.classSearchVisible = 'mega-nav__search--is-visible';
    this.classNavVisible = 'mega-nav__nav--is-visible';
    this.classMobileLayout = 'mega-nav--mobile';
    this.classDesktopLayout = 'mega-nav--desktop';
    this.layout = 'mobile';
    // store dropdown elements (if present)
    this.dropdown = this.element.getElementsByClassName('js-dropdown');
    // expanded class - added to header when subnav is open
    this.expandedClass = 'mega-nav--expanded';
    // check if subnav should open on hover
    this.hover = this.element.getAttribute('data-hover') && this.element.getAttribute('data-hover') == 'on';
    initMegaNav(this);
  };

  function initMegaNav(megaNav) {
    setMegaNavLayout(megaNav); // switch between mobile/desktop layout
    initSearch(megaNav); // controll search navigation
    initMenu(megaNav); // control main menu nav - mobile only
    initSubNav(megaNav); // toggle sub navigation visibility

    megaNav.element.addEventListener('update-menu-layout', function (event) {
      setMegaNavLayout(megaNav); // window resize - update layout
    });
  };

  function setMegaNavLayout(megaNav) {
    var layout = getComputedStyle(megaNav.element, ':before').getPropertyValue('content').replace(/\'|"/g, '');
    if (layout == megaNav.layout) return;
    megaNav.layout = layout;
    megaNav.element.classList.toggle(megaNav.classDesktopLayout, megaNav.layout == 'desktop');
    megaNav.element.classList.toggle(megaNav.classMobileLayout, megaNav.layout != 'desktop');
    if (megaNav.layout == 'desktop') {
      closeSubNav(megaNav, false);
      // if the mega navigation has dropdown elements -> make sure they are in the right position (viewport awareness)
      triggerDropdownPosition(megaNav);
    }
    closeSearch(megaNav, false);
    resetMegaNavOffset(megaNav); // reset header offset top value
    resetNavAppearance(megaNav); // reset nav expanded appearance
  };

  function resetMegaNavOffset(megaNav) {
    document.documentElement.style.setProperty('--mega-nav-offset-y', megaNav.element.getBoundingClientRect().top + 'px');
  };

  function closeNavigation(megaNav) { // triggered by Esc key press
    // close search
    closeSearch(megaNav);
    // close nav
    if (megaNav.menu[0].classList.contains(megaNav.classNavVisible)) {
      toggleMenu(megaNav, megaNav.menu[0], 'menuActiveController', megaNav.classNavVisible, megaNav.menuActiveController, true);
    }
    //close subnav 
    closeSubNav(megaNav, false);
    resetNavAppearance(megaNav); // reset nav expanded appearance
  };

  function closeFocusNavigation(megaNav) { // triggered by Tab key pressed
    // close search when focus is lost
    if (megaNav.search[0].classList.contains(megaNav.classSearchVisible) && !document.activeElement.closest('.js-mega-nav__search')) {
      toggleMenu(megaNav, megaNav.search[0], 'searchActiveController', megaNav.classSearchVisible, megaNav.searchActiveController, true);
    }
    // close nav when focus is lost
    if (megaNav.menu[0].classList.contains(megaNav.classNavVisible) && !document.activeElement.closest('.js-mega-nav__nav')) {
      toggleMenu(megaNav, megaNav.menu[0], 'menuActiveController', megaNav.classNavVisible, megaNav.menuActiveController, true);
    }
    // close subnav when focus is lost
    for (var i = 0; i < megaNav.menuItems.length; i++) {
      if (!megaNav.menuItems[i].classList.contains(megaNav.itemExpClass)) continue;
      var parentItem = document.activeElement.closest('.js-mega-nav__item');
      if (parentItem && parentItem == megaNav.menuItems[i]) continue;
      closeSingleSubnav(megaNav, i);
    }
    resetNavAppearance(megaNav); // reset nav expanded appearance
  };

  function closeSearch(megaNav, bool) {
    if (megaNav.search.length < 1) return;
    if (megaNav.search[0].classList.contains(megaNav.classSearchVisible)) {
      toggleMenu(megaNav, megaNav.search[0], 'searchActiveController', megaNav.classSearchVisible, megaNav.searchActiveController, bool);
    }
  };

  function initSearch(megaNav) {
    if (megaNav.search.length == 0) return;
    // toggle search
    megaNav.searchToggles = document.querySelectorAll('[aria-controls="' + megaNav.search[0].getAttribute('id') + '"]');
    for (var i = 0; i < megaNav.searchToggles.length; i++) {
      (function (i) {
        megaNav.searchToggles[i].addEventListener('click', function (event) {
          // toggle search
          toggleMenu(megaNav, megaNav.search[0], 'searchActiveController', megaNav.classSearchVisible, megaNav.searchToggles[i], true);
          // close nav if it was open
          if (megaNav.menu[0].classList.contains(megaNav.classNavVisible)) {
            toggleMenu(megaNav, megaNav.menu[0], 'menuActiveController', megaNav.classNavVisible, megaNav.menuActiveController, false);
          }
          // close subnavigation if open
          closeSubNav(megaNav, false);
          resetNavAppearance(megaNav); // reset nav expanded appearance
        });
      })(i);
    }
  };

  function initMenu(megaNav) {
    if (megaNav.menu.length == 0) return;
    // toggle nav
    megaNav.menuToggles = document.querySelectorAll('[aria-controls="' + megaNav.menu[0].getAttribute('id') + '"]');
    for (var i = 0; i < megaNav.menuToggles.length; i++) {
      (function (i) {
        megaNav.menuToggles[i].addEventListener('click', function (event) {
          // toggle nav
          toggleMenu(megaNav, megaNav.menu[0], 'menuActiveController', megaNav.classNavVisible, megaNav.menuToggles[i], true);
          // close search if it was open
          if (megaNav.search[0].classList.contains(megaNav.classSearchVisible)) {
            toggleMenu(megaNav, megaNav.search[0], 'searchActiveController', megaNav.classSearchVisible, megaNav.searchActiveController, false);
          }
          resetNavAppearance(megaNav); // reset nav expanded appearance
        });
      })(i);
    }
  };

  function toggleMenu(megaNav, element, controller, visibleClass, toggle, moveFocus) {
    var menuIsVisible = element.classList.contains(visibleClass);
    element.classList.toggle(visibleClass, !menuIsVisible);
    toggle.classList.toggle(megaNav.classIconBtn, !menuIsVisible);
    menuIsVisible ? toggle.removeAttribute('aria-expanded') : toggle.setAttribute('aria-expanded', 'true');
    if (menuIsVisible) {
      if (toggle && moveFocus) toggle.focus();
      megaNav[controller] = false;
    } else {
      if (toggle) megaNav[controller] = toggle;
      getFirstFocusable(element).focus(); // move focus to first focusable element
    }
  };

  function getFirstFocusable(element) {
    var focusableEle = element.querySelectorAll('[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex]:not([tabindex="-1"]), [contenteditable], audio[controls], video[controls], summary'),
      firstFocusable = false;
    for (var i = 0; i < focusableEle.length; i++) {
      if (focusableEle[i].offsetWidth || focusableEle[i].offsetHeight || focusableEle[i].getClientRects().length) {
        firstFocusable = focusableEle[i];
        break;
      }
    }
    return firstFocusable;
  };

  function initSubNav(megaNav) {
    // toggle subnavigation visibility
    megaNav.element.addEventListener('click', function (event) {
      toggleSubNav(megaNav, event, 'click');
    });

    if (megaNav.hover) { // data-hover="on" => use mouse events 
      megaNav.element.addEventListener('mouseover', function (event) {
        if (megaNav.layout != 'desktop') return;
        toggleSubNav(megaNav, event, 'mouseover')
      });

      megaNav.element.addEventListener('mouseout', function (event) {
        if (megaNav.layout != 'desktop') return;
        var mainItem = event.target.closest('.js-mega-nav__item');
        if (!mainItem) return;
        var triggerBtn = mainItem.getElementsByClassName('js-mega-nav__control');
        if (triggerBtn.length < 1) return;
        var itemExpanded = mainItem.classList.contains(megaNav.itemExpClass);
        if (!itemExpanded) return;
        var mainItemHover = event.relatedTarget;
        if (mainItemHover && mainItem.contains(mainItemHover)) return;

        mainItem.classList.toggle(megaNav.itemExpClass, !itemExpanded);
        itemExpanded ? triggerBtn[0].removeAttribute('aria-expanded') : triggerBtn[0].setAttribute('aria-expanded', 'true');
      });
    }
  };

  function toggleSubNav(megaNav, event, eventType) {
    var triggerBtn = event.target.closest('.js-mega-nav__control');
    if (!triggerBtn) return;
    var mainItem = triggerBtn.closest('.js-mega-nav__item');
    if (!mainItem) return;
    var itemExpanded = mainItem.classList.contains(megaNav.itemExpClass);
    if (megaNav.hover && itemExpanded && megaNav.layout == 'desktop' && eventType != 'click') return;
    mainItem.classList.toggle(megaNav.itemExpClass, !itemExpanded);
    itemExpanded ? triggerBtn.removeAttribute('aria-expanded') : triggerBtn.setAttribute('aria-expanded', 'true');
    if (megaNav.layout == 'desktop' && !itemExpanded) closeSubNav(megaNav, mainItem);
    // close search if open
    closeSearch(megaNav, false);
    resetNavAppearance(megaNav); // reset nav expanded appearance
  };

  function closeSubNav(megaNav, selectedItem) {
    // close subnav when a new sub nav element is open
    if (megaNav.menuItems.length == 0) return;
    for (var i = 0; i < megaNav.menuItems.length; i++) {
      if (megaNav.menuItems[i] != selectedItem) closeSingleSubnav(megaNav, i);
    }
  };

  function closeSingleSubnav(megaNav, index) {
    megaNav.menuItems[index].classList.remove(megaNav.itemExpClass);
    var triggerBtn = megaNav.menuItems[index].getElementsByClassName('js-mega-nav__control');
    if (triggerBtn.length > 0) triggerBtn[0].removeAttribute('aria-expanded');
  };

  function triggerDropdownPosition(megaNav) {
    // emit custom event to properly place dropdown elements - viewport awarness
    if (megaNav.dropdown.length == 0) return;
    for (var i = 0; i < megaNav.dropdown.length; i++) {
      megaNav.dropdown[i].dispatchEvent(new CustomEvent('placeDropdown'));
    }
  };

  function resetNavAppearance(megaNav) {
    ((megaNav.element.getElementsByClassName(megaNav.itemExpClass).length > 0 && megaNav.layout == 'desktop') || megaNav.element.getElementsByClassName(megaNav.classSearchVisible).length > 0 || (megaNav.element.getElementsByClassName(megaNav.classNavVisible).length > 0 && megaNav.layout == 'mobile'))
      ? megaNav.element.classList.add(megaNav.expandedClass)
      : megaNav.element.classList.remove(megaNav.expandedClass);
  };

  //initialize the MegaNav objects
  var megaNav = document.getElementsByClassName('js-mega-nav');
  if (megaNav.length > 0) {
    var megaNavArray = [];
    for (var i = 0; i < megaNav.length; i++) {
      (function (i) { megaNavArray.push(new MegaNav(megaNav[i])); })(i);
    }

    // key events
    window.addEventListener('keyup', function (event) {
      if ((event.keyCode && event.keyCode == 27) || (event.key && event.key.toLowerCase() == 'escape')) { // listen for esc key events
        for (var i = 0; i < megaNavArray.length; i++) {
          (function (i) {
            closeNavigation(megaNavArray[i]);
          })(i);
        }
      }
      // listen for tab key
      if ((event.keyCode && event.keyCode == 9) || (event.key && event.key.toLowerCase() == 'tab')) { // close search or nav if it looses focus
        for (var i = 0; i < megaNavArray.length; i++) {
          (function (i) {
            closeFocusNavigation(megaNavArray[i]);
          })(i);
        }
      }
    });

    // Scroll events
    window.addEventListener('scroll', function () {
      var scrollPosition = window.scrollY || document.documentElement.scrollTop;
      if (scrollPosition > 400) { // Verifica se o scroll é maior que 100px
        for (var i = 0; i < megaNavArray.length; i++) {
          closeNavigation(megaNavArray[i]);
        }
      }
    }, { passive: true }); // Use the passive option to not block the main thread

    const megaCloseBtn = document.getElementsByClassName('js-mega__close-btn');
    Array.from(megaCloseBtn).forEach(element => {
      element.addEventListener('click', function (event) {
        for (var i = 0; i < megaNavArray.length; i++) {
          closeNavigation(megaNavArray[i]);
        }
      });
    });

    window.addEventListener('click', function (event) {
      if (!event.target.closest('.js-mega-nav')) closeNavigation(megaNavArray[0]);
    });

    // resize - update menu layout
    var resizingId = false,
      customEvent = new CustomEvent('update-menu-layout');
    window.addEventListener('resize', function (event) {
      clearTimeout(resizingId);
      resizingId = setTimeout(doneResizing, 200);
    });

    function doneResizing() {
      for (var i = 0; i < megaNavArray.length; i++) {
        (function (i) { megaNavArray[i].element.dispatchEvent(customEvent) })(i);
      };
    };

    (window.requestAnimationFrame) // init mega site nav layout
      ? window.requestAnimationFrame(doneResizing)
      : doneResizing();
  }
}());