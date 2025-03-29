<?php

/**
 * Template Part Name: Projeto
 * Template Part Type: CARD
 * Template Part Page: Cards
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $categoria Categoria do projeto.
 * 	@var string $titulo Título do projeto.
 *  @var string $texto Descrição do projeto.
 *  @var string $imagem Imagem de fundo do card.
 * 	@var string $css_classes Classes CSS a serem aplicadas.
 * 	@var string $videocase Define se o card é de videocase.
 * }
 */
extract($args);
?>
<a href="<?= $link; ?>" class="card-projeto-v2 <?= $css_classes; ?>">
  <figure class="card-projeto-v2__imagem">
    <?= $imagem; ?>
  </figure>

  <div class="padding-md flex flex-column gap-xs items-center">
    <?php if ($potencia) { ?>
      <div class="card-projeto-v2__tag"><?= $potencia; ?></div>
    <?php } ?>
    <div class="flex flex-column gap-xxs">
      <h3 class="card-projeto-v2__titulo"><?= $categoria; ?></h3>
      <?php if ($localizacao) { ?>
        <p class="card-projeto-v2__local"><?= $localizacao; ?></p>
      <?php } ?>
    </div>
  </div>

  <div class="card-projeto-v2__icon-link"> <?= get_svg_content('arrow-diagonal.svg'); ?> </div>
</a>