<?php

/**
 * Template Part Name: Superior/Logo
 * Template Part Type: COL
 * Template Part Page: Footer
 * Description: A logo do cliente + alguns botões.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 * 
 * 
 * @var $args {
 * 	@var string $logo Logo do cliente.
 * }
 */
extract($args);
?>
<div class="col-logo flex flex-column gap-xl">
  <?= $logo; ?>
  <div class="flex flex-column gap-xs">
    <a href="/solicitar-orcamento" class="btn btn--accent">Solicitar orçamento</a>
    <a href="/simulador-de-investimento" class="btn btn--subtle">Simular investimento</a>
  </div>
</div>