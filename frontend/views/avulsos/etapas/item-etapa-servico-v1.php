<?php

/**
 * Template Part Name: Etapa Serviço V1
 * Template Part Type: ITEM
 * Template Part Page: Etapas
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>
<div class="item-etapa-servico-v1 col-12 col-6@md flex gap-xs items-center">
  <span class="item-etapa-servico-v1__numero"><?= $numero ?? ''; ?></span>
  <span class="item-etapa-servico-v1__titulo"><?= $titulo ?? ''; ?></span>
</div>