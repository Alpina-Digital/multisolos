<?php

/**
 * Template Part Name: Equipamentos
 * Template Part Type: SECTION
 * Template Part Page: Avulsos
 * Description: Seção equipamentos com um swiper de cards.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $cards Cards de obras.
 * }
 */
extract($args); ?>
<section class="section-equipamentos bg-white padding-y-xl padding-y-xxxl@md position-relative z-index-1">
  <div class="section-equipamentos__container grid max-width-lg container gap-lg">

    <div class="flex flex-column flex-row@md justify-center justify-between@md items-center gap-md gap-xl@md">

      <div class="flex flex-column items-center items-stretch@md gap-sm">
        <h2 class="section-equipamentos__titulo-secao">infraestrutura</h2>
        <h3 class="section-equipamentos__subtitulo-secao">Equipamentos</h3>
        <h4 class="section-equipamentos__slogan-secao">Possuímos uma linha completa e moderna de equipamentos para oferecer a melhor precisão na execução dos serviços</h4>
      </div>

      <div class="flex-shrink-0 flex flex-row gap-sm items-center hide block@md">
        <a href="javascript:;" class="btn btn--swiper padding-x-0 js-<?= $swiper_class; ?>-prev flex-shrink-0">
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