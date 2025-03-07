<?php

/**
 * Template Part Name: Tab (Armazenamento)
 * Template Part Type: ITEM
 * Template Part Page: Sistemas para Armazenamento
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @cody _1_tabs
 *
 * @var $args {
 * 	@var string $i Índice da tab.
 * }
 */
extract($args);
?>
<div id="tab-armazenamento-<?= $i + 1; ?>" class="item-tab-armazenamento js-tabs__panel">

  <div class="item-tab-armazenamento__banner" style="--item-tab-armazenamento-banner:url('<?= $banner_imagem; ?>');"></div>

  <div class="max-width-lg container">
    <?= $conteudo; ?>
  </div>
</div>