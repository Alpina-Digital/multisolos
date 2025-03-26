<?php

/**
 * Template Part Name: Nos Diferencia
 * Template Part Type: CARD
 * Template Part Page: Cards
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título do card.
 * 	@var string $texto_superior Texto superior do card.
 * 	@var array<int,string> $itens Itens do card.
 * 	@var string $texto_inferior Texto inferior do card.
 * }
 */
extract($args);
?>
<div class="card-sobre swiper-slide">
  <div class="flex flex-column gap-sm">

    <div class="flex flex-column gap-xs">
      <h3 class="card-sobre__titulo"><?= $titulo ?? ''; ?></h3>
      <div class="card-sobre__texto text-component"><?= $texto ?? ''; ?></div>
    </div>

  </div>
</div>