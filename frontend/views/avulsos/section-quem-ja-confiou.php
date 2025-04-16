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
<section class="section-quem-ja-confiou padding-y-xl padding-y-xxxl@md">
  <div class="flex flex-column max-width-lg container gap-sm gap-xl@md justify-start items-center">

    <div class="flex flex-column gap-xs">
      <h1 class="section-quem-ja-confiou__titulo-secao">Clientes</h1>
      <h2 class="section-quem-ja-confiou__subtitulo-secao"> Quem já confiou na nossa experiência</h2>
    </div>
    <div class="grid gap-lg items-center">
      <?php foreach ($itens as $item): if (empty($item)) continue; ?>
        <div class="col-6 col-3@md flex@md">
          <?= $item; ?>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>