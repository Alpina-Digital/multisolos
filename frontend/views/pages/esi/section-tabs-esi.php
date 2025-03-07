<?php

/**
 * Template Part Name: Tabs (ESI)
 * Template Part Type: SECTION
 * Template Part Page: Economia Sem Investimento
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @cody _1_example //coloque aqui os elementos do Cody que foram usados nessa template part.
 * 
 * @var $args {
 * 	@var string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>
<section class="section-tabs-esi bg-cinza-escuro-ultra padding-top-xxl padding-top-xxxl@md padding-bottom-xl">
  <div class="max-width-lg container">

    <h2 class="titulo-secao text-center margin-bottom-xl margin-bottom-xxl@md"><?= $titulo; ?></h2>

    <div class="tabs js-tabs flex flex-column items-center">
      <ul class="section-tabs-esi__tabs flex js-tabs__controls" aria-label="Tabs Interface">
        <?php foreach ($tabs as $i => $tab): ?>
          <li class="section-tabs-esi__tab flex-shrink-0">
            <a href="#tab-esi-<?= $i + 1; ?>" class="tabs__control" aria-selected="<?= !$i ? 'true' : 'false'; ?>"><?= $tab['titulo']; ?></a>
          </li>
        <?php endforeach; ?>
      </ul>

      <div class="js-tabs__panels width-100%">
        <?= $tabs_conteudo; ?>
      </div>
    </div>

  </div>
</section>