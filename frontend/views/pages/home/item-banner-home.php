<?php

/**
 * Template Part Name: Banner
 * Template Part Type: ITEM
 * Template Part Page: Home
 * Description: Responsável por exibir um banner.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 *  @var string $titulo Título do banner.
 *  @var string $texto Texto do banner.
 *  @var string $cta_texto Texto do botão (CTA).
 *  @var string $cta_link Link do botão (CTA).
 *  @var string $cta_target Target do link do botão (CTA).
 *  @var string $video URL do vídeo de fundo do banner (se houver).
 *  @var string $imagem URL da imagem de fundo do banner (caso seja de imagem).
 *  @var int $tempo Tempo de duração do banner (em milissegundos).
 * }
 */
extract($args);
?>
<li class="item-banner-home swiper-slide" data-swiper-autoplay="<?= $tempo; ?>">

  <div class="item-banner-home__conteudo max-width-lg container flex flex-column gap-lg items-start">
    <?php if ($texto || $titulo) : ?>
      <div class="flex flex-column gap-sm">
        <h2 class="item-banner-home__titulo"><?= $titulo; ?></h2>
        <div class="item-banner-home__texto"><?= $texto; ?></div>
      </div>
    <?php endif; ?>
    <?php if ($cta_texto && $cta_link): ?>
      <a href="<?= $cta_link; ?>" class="item-banner-home__botao btn btn--primary" target="<?= $cta_target; ?>"><?= $cta_texto; ?></a>
    <?php endif; ?>
  </div>

  <div class="item-banner-home__bg">
    <?php if ($video): ?>
      <video autoplay muted loop playsinline class="item-banner-home__video" lazyload="">
        <source src="<?= $video; ?>" type="video/mp4">
      </video>
    <?php else: ?>
      <img src="<?= $imagem_desktop; ?>" alt="<?= $titulo; ?>" class="item-banner-home__imagem hide inline@md">
      <img src="<?= $imagem_mobile; ?>" alt="<?= $titulo; ?>" class="item-banner-home__imagem hide@md">
    <?php endif; ?>
  </div>

  <div class="item-banner-home__overlay"></div>

</li>