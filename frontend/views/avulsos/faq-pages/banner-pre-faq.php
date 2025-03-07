<?php

/**
 * Template Part Name: Pré-FAQ
 * Template Part Type: BANNER
 * Template Part Page: -
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>
<div class="bg-cinza-escuro-ultra">
  <div class="banner-pre-faq" style="--banner-pre-faq-imagem:url('<?= get_media_src('fundo-banner.webp'); ?>');">
    <div class="banner-pre-faq__conteudo max-width-md container flex flex-column gap-lg items-center">

      <div class="flex flex-column gap-sm">
        <h2 class="banner-pre-faq__titulo titulo-secao"><?= $titulo; ?></h2>
        <div class="banner-pre-faq__texto"><?= $texto; ?></div>
      </div>

      <?php if ($cta_texto && $cta_link): ?>
        <a href="<?= $cta_link; ?>" target="<?= $cta_target; ?>" class="btn btn--accent"> <?= $cta_texto; ?></a>
      <?php endif; ?>


    </div>
  </div>
</div>