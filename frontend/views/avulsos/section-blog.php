<?php

/**
 * Template Part Name: Blog
 * Template Part Type: SECTION
 * Template Part Page: -
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $cards Cards do blog.
 * }
 */
extract($args); ?>
<section class="section-blog bg-cinza-escuro-ultra padding-top-xl padding-top-xxxl@md padding-bottom-xl padding-bottom-xxl@md position-relative z-index-1">
  <div class="section-blog__container grid max-width-lg container gap-lg overflow-hidden">

    <div class="col-12 flex@md justify-between items-end">
      <div class="flex flex-column gap-sm">
        <h2 class="subtitulo-secao">Notícias</h2>
        <h3 class="titulo-secao">Acompanhe as novidades</h3>
        <p class="chamada">Saiba tudo o que está acontecendo na Multisolos.</p>
      </div>
      <a href="/blog" class="section-blog__btn-ver-tudo btn btn--accent btn--sm"> Ver tudo <?= get_svg_content('arrow__right_up.svg', 'svg', 'true'); ?> </a>
    </div>

    <div class="js-<?= $swiper_class; ?>-swiper">
      <div class="swiper-wrapper">
        <?= $cards ?? ''; ?>
      </div>
    </div>

  </div>
</section>