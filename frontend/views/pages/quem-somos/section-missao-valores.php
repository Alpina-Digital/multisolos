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

<section class="section-missao-valores gap-md">

  <div class="container grid max-width-lg gap-md">

    <div class="flex flex-column col-6@md section-missao-valores__box">

      <div class="flex flex-row@sm justify-between items-center">
        <h2 class="section-missao-valores__box__titulo">Missão</h2>
        <?= get_svg_content('sobre/missao.svg', 'svg', true, '', 'stroke'); ?>
      </div>

      <div class="section-missao-valores__box__texto"><?= $texto_missao; ?></div>

    </div>

    <div class="flex flex-column col-6@md section-missao-valores__box">

      <div class="flex flex-row@sm justify-between items-center">
        <h2 class="section-missao-valores__box__titulo">Valores</h2>
        <?= get_svg_content('sobre/valores.svg', 'svg', true, '', 'stroke'); ?>
      </div>

      <div class="section-missao-valores__box__texto"><?= $texto_valores; ?></div>

    </div>

  </div>

</section>