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

/**
 * ATENÇÃO!!!!!
 * ALTERAR A CLASS PARA EQUIPE
 */
?>

<div class="section-missao-valores__pilar col-12 col-3@md margin-top-xl@md flex flex-column items-center justify-center gap-xs">
    imagem
    <h3 class="section-missao-valores__pilar-titulo"><?= $nome ?? ''; ?></h3>
    <div class="section-missao-valores__pilar-texto"><?= $especialidade ?? ''; ?></div>
  </div>