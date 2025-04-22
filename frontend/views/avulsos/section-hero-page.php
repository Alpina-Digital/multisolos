<?php

/**
 * Template Part Name: Hero Page
 * Template Part Type: SECTION
 * Template Part Page: -
 * Description: Banner no topo das páginas.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 * 
 * @var $args {
 * 	@var string $subtitulo Subtítulo no hero.
 * 	@var string $titulo Título no hero.
 * 	@var string $texto Texto no hero.
 * 	@var string $imagem Imagem de fundo no hero.
 * }
 */
extract($args);
?>
<section class="section-hero-page" style="--section-hero-page-imagem:url('<?= $imagem; ?>')">
  <div class="max-width-lg container flex flex-column gap-sm padding-top-xxl padding-top-xxxxl@md padding-bottom-xxl padding-bottom-xxxl@md">
    <?php if (!empty($subtitulo)): ?>
      <h2 class="section-hero-page__subtitulo"><?= $subtitulo; ?></h2>
    <?php endif; ?>
    <?php if (!empty($logo)): ?>
      <?= $logo; ?>
    <?php endif; ?>
    <?php if (!empty($titulo)): ?>
      <h1 class="section-hero-page__titulo"><?= $titulo; ?></h1>
    <?php endif; ?>
    <?php if (!empty($texto)): ?>
      <div class="section-hero-page__texto"><?= $texto; ?></div>
    <?php endif; ?>
  </div>
</section>