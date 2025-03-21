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

<section class="section-missao-valores grid items-start gap-md">

  <div class="col-12 col-3@md">
    <h2 class="titulo-secao margin-top-lg@md"><?= $titulo; ?></h2>
  </div>

  <div class="section-missao-valores__pilar col-12 col-3@md margin-top-xl@md flex flex-column items-center justify-center gap-xs">
    <?= get_svg_content('sobre/missao.svg'); ?>
    <h3 class="section-missao-valores__pilar-titulo">Missão</h3>
    <div class="section-missao-valores__pilar-texto"><?= $missao; ?></div>
  </div>


  <div class="section-missao-valores__pilar col-12 col-3@md margin-top-xl@md flex flex-column items-center justify-center gap-xs">
    <?= get_svg_content('sobre/valores.svg'); ?>
    <h3 class="section-missao-valores__pilar-titulo">Valores</h3>
    <div class="section-missao-valores__pilar-texto"><?= $valores; ?></div>
  </div>

</section>