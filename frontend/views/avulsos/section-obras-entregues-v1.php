<?php

/**
 * Template Part Name: Obras V1
 * Template Part Type: SECTION
 * Template Part Page: -
 * Description: Seção obras entregues versao 1 carrossel.
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
<section class="section-obras-entregues-v1 bg-primary-darker padding-y-xl padding-y-xxxl@md position-relative z-index-1" style="background-image:url('<?= get_media_src('grade.png'); ?>')">
  <div class="section-obras-entregues-v1__container grid max-width-lg container gap-lg">

    <div class="flex flex-column flex-row@md justify-center justify-between@md items-center gap-md gap-xl@md">

      <div class="flex flex-column items-center items-stretch@md gap-sm">
        <h2 class="section-obras-entregues-v1__titulo-secao">projetos de sucesso</h2>
        <h3 class="section-obras-entregues-v1__subtitulo-secao">Obras entregues</h3>
        <h4 class="section-obras-entregues-v1__slogan-secao">Conheça os projetos de sucesso que já entregamos aos nossos clientes.</h4>
      </div>

      <div class="flex-shrink-0 flex flex-row gap-sm items-center">
        <a href="<?= home_url()?>/obras" class="btn btn--accent btn--ver-obras padding-y-xs padding-x-lg hide block@md">Ver obras</a>
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