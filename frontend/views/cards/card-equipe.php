<?php

/**
 * Template Part Name: Equipe
 * Template Part Type: CARD
 * Template Part Page: Cards
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título do card.
 * 	@var string $texto_superior Texto superior do card.
 * 	@var array<int,string> $itens Itens do card.
 * 	@var string $texto_inferior Texto inferior do card.
 * }
 */
extract($args);

?>

<div class="card-equipe col-12 col-3@md margin-top-xl@md flex flex-column items-center justify-center gap-xs">
  <img src="<?= $foto; ?>" class="card-equipe__foto">
  <h3 class="card-equipe__nome"><?= $nome ?? ''; ?></h3>
  <div class="card-equipe__cargo"><?= $cargo ?? ''; ?></div>
  <div class="card-equipe__especialidade"><?= $especialidade ?? ''; ?></div>
  <div class="card-equipe__link"><a href="<?= $link ?? ''; ?>">VER CURRÍCULO <?= get_svg_content('arrow-right-up.svg', "", true); ?></a></div>
</div>