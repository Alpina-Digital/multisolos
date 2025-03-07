<?php

/**
 * Template Part Name: Blog Destaque
 * Template Part Type: CARD
 * Template Part Page: Cards
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 *  @var string $titulo Título do card.
 *  @var string $resumo Resumo do card.
 * 	@var string $imagem Imagem do card.
 * }
 */
extract($args);
?>
<div class="card-blog-destaque grid hide flex@md">

  <div class="col-6">
    <figure class="card-blog-destaque__imagem">
      <?= $imagem ?? ''; ?>
    </figure>
  </div>

  <div class="col-6 padding-lg flex justify-center items-center">
    <div class="flex flex-column gap-md items-start">
      <div class="flex flex-column gap-xs">
        <div class="card-blog-destaque__categoria"><?= $categoria ?? ''; ?></div>
        <h3 class="card-blog-destaque__titulo"><?= $titulo ?? ''; ?></h3>
        <div class="paragrafo-branco text-component line-clamp-3"><?= $resumo ?? ''; ?></div>
      </div>
      <a href="<?= $url; ?>" class="btn btn--accent">Ver mais</a>
    </div>
  </div>

</div>