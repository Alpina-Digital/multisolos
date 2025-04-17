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
<section class="section-obras-entregues-v1 bg-azul-escuro padding-y-xl padding-y-xxxl@md">
  <div class="max-width-lg container gap-lg">

    <div class="flex flex-column flex-row@md justify-center margin-bottom-md justify-between@md items-end">

      <div class="flex flex-column items-stretch@md gap-xs">
        <h2 class="section-obras-entregues-v1__titulo-secao">projetos de sucesso</h2>
        <h3 class="section-obras-entregues-v1__subtitulo-secao">Obras entregues</h3>
        <h4 class="section-obras-entregues-v1__frase-secao">Conheça os projetos de sucesso que já entregamos aos nossos clientes.</h4>
      </div>

      <div class="hide block@md">
        <div class="flex-shrink-0 flex flex-row gap-xs items-center">
          <a href="<?= home_url() ?>/obras" class="btn btn--accent btn--ver-obras bg-transparent padding-y-xs padding-x-md block@md">Ver obras <?= get_svg_content('arrow-diagonal.svg', 'svg', true) ?></a>
          <a href="javascript:;" class="btn btn--swiper padding-x-0 js-<?= $swiper_class; ?>-prev flex-shrink-0">
            <?= get_svg_content('chevron.svg', "flip-x", true); ?>
          </a>
          <a href="javascript:;" class="btn btn--swiper  padding-x-0 js-<?= $swiper_class; ?>-next flex-shrink-0">
            <?= get_svg_content('chevron.svg', "", true); ?>
          </a>
        </div>
      </div>

    </div>

    <div class="js-<?= $swiper_class; ?>-swiper">
      <div class="swiper-wrapper">
        <?= $cards ?? ''; ?>
      </div>
    </div>

    <div class="hide@md margin-top-lg">
      <a href="<?= home_url() ?>/obras" class="btn btn--accent btn--ver-obras bg-transparent padding-y-xs padding-x-md block@md">Ver obras <?= get_svg_content('arrow-right-up-white.svg', '', true) ?></a>
    </div>

  </div>
</section>