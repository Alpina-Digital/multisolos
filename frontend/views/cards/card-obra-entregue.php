<?php

/**
 * Template Part Name: Obra
 * Template Part Type: CARD
 * Template Part Page: Cards
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 */
extract($args);
?>
<a href="<?= $link; ?>" class="card-obra-entregue col-12 col-4@md swiper-slide">
  <figure class="card-obra-entregue__imagem">
    <img src="<?= $imagem; ?>">
  </figure>

  <h3 class="card-obra-entregue__titulo"><?= $titulo; ?></h3>

  <div class="card-obra-entregue__icon-link"> <?= get_svg_content('arrow-diagonal.svg'); ?> </div>
</a>