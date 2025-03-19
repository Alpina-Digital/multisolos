<?php

/**
 * Template Part Name: Feature
 * Template Part Type: CARD
 * Template Part Page: Cards
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $classes Classes adicionais para o card.
 *  @var string $titulo Título do card.
 *  @var string $texto Texto do card.
 *  @var string $imagem Imagem do card.
 * }
 */
extract($args);
?>
<div class="card-feature swiper-slide <?= $classes ?? ''; ?> flex flex-column gap-xs justify-end padding-lg" style="--card-feature-imagem: url('<?= $imagem ?? ''; ?>')">
  <div class="card-feature__titulo text-component"><?= $titulo ?? ''; ?></div>
  <div class="card-feature__texto text-component"><?= $texto ?? ''; ?></div>
</div>