<?php

/**
 * Template Part Name: Confira Também
 * Template Part Type: SECTION
 * Template Part Page: -
 * Description: Mostra as postagens relacionadas ao post atual.
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
<section class="section-confira-tambem bg-cinza-escuro padding-y-xl padding-y-xxl@md">
  <div class="section-confira-tambem__container max-width-lg container flex flex-column gap-lg overflow-hidden">

    <div class="flex gap-xl justify-between items-center">
      <h3 class="titulo-secao"><?= $titulo; ?></h3>
      <div class="section-confira-tambem__btns flex gap-xs items-center">
        <a href="javascript:;" class="section-confira-tambem__prev js-<?= $swiper_class; ?>-prev"><?= get_svg_content('chevron.svg', "", true); ?></a>
        <a href="javascript:;" class="section-confira-tambem__next js-<?= $swiper_class; ?>-next"><?= get_svg_content('chevron.svg', "flip-x", true); ?></a>

      </div>
    </div>

    <div class="js-<?= $swiper_class; ?>-swiper">
      <div class="swiper-wrapper">
        <?= $cards ?? ''; ?>
      </div>
    </div>

    <div class="position-relative hide@md">
      <div class="js-<?= $swiper_class; ?>-pagination swiper-pagination"></div>
    </div>

  </div>
</section>