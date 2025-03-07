<?php

/**
 * Template Part Name: Banners
 * Template Part Type: SECTION
 * Template Part Page: Home
 * Description: Responsável por exibir os banners da home.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $conteudo Conteúdo da seção.
 * }
 */
extract($args);
?>
<section class="section-banners-home swiper js-banners-home-swiper">
  <ul class="swiper-wrapper">
    <?= $conteudo ?? ''; ?>
  </ul>
  <div class="js-banners-home-pagination side-navigation"></div>
  <a href="#servicos" class="section-banners-home__seta"> <?= get_svg_content('arrow-banner.svg'); ?> </a>
</section>