/**
 * Funções para SwiperJS
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 */

/**
 * Ajusta a altura do SwiperJS para que todos os slides tenham a mesma altura.
 * @param string seletor Seletor do swiper
 */
function ajustar_altura_slides(seletor) {
  // Obter todos os slides
  const slides = document.querySelectorAll(`${seletor} .swiper-slide`);
  let altura_maxima = 0;

  // Encontrar o maior slide
  slides.forEach(slide => {
    altura_maxima = Math.max(altura_maxima, slide.clientHeight);
  });

  // Definir a altura de todos os slides para o valor máximo
  slides.forEach(slide => {
    slide.style.height = `${altura_maxima}px`;
  });
}