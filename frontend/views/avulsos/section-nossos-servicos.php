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

<section class="section-nossos-servicos bg-cinza-escuro-ultra padding-y-xl padding-y-xxxl@md" id="servicos">
  <div class="max-width-lg container gap-lg">

    <div class="flex flex-column flex-row@md justify-center margin-bottom-md justify-between@md items-end@md">

      <div class="flex flex-column items-stretch@md gap-sm">
        <h2 class="section-nossos-servicos__titulo-secao"><?= $titulo_secao ?></h2>
        <h3 class="section-nossos-servicos__subtitulo-secao">Nossos serviços</h3>
        <h4 class="section-nossos-servicos__frase-secao"><?= $subtitulo_secao ?></h4>
      </div>

      <div class="hide block@md">
        <div class="flex-shrink-0 flex flex-row gap-xs items-center">
          <a href="javascript:;" class="btn btn--swiper  padding-x-0 js-<?= $swiper_class; ?>-prev flex-shrink-0">
            <?= get_svg_content('chevron.svg', "flip-x", true); ?>
          </a>
          <a href="javascript:;" class="btn btn--swiper  padding-x-0 js-<?= $swiper_class; ?>-next flex-shrink-0">
            <?= get_svg_content('chevron.svg', "", true); ?>
          </a>
        </div>
      </div>

    </div>

    <div class="js-<?= $swiper_class; ?>-swiper hide block@md">
      <div class="swiper-wrapper">
        <?= $cards ?? ''; ?>
      </div>
    </div>

    <div class="hide@md flex flex-column gap-md">
      <?= $cards ?? ''; ?>
    </div>

  </div>
</section>