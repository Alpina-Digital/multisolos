<?php

/**
 * Template Part Name: Glow Azul
 * Template Part Type: BLOCK
 * Template Part Page: Avulsos
 * Description: Bloco decorativo no formato de um glow azul.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $direcao Direção do glow. Pode ser 'esquerda' ou 'direita'.
 * 	@var string $top Quantos pixels de distância do topo.
 * }
 */
extract($args);
?>
<div class="block-glow-azul block-glow-azul--<?= $direcao; ?>" style="top:<?= $top; ?>px;">
  <div class="block-glow-azul__glow"></div>
</div>