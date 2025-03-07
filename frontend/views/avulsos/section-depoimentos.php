<?php

/**
 * Template Part Name: Avaliações
 * Template Part Type: SECTION
 * Template Part Page: -
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 *  @var string $class Classe extra.
 * 	@var string $titulo Titulo da seção.
 * 	@var string $cards Cards de avaliações.
 * 	@var string $swiper_class Classe do swiper.
 * }
 */
extract($args);
?>
<section class="section-depoimentos <?= $class; ?>">
  <div class="max-width-lg container flex flex-column gap-lg overflow-hidden">

    <div class="flex justify-between gap-md">
      <h2 class="section-depoimentos__titulo titulo-secao titulo-secao--dark"><?= $titulo; ?></h2>
      <div class="section-depoimentos__btns hide flex@md gap-xs items-center justify-end">
        <a href="javascript:;" class="btn btn--swiper <?= $white ? 'btn--swiper-light' : ''; ?> padding-x-0 js-<?= $swiper_class; ?>-prev flex-shrink-0"><?= get_svg_content('chevron.svg', "", true); ?></a>
        <a href="javascript:;" class="btn btn--swiper <?= $white ? 'btn--swiper-light' : ''; ?> padding-x-0 js-<?= $swiper_class; ?>-next flex-shrink-0"><?= get_svg_content('chevron.svg', "flip-x", true); ?></a>
      </div>
    </div>

    <div class="section-depoimentos__cards js-<?= $swiper_class; ?>-swiper">
      <div class="swiper-wrapper">
        <?= $cards; ?>
      </div>
    </div>

  </div>
</section>