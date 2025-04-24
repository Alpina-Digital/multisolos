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
<?php /*
<div class="card-obra-entregue-v2 border-radius-lg container grid">

  <div class="col-12 col-6@md flex-shrink-0 flex-grow-0">

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

  <div class="col-12 col-6@md flex flex-column gap-md padding-xl@md bg-white">
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


<div class="block-lightbox modal modal--animate-fade lightbox js-modal js-lightbox" id="lightbox-<?= $swiper_class; ?>">
  <div class="lightbox__content">
    <header class="lightbox__header">

      <button class="reset modal__close-btn modal__close-btn--outer js-modal__close">
        <svg class="icon icon--sm" viewBox="0 0 24 24">
          <title>Fecha a janela</title>
          <g fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="3" x2="21" y2="21" />
            <line x1="21" y1="3" x2="3" y2="21" />
          </g>
        </svg>
      </button>

    </header>

    <div class="lightbox__body slideshow slideshow--transition-fade js-lightbox__body" data-swipe="on" data-navigation="off">
      <p class="sr-only">Galeria</p>

      <ul class="slideshow__content js-lightbox__slideshow">
        <?php foreach ($galeria as $i => $imagem): ?>
          <li id="lightbox-<?= $swiper_class; ?>-item-<?= $i + 1; ?>" class="slideshow__item bg-black js-slideshow__item">
            <figure class="lightbox__media" data-media="img">
              <div class="lightbox__media-outer js-lightbox__media-outer">
                <div class="lightbox__media-inner js-lightbox__media-inner">
                  <img data-src="<?= wp_get_attachment_image_url($imagem, ''); ?>" data-thumb="<?= wp_get_attachment_image_url($imagem, 'thumbnail'); ?>" src="<?= wp_get_attachment_image_url($imagem, ''); ?>" alt="">
                </div>
              </div>
            </figure>
          </li>
        <?php endforeach; ?>
      </ul>

      <ul id="lightboxControllers">
        <li class="slideshow__control js-slideshow__control">
          <a href="javascript:;" class="btn btn--swiper"> <?= get_svg_content('chevron.svg', "flip-x", true); ?></a>
        </li>

        <li class="slideshow__control js-slideshow__control">
          <a href="javascript:;" class="btn btn--swiper"><?= get_svg_content('chevron.svg', '', true, [], 'stroke'); ?></a>
        </li>
      </ul>

    </div>

    <footer class="lightbox__footer js-lightbox_footer" aria-hidden="true">
      <nav class="lightbox_thumb-nav">
        <ol class="lightbox_thumb-list js-lightbox_thumb-list">
          <!-- content created in JS -->
        </ol>
      </nav>
    </footer>
  </div>
</div> */ ?>