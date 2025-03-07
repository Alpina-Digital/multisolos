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
        <h2 class="subtitulo-secao">Nosso Blog</h2>
        <h3 class="titulo-secao">Leia mais sobre energia solar</h3>
      </div>
      <a href="/blog" class="btn btn--accent padding-y-xs padding-x-lg hide block@md"> Ver todos </a>
    </div>

    <div class="js-<?= $swiper_class; ?>-swiper">
      <div class="swiper-wrapper">
        <?= $cards ?? ''; ?>
      </div>
    </div>

    <div class="position-relative hide@md">
      <div class="js-<?= $swiper_class; ?>-pagination section-blog__pagination"></div>
    </div>

    <a href="/blog" class="btn btn--accent padding-y-xs padding-x-lg hide@md"> Ver todos </a>

  </div>
</section>