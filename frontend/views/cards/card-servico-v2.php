<?php

/**
 * Template Part Name: Servico
 * Template Part Type: CARD
 * Template Part Page: Cards
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $categoria Categoria do servico.
 * 	@var string $titulo Título do servico.
 *  @var string $texto Descrição do servico.
 *  @var string $imagem Imagem de fundo do card.
 * 	@var string $css_classes Classes CSS a serem aplicadas.
 * 	@var string $videocase Define se o card é de videocase.
 * }
 */
extract($args);
?>
<a href="<?= $link; ?>" class="card-servico-v2 <?= $css_classes; ?>">
  <figure class="card-servico-v2__imagem">
    <?= $imagem; ?>
  </figure>

  <div class="padding-md flex flex-column gap-xs items-center">
    <?php if ($potencia) { ?>
      <div class="card-servico-v2__tag"><?= $potencia; ?></div>
    <?php } ?>
    <div class="flex flex-column gap-xxs">
      <h3 class="card-servico-v2__titulo"><?= $categoria; ?></h3>
      <?php if ($localizacao) { ?>
        <p class="card-servico-v2__local"><?= $localizacao; ?></p>
      <?php } ?>
    </div>
  </div>

  <div class="card-servico-v2__icon-link"> <?= get_svg_content('arrow-diagonal.svg'); ?> </div>
</a>