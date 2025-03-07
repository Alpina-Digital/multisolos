<?php

/**
 * Template Part Name: Tabs (Armazenamento)
 * Template Part Type: SECTION
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
 * 	@var string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>
<section class="section-tabs-armazenamento bg-cinza-escuro-ultra overflow-hidden">

  <div class="tabs js-tabs flex flex-column items-center">
    <div class="max-width-lg container">
      <ul class="section-tabs-armazenamento__tabs flex js-tabs__controls" aria-label="Tabs Interface">
        <?php foreach ($tabs as $i => $tab): ?>
          <li class="section-tabs-armazenamento__tab flex-shrink-0">
            <a href="#tab-armazenamento-<?= $i + 1; ?>" class="tabs__control" aria-selected="<?= !$i ? 'true' : 'false'; ?>"><?= $tab; ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="js-tabs__panels width-100%">
      <?= $tabs_conteudo ?? ''; ?>
    </div>
  </div>

</section>