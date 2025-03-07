<?php

/**
 * Template Part Name: Onde Estamos e Serviços de Ponta
 * Template Part Type: WRAPPER
 * Template Part Page: Quem Somos
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $conteudo Conteúdo das seções Onde Estamos e Serviços de Ponta a Ponta.
 * }
 */
extract($args);
?>
<div class="wrapper-onde-estamos-servicos-ponta bg-cinza-escuro-ultra padding-y-xl padding-y-xxxl@md">
  <div class="flex flex-column gap-xl gap-xxxl@md padding-top-xl">
    <?= $conteudo; ?>
  </div>
  <!-- <div class="wrapper-onde-estamos-servicos-ponta__brilho"></div> -->
</div>