<?php

/**
 * Template Part Name: Missão Valores
 * Template Part Type: SECTION
 * Template Part Page: Quem Somos
 * Description: Seção que exibe a missão e valores.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da seção.
 * 	@var string $missao Texto de missão.
 * 	@var string $visao Texto de visão.
 * 	@var string $valores Texto de valores.
 * }
 */
extract($args);
?>

<section class="section-missao-valores grid items-center justify-center gap-md">

  <div class="section-missao-valores__card col-12 col-4@md margin-top-xl@md flex flex-column items-center justify-center gap-xs">
    <!-- Cabeçalho do card (título + ícone) -->
    <div class="flex flex-column flex-row@sm justify-between items-center width-100%">
      <h3 class="section-missao-valores__titulo">Missão</h3>
      <?= get_svg_content('sobre/missao.svg', 'svg', true, '', 'stroke'); ?>
    </div>
    <div class="section-missao-valores__texto"><?= $missao; ?></div>
  </div>


  <div class="section-missao-valores__card col-12 col-4@md margin-top-xl@md flex flex-column items-center justify-center gap-xs">
    <!-- Cabeçalho do card (título + ícone) -->
    <div class="flex flex-column flex-row@sm justify-between items-center width-100%">
      <h3 class="section-missao-valores__titulo">Valores</h3>
      <?= get_svg_content('sobre/valores.svg', 'svg', true, '', 'stroke'); ?>
    </div>
    <div class="section-missao-valores__texto"><?= $valores; ?></div>
  </div>

</section>