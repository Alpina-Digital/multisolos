<?php

/**
 * Template Part Name: Onde Estamos
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
 * 	@var string $texto Texto da seção.
 * 	@var string $imagem Imagem do mapa.
 * }
 */
extract($args);
?>
<section class="section-onde-estamos max-width-lg container bg-primary padding-bottom-xl padding-top-xxxl padding-y-xxxl@md padding-x-md padding-x-xl@xs grid gap-md">
  <div class="col-12 col-5@md flex flex-column gap-md order-2 order-1@md">
    <h2 class="section-onde-estamos__titulo titulo-secao"><?= $titulo; ?></h2>
    <div class="section-onde-estamos__texto text-component"><?= $texto; ?></div>
  </div>
  <div class="col-12 col-7@md position-relative order-1 order-2@md">
    <figure class="section-onde-estamos__mapa">
      <?= $imagem; ?>
    </figure>
  </div>
  <?= get_svg_content('blue-card-deco.svg', 'section-onde-estamos__deco') ?>
</section>