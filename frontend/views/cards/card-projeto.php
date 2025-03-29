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
<a class="card-projeto <?= $css_classes; ?> flex flex-column justify-end gap-md" href="<?= $link; ?>"
  style="--card-projeto-imagem: url('<?= $imagem; ?>');">

  <div class="flex flex-column gap-xxs">
    <h3 class="card-projeto__categoria"><?= $categoria; ?> - <?= $potencia; ?></h3>
    <div class="card-projeto__texto"><?= $texto; ?></div>
  </div>


  <?php if (!empty($videocase)): ?>
    <div class="card-projeto__botao-video flex gap-xs items-center"><?= get_svg_content('miniplay.svg'); ?> Ver vídeo</div>
  <?php endif; ?>

  <div class="card-projeto__botao"><?= get_svg_content('arrow-diagonal.svg'); ?></div>

</a>