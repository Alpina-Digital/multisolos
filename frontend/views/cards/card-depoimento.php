<?php

/**
 * Template Part Name: Depoimento
 * Template Part Type: CARD
 * Template Part Page: -
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $depoimento Texto do depoimento.
 *  @var string $nome Autor do depoimento.
 *  @var string $class Classe extra.
 * }
 */
extract($args);
?>
<div class="card-depoimento swiper-slide padding-md <?= $class ?? ''; ?> flex flex-column gap-sm justify-between">

  <div class="card-depoimento__texto text-component"><?= $depoimento ?? ''; ?></div>
  <div class="card-depoimento__autor"><?= $nome ?? ''; ?></div>

</div>