<?php

/**
 * Template Part Name: Quem Já Confiou
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
<section class="section-quem-ja-confiou gap-md padding-y-xl padding-y-xxxl@md">
  <div class="max-width-lg container grid gap-sm gap-xl@md justify-start items-center">

    <h1 class="section-quem-ja-confiou__titulo-secao">Clientes</h1>
    <h2 class="section-quem-ja-confiou__subtitulo-secao"> Quem já confiou na nossa experiência</h2>

    <div class="col-12 col-12@sm hide flex@md justify-between gap-lg items-center">
      <a href="javascript:;" class="btn btn--swiper padding-x-0 js-confia-prev"><?= get_svg_content('chevron.svg', "flip-x", true); ?></a>
      <div class="swiper js-confia-swiper">
        <div class="swiper-wrapper">
          <?php foreach ($itens as $item): if (empty($item)) continue; ?>
            <div class="swiper-slide">
              <figure class="section-quem-ja-confiou__logo" aria-label="">
                <?= $item; ?>
              </figure>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <a href="javascript:;" class="btn btn--swiper padding-x-0 js-confia-next"><?= get_svg_content('chevron.svg', "", true); ?></a>
    </div>

    <div class="ticker js-ticker col-12 hide@md margin-top-sm">
      <ul class="ticker__list items-center">
        <?php foreach ($itens as $item): if (empty($item)) continue; ?>
          <li class="ticker__item">
            <figure class="section-quem-ja-confiou__logo" aria-label="">
              <?= $item; ?>
            </figure>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

  </div>
</section>