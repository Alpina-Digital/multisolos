<?php

/**
 * Template Part Name: Servico
 * Template Part Type: CARD
 * Template Part Page: Cards
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $indice 01, 02, etc.
 * 	@var string $titulo Título do servico.
 * 	@var string $texto_card Pequeno texto no card abaixo do título.
 *  @var string $imagem Imagem de destaque.
 * 	@var string $css_classes Classes CSS a serem aplicadas.
 * }
 */
extract($args);
?>
<a href="<?= $link; ?>" class="card-servico col-12 col-4@md swiper-slide">
  <figure class="card-servico__imagem">
    <img src="<?= $imagem; ?>">
  </figure>

  <div class="card-servico__card padding-md@md padding-sm@xxs flex flex-column">
    <div class="flex flex-column gap-xs">
      <h3 class="card-servico__indice"><?= $indice; ?></h3>
      <h3 class="card-servico__titulo"><?= $titulo; ?></h3>
      <p class="card-servico__texto-card"><?= $texto_card; ?></p>
    </div>
    <p class="card-servico__ver-mais gap-xxs margin-top-lg">Ver mais <?= get_svg_content('arrow-diagonal.svg', 'svg', 'true'); ?></p>
  </div>

  <div class="card-servico__icon-link"> <?= get_svg_content('arrow-diagonal.svg'); ?> </div>
</a>