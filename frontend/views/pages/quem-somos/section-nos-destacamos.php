<?php

/**
 * Template Part Name: Nos Destacamos
 * Template Part Type: SECTION
 * Template Part Page: Quem Somos
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @cody _1_accordion O <ul> que envolve os itens do accordion.
 * 
 * @var $args {
 * 	@var string $titulo Título da seção.
 * }
 */
extract($args);
?>
<section class="section-nos-destacamos grid items-start gap-md gap-xxxl@sm">
  <div class="col-12 col-4@sm">
    <h2 class="titulo-secao"><?= $titulo; ?></h2>
  </div>
  <div class="col-12 col-8@sm">
    <ul class="accordion js-accordion" data-animation="on" data-multi-items="off">
      <?= $itens; ?>

    </ul>
  </div>
</section>