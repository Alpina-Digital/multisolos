<?php

/**
 * Template Part Name: Wrapper Por Cima
 * Template Part Type: WRAPPER
 * Template Part Page: -
 * Description: Um wrapper muito simples com um fundo branco ou cinza que fica por cima das outras seções da página.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 *  @var string $cor Cor do wrapper.
 * 	@var string $conteudo O que será exibido dentro do wrapper.
 * 
 * }
 */
extract($args);
?>
<div class="wrapper-por-cima wrapper-por-cima--<?= $cor; ?> flex flex-column gap-xl gap-xxxl@md padding-y-xl padding-y-xxxl@md ">
  <?= $conteudo; ?>
</div>