<?php

/**
 * Template Part Name: Serviços
 * Template Part Type: SECTION
 * Template Part Page: -
 * Description: Banner no topo das sub páginas Serviços.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 * 
 */
extract($args);
?>
<section class="section-hero-page" style="--section-hero-page-imagem:url('<?= $imagem; ?>')">
  <div class="max-width-lg container flex flex-column gap-sm padding-top-xxl padding-top-xxxxl@md padding-bottom-xxl padding-bottom-xxxl@md">
      <h2 class="section-hero-page__subtitulo">Serviços</h2>
      <h1 class="section-hero-page__titulo"><?= the_title(); ?></h1>
  </div>
</section>