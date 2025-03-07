<?php

/**
 * Template Part Name: Serviço Especializado
 * Template Part Type: CARD
 * Template Part Page: Home
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 * 
 * @var $args {
 * 	@var string $imagem Imagem de fundo do card.
 * 	@var string $titulo Título do card.
 * 	@var string $texto Texto do card.
 * 	@var string $cta_link Link do card.
 * }
 */
extract($args);
?>
<a href="<?= $cta_link ?? '#1'; ?>" class="card-servico-especializado col-12 col-4@md bg-primary padding-md flex flex-column gap-md items-start justify-end color-white"
    style="--card-servico-especializado-imagem: url('<?= $imagem ?? ''; ?>');">

    <div class="flex flex-column gap-xxs">
        <h3 class="card-servico-especializado__titulo color-white"><?= $titulo ?? ''; ?></h3>
        <div class="card-servico-especializado__texto"><?= $texto ?? ''; ?></div>
    </div>
    <div class="card-servico-especializado__botao btn btn--accent padding-y-xs">Saiba mais</div>
</a>