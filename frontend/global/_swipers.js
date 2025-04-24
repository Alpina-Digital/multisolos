(function ($) {

  /**
   * Ajusta todos os slides para terem a mesma altura.
   * @param {string} seletor - Seletor do Swiper.
   *
   * Busca todos os .swiper-slide dentro do Swiper e ajusta a altura de todos para ser igual ao maior slide.
   */
  function ajustar_altura_slides(seletor) {
    const slides = document.querySelectorAll(`${seletor} .swiper-slide`);
    let altura_maxima = 0;

    slides.forEach(slide => {
      altura_maxima = Math.max(altura_maxima, slide.clientHeight);
    });

    slides.forEach(slide => {
      slide.style.height = `${altura_maxima}px`;
    });
  }

  /**
   * Adiciona um novo Swiper.
   * @param {string} miolo Miolo do nome do Swiper. Ex: 'home-galeria' para um Swiper com a classe .js-home-galeria-swiper.
   * @param {object} configs Configurações do Swiper, sobrescrevendo as configurações padrão.
   * @returns {Swiper} Instância do Swiper criado.
   */
  function adicionar_swiper(miolo, configs = {}) {
    if (!$(`.js-${miolo}-swiper`).length) return;

    const slides = document.querySelectorAll(`.js-${miolo}-swiper .swiper-slide`).length;

    if (slides <= 1) {
      configs.loop = false;
      configs.autoplay = false;
      configs.allowTouchMove = false;
      document.querySelector(`.js-${miolo}-next`).style.display = 'none';
      document.querySelector(`.js-${miolo}-prev`).style.display = 'none';
      document.querySelectorAll(`.js-${miolo}-swiper .block-galeria__zoom`).forEach(element => {
        element.style.display = 'none';
      });
    }

    const swiper = new Swiper(`.js-${miolo}-swiper`, {
      slidesPerView: 1,
      spaceBetween: 24,
      navigation: {
        nextEl: `.js-${miolo}-next`,
        prevEl: `.js-${miolo}-prev`,
      },
      pagination: {
        el: `.js-${miolo}-pagination`,
        clickable: true
      },
      autoHeight: false,
      breakpoints: {
        640: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        }
      },
      on: {
        init: function () {
          document.querySelector(`.js-${miolo}-swiper`).classList.add('swiper-show');
        }
      },
      ...configs
    });

    // var slidesCount = swiper.slides.filter(slide => slide.originalIndex !== undefined).length;

    // if (slidesCount <= 1) {
    //   document.querySelector('.swiper-button-prev').style.display = 'none';
    //   document.querySelector('.swiper-button-next').style.display = 'none';

    //   swiperOptions.loop = false;
    //   swiperOptions.autoplay = false;
    //   swiperOptions.allowTouchMove = false;
    // }

    return swiper;
  }

  adicionar_swiper('obras');
  adicionar_swiper('nossos-servicos',
    {
      slidesPerView: 3,
      loop: false,
      breakpoints: {}
    }
  );
  adicionar_swiper('redes-sociais',
    {
      slidesPerView: 1,
      loop: false,
      breakpoints: {
        // 0: {
        //   slidesPerView: 1,
        //   spaceBetween: 6
        // },
        768: {
          slidesPerView: 3,
          spaceBetween: 16
        }
      }
    }
  );
  adicionar_swiper('obras-entregues-v1',
    {
      slidesPerView: 3,
      loop: false,
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 6
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 16
        }
      }
    }
  );


  adicionar_swiper('equipamentos',
    {
      slidesPerView: 3,
      loop: false,
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 6
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 16
        }
      }
    }
  );

  adicionar_swiper('slides-sobre-servico',
    {
      slidesPerView: 1,
      spaceBetween: 24,
      loop: true,
      breakpoints: {}
    }
  );

  // Galeria da obras entregues v2
  document.querySelectorAll('[class*="js-obra-"][class*="-swiper"]').forEach(function (swiperEl) {
    const classes = Array.from(swiperEl.classList);
    const mioloClass = classes.find(cl => cl.startsWith('js-obra-') && cl.endsWith('-swiper'));

    if (mioloClass) {
      const miolo = mioloClass.replace('js-', '').replace('-swiper', '');
      adicionar_swiper(miolo, {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: false,
        breakpoints: {}
      });
    }
  });

  adicionar_swiper('quem-somos-sobre',
    {
      slidesPerView: 1,
      spaceBetween: 24,
      loop: false,
      breakpoints: {}
    }
  );

  /**
   * Configurações do Swiper de galeria.
   */
  const config_galeria = {
    loop: true,
    spaceBetween: 0,
    breakpoints: {}
  };



})(jQuery);