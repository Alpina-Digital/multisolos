<?php

/**
 * Template Part Name: Equipamento
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
<div class="card-equipamento col-12 col-4@md swiper-slide bg-cinza-claro">
    <figure class="equipamento__imagem">
        <img src="<?= $imagem; ?>" class="radius-lg radius-bottom-right-0 radius-bottom-left-0">
    </figure>

    <div class="padding-md flex flex-column gap-xxs">
        <h3 class="card-equipamento__titulo"><?= $titulo; ?></h3>
        <p class="card-equipamento__texto"><?= $texto; ?></h3>
    </div>
</div>