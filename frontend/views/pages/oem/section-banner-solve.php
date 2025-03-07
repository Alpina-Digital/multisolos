<?php

/**
 * Template Part Name: Banner Solve
 * Template Part Type: SECTION
 * Template Part Page: Soluções O&M
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título do banner.
 * 	@var string $texto Texto do banner.
 * 	@var string $cta_texto Texto do botão.
 * 	@var string $cta_link Link do botão.
 * 	@var string $imagem URL da imagem de fundo.
 * }
 */
extract($args);
?>
<section class="section-banner-solve" style="--section-banner-solve-imagem: url('<?= $imagem; ?>');">
  <div class="max-width-lg container section-banner-solve__conteudo flex flex-column gap-lg items-center">

    <div class="flex flex-column gap-sm text-center items-center">
      <?php if (!empty($titulo)) : ?>
        <h2 class="section-banner-solve__titulo titulo-secao"><?= $titulo; ?></h2>
      <?php endif; ?>

      <?php if (!empty($texto)) : ?>
        <div class="section-banner-solve__texto paragrafo-branco"><?= $texto; ?></div>
      <?php endif; ?>
    </div>

    <?php if (!empty($cta_texto) && !empty($cta_link)) : ?>
      <a href="<?= $cta_link; ?>" class="section-banner-solve__cta btn btn--accent"><?= $cta_texto; ?></a>
    <?php endif; ?>
  </div>
</section>