<?php

/**
 * Template Part Name: Modelos Autoprodução
 * Template Part Type: SECTION
 * Template Part Page: Autoprodução
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $subtitulo Subtítulo da Seção.
 * 	@var string $titulo Título da Seção.
 * 	@var string $cards Cards da seção.
 * }
 */
extract($args);
?>
<section id="modelos" class="section-modelos-autoproducao bg-cinza-escuro-ultra padding-y-xl">
  <div class="max-width-lg container flex flex-column gap-xl">

    <div class="flex flex-column gap-sm">
      <h3 class="subtitulo-secao text-center"><?= $subtitulo; ?></h3>
      <h2 class="titulo-secao text-center"><?= $titulo; ?></h2>
    </div>

    <div class="section-modelos-autoproducao__cards grid gap-md">
      <?= $cards; ?>
    </div>

  </div>
</section>