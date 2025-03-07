<?php

/**
 * Template Part Name: Nos Diferencia
 * Template Part Type: SECTION
 * Template Part Page: Quem Somos
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da seção.
 * }
 */
extract($args);
?>
<section class="section-nos-diferencia">
  <div class="max-width-lg container grid gap-md gap-xl@md">

    <div class="col-12 col-4@md flex flex-column justify-between gap-md">
      <h2 class="titulo-secao titulo-secao--dark"><?= $titulo; ?></h2>
      <div class="section-nos-diferencia__btns hide flex@md gap-xs items-center justify-end">
        <a href="javascript:;" class="btn btn--swiper <?= $white ? 'btn--swiper-light' : ''; ?> padding-x-0 js-<?= $swiper_class; ?>-prev flex-shrink-0"><?= get_svg_content('chevron.svg', "", true); ?></a>
        <a href="javascript:;" class="btn btn--swiper <?= $white ? 'btn--swiper-light' : ''; ?> padding-x-0 js-<?= $swiper_class; ?>-next flex-shrink-0"><?= get_svg_content('chevron.svg', "flip-x", true); ?></a>
      </div>
    </div>

    <div class="col-12 col-8@md overflow-hidden">
      <div class="js-<?= $swiper_class; ?>-swiper">
        <div class="swiper-wrapper">
          <?= $cards; ?>
        </div>
      </div>
    </div>

    <div class="section-nos-diferencia__btns flex hide@md gap-xs items-center justify-end">
      <a href="javascript:;" class="btn btn--swiper <?= $white ? 'btn--swiper-light' : ''; ?> padding-x-0 js-<?= $swiper_class; ?>-prev flex-shrink-0"><?= get_svg_content('chevron.svg', "", true); ?></a>
      <a href="javascript:;" class="btn btn--swiper <?= $white ? 'btn--swiper-light' : ''; ?> padding-x-0 js-<?= $swiper_class; ?>-next flex-shrink-0"><?= get_svg_content('chevron.svg', "flip-x", true); ?></a>
    </div>

  </div>
</section>