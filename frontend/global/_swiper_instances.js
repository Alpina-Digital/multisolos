(function ($) {
  /**
   * Adiciona um novo Swiper.
   * @param {string} miolo Miolo do nome do Swiper. Ex: 'home-galeria' para um Swiper com a classe .js-home-galeria-swiper.
   * @param {object} configs Configurações do Swiper, sobrescrevendo as configurações padrão.
   * @param {boolean} ajustar_altura Se deve ajustar a altura dos slides para serem iguais.
   * @returns {Swiper} Instância do Swiper criado.
   */
  function adicionar_swiper(miolo, configs = {}) {
    if (!$(`.js-${miolo}-swiper`).length) return;

    return new Swiper(`.js-${miolo}-swiper`, {
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
  }

  adicionar_swiper('confia', {
    slidesPerView: 4,
    spaceBetween: 24,
    loop: true,
    breakpoints: {}
  });

  adicionar_swiper('nos-diferencia', {
    slidesPerView: 1,
    spaceBetween: 24,
    loop: false,
    breakpoints: {}
  });

  adicionar_swiper('reconhecimentos', {
    slidesPerView: 'auto',
    spaceBetween: 48,
    loop: true,
    breakpoints: {}
  });

  adicionar_swiper('depoimentos', {
    loop: true,
    slidesPerView: 1.3,
    breakpoints: {
      1024: {
        slidesPerView: 2,
        spaceBetween: 32,
      }
    }
  });

  adicionar_swiper('galeria-projeto', {
    loop: true,
    breakpoints: {}
  });

  adicionar_swiper('blog-cards');

})(jQuery);