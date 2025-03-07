<?php

/**
 * Template Part Name: Reconhecimentos e Certificações
 * Template Part Type: SECTION
 * Template Part Page: Avulsos
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @cody _1_ticker Ticker para o mobile.
 * 
 * @var $args {
 * 	@var string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>
<section class="section-reconhecimentos">
  <div class="max-width-lg container grid justify-start items-center">

    <div class="col-12 col-3@sm flex flex-column items-start">
      <h2 class="titulo-secao-mini">Reconhecimentos e certificações</h2>
    </div>

    <div class="col-12 col-9@sm hide flex@md justify-between gap-lg items-center">
      <a href="javascript:;" class="btn btn--swiper <?= $dark ? 'btn--swiper-light' : ''; ?> padding-x-0 js-reconhecimentos-prev flex-shrink-0"><?= get_svg_content('chevron.svg', "", true); ?></a>
      <div class="swiper js-reconhecimentos-swiper">
        <div class="swiper-wrapper">
          <?php foreach ($itens as $item): if (empty($item)) continue; ?>
            <div class="swiper-slide">
              <div class="flex flex-column justify-start items-center gap-xs">
                <?= $item->imagem ?? ''; ?>
                <div class="section-reconhecimentos__texto text-component"><?= $item->texto ?? ''; ?></div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <a href="javascript:;" class="btn btn--swiper <?= $dark ? 'btn--swiper-light' : ''; ?> padding-x-0 js-reconhecimentos-next flex-shrink-0"><?= get_svg_content('chevron.svg', "flip-x", true); ?></a>
    </div>

    <div class="ticker js-ticker col-12 hide@md margin-top-sm">
      <ul class="ticker__list items-center">
        <?php foreach ($itens as $item): if (empty($item)) continue; ?>
          <li class="ticker__item">
            <div class="flex flex-column justify-start items-center gap-xs">
              <?= $item->imagem ?? ''; ?>
              <div class="section-reconhecimentos__texto text-component"><?= $item->texto ?? ''; ?></div>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

  </div>
</section>