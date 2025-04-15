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
  <div class="max-width-lg container gap-sm gap-xl@md justify-start items-center">

    <h1 class="section-quem-ja-confiou__titulo-secao">Clientes</h1>
    <h2 class="section-quem-ja-confiou__subtitulo-secao padding-xl"> Quem já confiou na nossa experiência</h2>

    <div class="grid gap-lg items-center">
      <?php foreach ($itens as $item): if (empty($item)) continue; ?>
        <div class="col-3 col-3@sm flex@md">
          <?= $item; ?>
        </div>
      <?php endforeach; ?>
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