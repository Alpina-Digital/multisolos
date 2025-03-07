<?php

/**
 * Template Part Name: Nos Destacamos + DNA
 * Template Part Type: WRAPPER
 * Template Part Page: Quem Somos
 * Description: Envelopa as decorações (gradientes) com o conteúdo dos blocos Nos Destacamos e DNA. 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $conteudo Imprime o conteúdo do miolo.
 * }
 */
extract($args);
?>
<div class="section-nos-destacamos-dna bg-cinza-escuro-ultra padding-y-xl padding-y-xxxl@md">
  <div class="section-nos-destacamos-dna__conteudo max-width-lg container flex flex-column gap-xl gap-xxxl@md">
    <?= $conteudo; ?>
  </div>
  <?= get_svg_content('deco-quem-somos.svg', 'section-nos-destacamos-dna__deco'); ?>
  <!-- <div class="section-nos-destacamos-dna__brilho-esquerda"></div> -->
  <!-- <div class="section-nos-destacamos-dna__brilho-direita"></div> -->
</div>