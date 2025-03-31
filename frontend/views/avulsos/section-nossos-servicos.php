<?php

/**
 * Template Part Name: Nossos serviços
 * Template Part Type: SECTION
 * Template Part Page: Avulsos
 * Description: Seção serviços com um swiper de cards.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $cards Cards de serviços.
 * }
 */
extract($args); ?>
<section class="section-nossos-servicos bg-cinza-escuro-ultra padding-y-xl padding-y-xxxl@md position-relative z-index-1">
  <div class="section-nossos-servicos__container grid max-width-lg container gap-lg">

    <div class="flex flex-column flex-row@md justify-center justify-between@md items-center gap-md gap-xl@md">

      <div class="flex flex-column items-center items-stretch@md gap-sm">
        <h2 class="section-nossos-servicos__titulo-secao">estaqueamento e sondagem</h2>
        <h3 class="section-nossos-servicos__subtitulo-secao">Nossos serviços</h3>
      </div>

      <div class="flex-shrink-0 flex flex-row gap-sm items-center">
        <a href="javascript:;" class="btn btn--swiper  padding-x-0 js-<?= $swiper_class; ?>-prev flex-shrink-0">
          <?= get_svg_content('chevron.svg', "flip-x", true); ?>
        </a>
        <a href="javascript:;" class="btn btn--swiper  padding-x-0 js-<?= $swiper_class; ?>-next flex-shrink-0">
          <?= get_svg_content('chevron.svg', "", true); ?>
        </a>
      </div>

    </div>

    <div class="col-12 col-12@md overflow-hidden">
      <div class="js-<?= $swiper_class; ?>-swiper">
        <div class="swiper-wrapper">
          <?= $cards ?? ''; ?>
        </div>
      </div>
    </div>

  </div>
</section>