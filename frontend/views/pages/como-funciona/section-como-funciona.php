<?php

/**
 * Template Part Name: Como Funciona
 * Template Part Type: SECTION
 * Template Part Page: Como Funciona
 * Description: Seção que recebe os cards empilháveis da página Como Funciona.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @cody _1_stacking-cards No container e nos cards.
 * 
 * @var $args {
 * 	@var string $cards Cards da seção.
 * }
 */
extract($args);
?>
<div id="como-funciona"></div>
<section class="section-como-funciona bg-cinza-escuro-ultra padding-top-md padding-top-xl@md padding-bottom-xl padding-bottom-xxxl@md">
  <div class="max-width-lg container">
    <ul class="stack-cards js-stack-cards">
      <?= $cards; ?>
    </ul>
  </div>
</section>