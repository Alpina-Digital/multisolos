const app = {
    main: {
        init: () => {
            app.common.init();
            app.blocks.init();
            app.pages.init();
        }
    },
    common: {
        init: () => {
            app.common.setupFancybox()
            app.common.setupAOS()
            app.common.setupSubmenuMobileToggle()
            app.common.setupStickyNav()
            app.common.setupTray()
        },
        setupFancybox: () => { Fancybox.bind("[data-fancybox]", {}); },
        setupAOS: () => {
            AOS.init({
                once: true,
                anchorPlacement: 'top-bottom',
            });
        },
        setupSubmenuMobileToggle: () => {
            $(".menu .menu-item-has-children").click(function (e) {
                $(this).toggleClass("is-active")
            })
        },
        setupStickyNav: () => {
            $(window).scroll(function (e) {
                e.preventDefault();
                if ($(window).scrollTop() > 100)
                    $("#masthead").addClass("is-sticky")
                else
                    $("#masthead").removeClass("is-sticky")
            })
        },
        setupTray: () => {
            // toggle
            // $(".tray .tray-arrow").click(function (e) {
            //     e.preventDefault();
            //     $(".tray").toggleClass("is-active")
            // })

            $(".tray").mouseover(function () {
                $(this).addClass("is-active")
            });

            $(".tray").mouseout(function () {
                $(this).removeClass("is-active")
            });

            // move tray-mobile garantindo à bandeja lateral a consistencia de estar no header.php
            // e ao mesmo tempo de aparecer abaixo do hero no mobile das paginas onde há hero.
            if ($(".tray-mobile").length > 0) {
                if ($("section[class*=-hero]").length > 0)
                    $(".tray-mobile").insertAfter($(".f-header__nav")[0])
                else
                    $(".tray-mobile").hide()
            }
        }
    },
    blocks: {
        init: () => {
            if ($(".quemsomos-timeline").length)
                app.blocks.setupSobreTimeline();
            if ($(".soja-cultivares").length)
                app.blocks.setupSojaCultivares();
            if ($(".block-gallery").length)
                app.blocks.setupBlockGallery();
            if ($(".milho-menu").length)
                app.blocks.setupMilhoMenu();
            if ($(".home-destaques").length)
                app.blocks.setupHomeDestaques();
            if ($(".quemsomos-unidades").length)
                app.blocks.setupSobreUnidadesNegocio();
        },
        setupSobreTimeline: () => {
            $(".quemsomos-timeline .timeline-card-slick").slick({
                slidesToShow: 1,
                arrows: false,
                dots: true
            })

            const $timelineslick = $(".quemsomos-timeline .timeline-slick");
            $timelineslick.on('beforeChange', function (e, slick, current, next) {
                console.log(next);
                $slidenav.find(".slick-current").removeClass("slick-current")
                $($slidenav.slick('getSlick').$slides[next]).addClass("slick-current")
            })
            $timelineslick.slick({
                ...slickSettings,
                slidesToShow: 1,
                infinite: false,
            });

            const $slidenav = $(".quemsomos-timeline .slide-navigation");
            $slidenav.slick({
                ...slickSettings,
                slidesToShow: 8,
                slidesToScroll: 1,
                infinite: false,
            })
            $slidenav.find("a").click(function (e) {
                e.preventDefault();
                let $this = $(this);
                let index = $this.closest(".slide").index();
                $timelineslick.slick("slickGoTo", index);
            })

        },
        setupSojaCultivares: () => {
            $(".soja-cultivares .slick").slick({
                ...slickSettings,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [
                    {
                        'breakpoint': 500,
                        'settings': {
                            arrows: false,
                            slidesToShow: 1.4,
                            slidesToScroll: 1,
                            swipeToSlide: true,
                            infinite: false,
                        }
                    },
                    {
                        'breakpoint': 800,
                        'settings': {
                            arrows: false,
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            swipeToSlide: true,
                            infinite: false,
                        }
                    }
                ]
            })
        },
        setupBlockGallery: () => {
            $(".block-gallery .slick").slick({
                prevArrow: '<button type="button" class="slick-prev"><svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">\
                            <g filter="url(#filter0_b_5811_804)">\
                            <rect x="44" y="44" width="44" height="44" rx="22" transform="rotate(-180 44 44)" fill="#14203A" fill-opacity="0.29"/>\
                            <path d="M15.334 22L28.6662 22M15.334 22L20.3336 27M15.334 22L20.3336 17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>\
                            </g><defs>\
                            <filter id="filter0_b_5811_804" x="-8" y="-8" width="60" height="60" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">\
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>\
                            <feGaussianBlur in="BackgroundImageFix" stdDeviation="4"/>\
                            <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_5811_804"/>\
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_5811_804" result="shape"/>\
                            </filter></defs></svg></button>',
                nextArrow: '<button type="button" class="slick-next"><svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">\
                            <g filter="url(#filter0_b_5811_806)">\
                            <rect width="44" height="44" rx="22" fill="#14203A" fill-opacity="0.29"/>\
                            <path d="M28.666 22H15.3338M28.666 22L23.6664 17M28.666 22L23.6664 27" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>\
                            </g>\
                            <defs>\
                            <filter id="filter0_b_5811_806" x="-8" y="-8" width="60" height="60" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">\
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>\
                            <feGaussianBlur in="BackgroundImageFix" stdDeviation="4"/>\
                            <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_5811_806"/>\
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_5811_806" result="shape"/>\
                            </filter></defs></svg></button>',

                centerMode: true,
                variableWidth: true,
                appendArrows: $(".block-gallery .arrow-wrapper"),
                responsive: [
                    {
                        'breakpoint': 500,
                        'settings': {
                            arrows: false,
                        }
                    }
                ]
            })
        },
        setupMilhoMenu: () => {
            const $mm = $(".milho-menu");
            $(window).on('scroll', function () {
                if ($mm.offset().top == $(window).scrollTop() + $("#masthead").height())
                    $mm.addClass("is-sticked")
                else
                    $mm.removeClass("is-sticked")
            })
        },
        setupHomeDestaques: () => {
            $(".home-destaques .slick").slick({
                ...slickSettings,
                slidesToShow: 3,
                responsive: [
                    {
                        'breakpoint': 500,
                        'settings': {
                            arrows: false,
                            slidesToShow: 1.4,
                            slidesToScroll: 1,
                            swipeToSlide: true,
                            infinite: false,
                        }
                    }
                ]
            })
        },
        setupSobreUnidadesNegocio: () => {
            $(".quemsomos-unidades .slick").slick({
                ...slickSettings,
                slidesToShow: 2,
                responsive: [
                    {
                        'breakpoint': 500,
                        'settings': {
                            arrows: false,
                            slidesToShow: 1.2,
                            slidesToScroll: 1,
                            swipeToSlide: true,
                            infinite: false,
                        }
                    }
                ]
            });
        },
    },
    pages: {
        init: () => {
            if ($("body").hasClass("single-post")) {
                app.pages.setupSinglePost()
            }
        },
        setupSinglePost: () => {
            $(".related .slick").slick({
                ...slickSettings,
                slidesToShow: 3,
                responsive: [
                    {
                        'breakpoint': 500,
                        'settings': {
                            arrows: false,
                            slidesToShow: 1.4,
                            slidesToScroll: 1,
                            swipeToSlide: true,
                            infinite: false,
                        }
                    }
                ]
            })
        }
    }
}

const slickSettings = {
    prevArrow: '<button type="button" class="slick-prev"><svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">\
                <rect x="35.5" y="35.5" width="35" height="35" rx="17.5" transform="rotate(-180 35.5 35.5)" stroke="#9B9B97" stroke-opacity="0.5"/>\
                <path d="M11.334 18L24.6662 18M11.334 18L16.3336 23M11.334 18L16.3336 13" stroke="#5E5E5A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>\
                </svg></button>',
    nextArrow: '<button type="button" class="slick-next"><svg width="37" height="36" viewBox="0 0 37 36" fill="none" xmlns="http://www.w3.org/2000/svg">\
                <rect x="1" y="0.5" width="35" height="35" rx="17.5" stroke="#9B9B97" stroke-opacity="0.5"/>\
                <path d="M25.166 18H11.8338M25.166 18L20.1664 13M25.166 18L20.1664 23" stroke="#5E5E5A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>\
                </svg></button>'
}

const $ = jQuery.noConflict();
$(app.main.init);
