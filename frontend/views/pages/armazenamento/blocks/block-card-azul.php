<?php

/**
 * Template Part Name: Card Azul
 * Template Part Type: BLOCK
 * Template Part Page: Sistemas para Armazenamento
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 *  @var string $subtitulo Subtítulo do card.
 *  @var string $titulo Título do card.
 *  @var string $cards HTML dos cards.
 * }
 */
extract($args);
?>
<div class="block-card-azul flex flex-column gap-xl padding-bottom-xl padding-bottom-xxl@md">

  <div class="flex flex-column gap-sm">
    <h3 class="subtitulo-secao text-center"><?= $subtitulo; ?></h3>
    <h2 class="titulo-secao text-center"><?= $titulo; ?></h2>
  </div>

  <div class="grid gap-md">
    <?= $cards; ?>
  </div>

</div>