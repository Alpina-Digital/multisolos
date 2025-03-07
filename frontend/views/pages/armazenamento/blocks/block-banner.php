<?php

/**
 * Template Part Name: Banner
 * Template Part Type: BLOCK
 * Template Part Page: Sistemas para Armazenamento
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 *  @var string $subtitulo Subtítulo do banner.
 *  @var string $titulo Título do banner.
 *  @var string $texto Texto do banner.
 *  @var string $cta_texto Texto do botão de CTA.
 *  @var string $cta_link Link do botão de CTA.
 *  @var string $cta_target Target do botão de CTA.
 * }
 */
extract($args);
?>
<div class="block-banner padding-y-xl padding-y-xxxl@md flex flex-column gap-lg items-center">

  <div class="flex flex-column gap-sm">
    <?php if (!empty($subtitulo)): ?>
      <h3 class="block-banner__subtitulo subtitulo-secao text-center"><?= $subtitulo; ?></h3>
    <?php endif; ?>
    <?php if (!empty($titulo)): ?>
      <h3 class="block-banner__titulo titulo-secao text-center"><?= $titulo; ?></h3>
    <?php endif; ?>
  </div>

  <?php if (!empty($texto)): ?>
    <div class="block-banner__texto paragrafo-branco text-center text-component"><?= $texto; ?></div>
  <?php endif; ?>

  <?php if (!empty($cta_texto) && !empty($cta_link)): ?>
    <a href="<?= $cta_link; ?>" class="block-banner__cta btn btn--accent" target="<?= $cta_target ?? '_self'; ?>"><?= $cta_texto; ?></a>
  <?php endif; ?>
</div>