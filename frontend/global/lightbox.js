/**
 * 
 */
(function ($) {
  const duplicados = $('.swiper-slide-duplicate');
  if (!duplicados.length) return;

  duplicados.each(function () {
    const lightboxItem = $(this).find('[data-lightbox-item]');
    const lightboxItemId = lightboxItem.data('lightbox-item');

    lightboxItem.on('click', function (e) {
      $(`.swiper-slide:not(.swiper-slide-duplicate) [data-lightbox-item="${lightboxItemId}"]`)[0].click();
    });
  });

})(jQuery);

/**
 * 
 */
(function ($) {
  const lightbox = $('.block-lightbox');
  if (!lightbox.length) return;

  lightbox.on('click', function (e) {
    const targetClasses = ['lightbox__header', 'lightbox__body', 'lightbox__footer', 'lightbox_thumb-nav'];
    console.log(e.target);

    if (e.target === this || targetClasses.some(cls => $(e.target).hasClass(cls))) {
      $(this).find('.js-modal__close').click();
    }
  });


})(jQuery);