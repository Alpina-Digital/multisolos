
/**
 * Template Part Name: Banners
 * Template Part Type: SECTION
 * Template Part Page: Home
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 */

/**
 * Aplica o Swiper dos banners da home, com direito a barra de progresso no bullet ativo.
 * @return void
 */
(function ($) {
  if (!$(".js-banners-home-swiper").length) return;

  new Swiper(".js-banners-home-swiper", {
    slidesPerView: 1,
    effect: 'fade',
    loop: true,
    navigation: {
      nextEl: ".js-banners-home-next",
      prevEl: ".js-banners-home-prev",
    },
    pagination: {
      el: '.js-banners-home-pagination',
      clickable: true,
    },
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    on: {
      init: function () {
        document.querySelector('.js-banners-home-swiper').classList.add('swiper-show');
      },
      resize: function () {
      }
    },
  });

  let currentActiveBulletIndex = -1;

  setInterval(() => {
    let bullets = document.querySelectorAll('.js-banners-home-swiper .swiper-pagination-bullet');
    if (!bullets.length) return;

    for (let i = 0; i < bullets.length; i++) {
      if (bullets[i].classList.contains('swiper-pagination-bullet-active')) {
        if (currentActiveBulletIndex !== i) {
          // Remove a barra de progresso do bullet anteriormente ativo
          if (currentActiveBulletIndex !== -1) {
            let oldProgressBar = bullets[currentActiveBulletIndex].querySelector('.progress-bar');
          }

          // Adiciona a barra de progresso ao bullet ativo
          let progressBar = document.createElement('div');
          progressBar.className = 'progress-bar';

          // Define a duração da animação
          let duration = document.querySelector('.swiper-slide-active').getAttribute('data-swiper-autoplay') / 1000; // Convert ms to s
          progressBar.style.animationDuration = duration + 's';

          bullets[i].appendChild(progressBar);

          currentActiveBulletIndex = i;
        }
        break;
      }
    }
  }, 500);

})(jQuery);