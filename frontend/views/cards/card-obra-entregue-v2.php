<?php

/**
 * 'titulo'
 * 'imagem'
 * 'link'
 * 'slogan'
 * 'texto'
 * 'depoimento_texto'
 * 'depoimento_responsavel'
 * 'depoimento_foto'
 * 'galeria'
 */
extract($args);

?>
<div class="card-obra-entregue-v2 border-radius-lg max-width-lg grid container@md">

  <div class="col-12 col-6@md flex flex-column">
    <div class="galeria-obras-entregues-v2__galeria swiper js-<?= $swiper_class; ?>-swiper">

      <div class="swiper-wrapper">
        <?php foreach ($galeria as $i => $imagem): ?>
          <div class="galeria-obras-entregues-v2__imagem swiper-slide" style="--galeria-obras-entregues-v2-imagem: url('<?= wp_get_attachment_image_url($imagem, ''); ?>');">
            <a href="javascript:;" class="galeria-obras-entregues-v2__zoom btn btn--zoom" aria-label="Zoom" aria-controls="lightbox-<?= $swiper_class; ?>" data-lightbox-item="lightbox-<?= $swiper_class; ?>-item-<?= $i + 1; ?>">
              <?= get_svg_content('icon-zoom.svg', '', true, [], 'stroke'); ?>
            </a>
          </div>

        <?php endforeach; ?>
      </div>

      <div class="galeria-obras-entregues-v2__btns flex gap-xs items-center justify-end">
        <a href="javascript:;" class="btn btn--swiper  padding-x-0 js-<?= $swiper_class; ?>-prev flex-shrink-0">
          <?= get_svg_content('chevron.svg', "flip-x", true); ?>
        </a>
        <a href="javascript:;" class="btn btn--swiper  padding-x-0 js-<?= $swiper_class; ?>-next flex-shrink-0">
          <?= get_svg_content('chevron.svg', "", true); ?>
        </a>
      </div>

    </div>
  </div>

  <div class="card-obra-entregue-v2__col-esquerda col-12 col-6@md flex flex-column padding-md padding-xl@md gap-md bg-white">
    <h3 class="card-obra-entregue-v2__titulo">Multisolos <span>+ <?= $titulo; ?></span></h3>
    <h2 class="card-obra-entregue-v2__slogan"><?= $slogan ?? ''; ?></h2>
    <hr>
    <div class="card-obra-entregue-v2__texto"><?= $texto ?? ''; ?></div>
    <hr>
    <div class="card-obra-entregue-v2__depoimento_texto"><?= $depoimento_texto ?? ''; ?></div>
    <div class="flex justify-between items-center">
      <div>
        <p class="card-obra-entregue-v2__depoimento_nome"><?= $depoimento_nome ?? ''; ?></p>
        <p class="card-obra-entregue-v2__depoimento_responsavel"><?= $depoimento_responsavel ?? ''; ?></p>
      </div>
      <div>
        <img class="card-obra-entregue-v2__depoimento_imagem" src="<?= $depoimento_foto ?: get_media_src('placeholders/silhueta.jpg'); ?>" alt="Foto do responsável">
      </div>
    </div>
  </div>

</div>