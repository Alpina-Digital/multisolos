<?php

/**
 * Template Part Name: Galeria Projeto
 * Template Part Type: SECTION
 * Template Part Page: Projeto
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
<section class="section-galeria-projeto bg-cinza-escuro-ultra">
  <div class="section-galeria-projeto__container max-width-lg container flex flex-column gap-lg">

    <div class="section-galeria-projeto__galeria  overflow-hidden js-<?= $swiper_class; ?>-swiper">
      <div class="swiper-wrapper">

        <?php foreach ($videos as $video): if (empty($video['url'])) continue; ?>
          <div class="section-galeria-projeto__item section-galeria-projeto__item--video swiper-slide cursor-pointer" aria-controls="modal-footer" data-url="<?= $video['url']; ?>" style="--section-galeria-projeto-imagem: url('<?= $video['imagem'] ?? ''; ?>');">
            <?= $video_pulse; ?>
          </div>
        <?php endforeach; ?>

        <?php foreach ($imagens as $imagem): ?>
          <div class="section-galeria-projeto__item  swiper-slide" style="--section-galeria-projeto-imagem: url('<?= $imagem; ?>');"></div>
        <?php endforeach; ?>

      </div>
    </div>

    <a href="javascript:;" class="section-galeria-projeto__prev js-<?= $swiper_class; ?>-prev"><?= get_svg_content('chevron.svg', "", true); ?></a>
    <a href="javascript:;" class="section-galeria-projeto__next js-<?= $swiper_class; ?>-next"><?= get_svg_content('chevron.svg', "flip-x", true); ?></a>

  </div>
</section>