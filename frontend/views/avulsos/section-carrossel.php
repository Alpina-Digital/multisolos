<?php

/**
 * Template Part Name: Carrossel
 * Template Part Type: SECTION
 * Template Part Page: Avulsos
 * Description: Seção com um swiper de cards.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da seção
 *  @var string $texto Texto da seção
 *  @var string $cards Cards do carrossel
 *  @var string $swiper_class Classe do swiper
 * }
 */
extract($args);
?>
<section class="section-carrossel <?= $darker ? 'bg-cinza-claro' : ''; ?> padding-y-lg padding-y-xl@md overflow-hidden">
  <div class="max-width-lg container flex flex-column gap-md">

    <div class="flex flex-column flex-row@md justify-center justify-between@md items-center gap-md gap-xl@md">
      <div class="flex flex-column items-center items-stretch@md gap-sm">
        <?php if (!empty($titulo)): ?>
          <h2 class="titulo-secao text-center text-left@md"><?= $titulo; ?></h2>
        <?php endif; ?>
        <?php if (!empty($texto)): ?>
          <div class="texto-paragrafo text-center text-left@md"><?= $texto; ?></div>
        <?php endif; ?>
      </div>
      <div class="flex-shrink-0 flex flex-row gap-sm items-center">
        <a href="javascript:;" class="btn btn--swiper<?= $darker ? '-white' : ''; ?> js-<?= $swiper_class; ?>-prev"><?= get_svg_content('chevron-left.svg', '', true, [], 'stroke'); ?></a>
        <a href="javascript:;" class="btn btn--swiper<?= $darker ? '-white' : ''; ?> js-<?= $swiper_class; ?>-next"><?= get_svg_content('chevron-left.svg', 'flip-x', true, [], 'stroke'); ?></a>
      </div>
    </div>

    <div class="width-90% width-100%@md">
      <div class="swiper js-<?= $swiper_class; ?>-swiper">
        <div class="swiper-wrapper">
          <?= $cards; ?>
        </div>
      </div>
    </div>

  </div>
</section>