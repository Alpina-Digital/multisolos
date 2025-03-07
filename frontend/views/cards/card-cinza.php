<?php

/**
 * Template Part Name: Cinza
 * Template Part Type: CARD
 * Template Part Page: Cards
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da vantagem.
 * 	@var string $texto Texto da vantagem.
 * 	@var string $colunas Número de colunas ocupadas pelo card.
 * }
 */
extract($args);
?>
<div class="card-cinza flex flex-column items-center gap-sm <?= $colunas ?? ''; ?> bg-cinza-fundo text-center radius-md padding-md">
    <?php if (!empty($numero)): ?>
        <div class="card-cinza__numero"><?= $numero; ?></div>
    <?php else: echo $icone;
    endif; ?>
    <div class="flex flex-column gap-xs">
        <h3 class="card-cinza__titulo"><?= $titulo ?? ''; ?></h3>
        <div class="card-cinza__texto"><?= $texto ?? ''; ?></div>
    </div>
</div>