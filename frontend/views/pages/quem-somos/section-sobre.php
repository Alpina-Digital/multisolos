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
<section class="section-sobre">
  <div class="max-width-lg container grid gap-md gap-xl@md">
    <div class="col-12 col-8@md overflow-hidden">
      <h1 class="titulo padding-bottom-sm">Sobre</h1>
      <h2 class="section-sobre__titulo-secao padding-bottom-lg"><?= $titulo; ?></h2>

      <div class="js-<?= $swiper_class; ?>-swiper">
        <div class="swiper-wrapper">
          <div class="selo">
            <img src="<?= $selo?>">
          </div>
          <?= $cards; ?>
        </div>
      </div>
      <div class="section-sobre__btns hide flex@md gap-xs items-center justify-end">
        <a href="javascript:;" class="btn btn--swiper <?= $white ? 'btn--swiper-light' : ''; ?> padding-x-0 js-<?= $swiper_class; ?>-prev flex-shrink-0"><?= get_svg_content('chevron.svg', "flip-x", true); ?></a>
        <a href="javascript:;" class="btn btn--swiper <?= $white ? 'btn--swiper-light' : ''; ?> padding-x-0 js-<?= $swiper_class; ?>-next flex-shrink-0"><?= get_svg_content('chevron.svg', "", true); ?></a>
      </div>
    </div>

    <div class="col-12 col-4@md flex flex-column justify-between gap-md">

      <img src="<?= $foto_principal?>">
    </div>


  </div>
</section>