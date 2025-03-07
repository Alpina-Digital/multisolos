<?php

/**
 * Template Part Name: Quem Somos (Home)
 * Template Part Type: SECTION
 * Template Part Page: Home
 * Description: Seção chamando para a página Quem Somos.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da seção.
 *  @var string $texto Texto da seção.
 *  @var array{icone:string,titulo:string,texto:string} $itens Itens da seção.
 *  @var string $cta_texto Texto do botão.
 *  @var string $cta_link Link do botão.
 * }
 */
extract($args);
?>
<section class="section-quem-somos-home max-width-lg container grid gap-md gap-lg@md">

  <div class="col-12 col-7@md padding-y-0 padding-y-md@md flex flex-column gap-md gap-lg@md items-start@md">

    <div class="flex flex-column gap-sm gap-lg@md">
      <h1 class="titulo-secao titulo-secao--dark"><?= $titulo; ?></h1>
      <div class="section-quem-somos-home__texto text-component"><?= $texto; ?></div>
    </div>

    <div class="grid gap-lg">
      <?php foreach ($itens as $item) : ?>
        <div class="col-12 col-6@md flex flex-column gap-xs">
          <?= $item['icone']; ?>
          <div class="flex flex-column gap-xxs">
            <h3 class="section-quem-somos-home__item-titulo text-component"><?= $item['titulo']; ?></h3>
            <p class="section-quem-somos-home__item-texto text-component"><?= $item['texto']; ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <a href="<?= $cta_link; ?>" class="btn btn--primary"><?= $cta_texto ?></a>

  </div>

  <div class="section-quem-somos-home__lateral col-12 col-5@md">
    <?= $imagem; ?>
    <?= get_svg_content('deco-quem-somos-home.svg', 'section-quem-somos-home__deco'); ?>
  </div>
</section>