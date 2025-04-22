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

  <div class="max-width-lg container grid gap-xxl@md">

    <div class="col-12 col-7@md overflow-hidden position-relative">

      <h1 class="section-sobre__titulo-secao padding-bottom-sm text-uppercase">Sobre</h1>
      <h2 class="section-sobre__subtitulo-secao padding-bottom-lg"><?= $titulo; ?></h2>
      <div class="js-<?= $swiper_class; ?>-swiper">
        <div class="swiper-wrapper">
          <?= $cards; ?>
        </div>

        <div class="flex gap-xs justify-between items-center margin-top-sm">
          <div>
            <div class="js-<?= $swiper_class; ?>-pagination"></div>
          </div>
          <div class="flex gap-xs">
            <a href="javascript:;" class="btn btn--swiper <?= $white ? 'btn--swiper-light' : ''; ?> padding-x-0 js-<?= $swiper_class; ?>-prev flex-shrink-0">
              <?= get_svg_content('chevron.svg', "flip-x", true); ?>
            </a>
            <a href="javascript:;" class="btn btn--swiper <?= $white ? 'btn--swiper-light' : ''; ?> padding-x-0 js-<?= $swiper_class; ?>-next flex-shrink-0">
              <?= get_svg_content('chevron.svg', "", true); ?>
            </a>
          </div>
        </div>

        <!-- <div class="section-conheca__selo" style="background-image:url(<?= get_media_src('/selo.png') ?>)"></div> -->

      </div>

    </div>

    <div class="section-sobre__foto-principal col-12 col-5@md flex flex-column justify-between padding-xxxl" style="background-image: url('<?= !empty($foto_principal) ? $foto_principal : get_template_directory_uri() . '/assets/imgs/foto-sobre.jpg' ?>')"></div>

  </div>

</section>