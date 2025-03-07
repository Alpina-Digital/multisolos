<?php

/**
 * Template Part Name: Servicos Especializados
 * Template Part Type: SECTION
 * Template Part Page: Home
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da seção.
 * 	@var string $subtitulo Subtítulo da seção.
 * }
 */
extract($args);
?>
<section id="servicos" class="section-servicos-especializados bg-cinza-escuro-ultra padding-y-xl padding-y-xxxl@md">
  <div class="max-width-lg container grid gap-sm">
    <div class="col-12 col-4@md flex flex-column gap-xs justify-center">
      <?php if (!empty(($subtitulo))): ?>
        <h2 class="subtitulo-secao"><?= $subtitulo; ?></h2>
      <?php endif; ?>
      <?php if (!empty(($titulo))): ?>
        <h3 class="titulo-secao"> <?= $titulo; ?></h3>
      <?php endif; ?>
    </div>
    <?= $cards; ?>
  </div>
</section>