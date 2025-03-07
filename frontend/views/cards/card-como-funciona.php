<?php

/**
 * Template Part Name: Como Funciona
 * Template Part Type: CARD
 * Template Part Page: Cards
 * Description: Card empilhável da página Como Funciona.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @cody _1_stacking-cards
 * 
 * @var $args {
 * 	@var string $numero Número do card.
 *  @var string $titulo Título do card.
 *  @var string $texto Texto do card.
 * @var string $imagem Imagem do card.
 * }
 */
extract($args);
?>
<li class="card-como-funciona stack-cards__item bg-primary radius-lg inner-glow shadow-md js-stack-cards__item">
  <div class="grid gap-0 gap-xl@md">
    <div class="card-como-funciona__info col-12 col-6@md order-2 order-1@md flex flex-column items-start gap-sm padding-y-lg padding-y-xxl@md padding-x-sm padding-x-xl@md">
      <div class="card-como-funciona__info-numero"><?= $numero; ?></div>
      <div class="card-como-funciona__info-titulo"><?= $titulo; ?></div>
      <div class="card-como-funciona__info-texto text-component"><?= $texto; ?></div>
    </div>
    <div class="col-12 col-6@md order-1 order-2@md bg-white">
      <figure class="card-como-funciona__imagem">
        <?= $imagem ?? ''; ?>
      </figure>
    </div>
  </div>
</li>