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
 * 	@var string $categoria Categoria do servico.
 * 	@var string $titulo Título do servico.
 *  @var string $texto Descrição do servico.
 *  @var string $imagem Imagem de fundo do card.
 * 	@var string $css_classes Classes CSS a serem aplicadas.
 * 	@var string $videocase Define se o card é de videocase.
 * }
 */
extract($args);
?>
<a href="<?= $link; ?>" class="card-servico <?= $css_classes; ?>">
  <figure class="card-servico__imagem">
    <img src="<?= $imagem; ?>">
  </figure>

  <div class="padding-md flex flex-column gap-xs items-center">
    <div class="flex flex-column gap-xxs">
      <h3 class="card-servico__indice"><?= $indice; ?></h3>
      <h3 class="card-servico__titulo"><?= $titulo; ?></h3>
      <p class="card-servico__texto-card"><?= $texto_card; ?></p>
      <p class="card-servico__ver-mais">Ver mais <?= get_svg_content('arrow-diagonal.svg', 'svg', 'true'); ?></p>
    </div>
  </div>

  <div class="card-servico__icon-link"> <?= get_svg_content('arrow-diagonal.svg'); ?> </div>
</a>