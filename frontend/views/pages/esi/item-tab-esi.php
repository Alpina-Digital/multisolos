<?php

/**
 * Template Part Name: Tab Esi
 * Template Part Type: ITEM
 * Template Part Page: Esi
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
<div id="tab-esi-<?= $i; ?>" class="item-tab-esi js-tabs__panel padding-md padding-xl@md">
  <div class="max-width-lg container@md grid gap-xl gap-xxl@md">

    <div class="col-12 col-5@md flex flex-column gap-sm">
      <?= $icone ?? ''; ?>
      <?php if (!empty($titulo)): ?>
        <h2 class="item-tab-esi__titulo titulo-secao"><?= $titulo; ?></h2>
      <?php endif; ?>
      <?php if (!empty($texto)): ?>
        <div class="item-tab-esi__texto paragrafo-branco"><?= $texto; ?></div>
      <?php endif; ?>
    </div>

    <?php if ($itens): ?>
      <div class="col-12 col-7@md">
        <ul class="accordion js-accordion flex flex-column gap-xs" data-animation="on" data-multi-items="off">
          <?php foreach ($itens as $item): ?>
            <li class="accordion__item js-accordion__item">
              <button class="reset accordion__header padding-y-sm padding-x-md js-tab-focus" type="button">
                <span class="item-tab-esi__titulo-accordion"><?= $item['titulo'] ?? ''; ?></span>

                <svg class="icon accordion__icon-arrow no-js:is-hidden" viewBox="0 0 20 20" aria-hidden="true">
                  <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="10" y1="14" x2="3" y2="7" />
                    <line x1="17" y1="7" x2="10" y2="14" />
                  </g>
                </svg>
              </button>

              <div class="accordion__panel padding-top-xxs padding-x-md padding-bottom-md js-accordion__panel">
                <div class="item-tab-esi__texto-accordion paragrafo-branco text-component">
                  <?= $item['texto'] ?? ''; ?>
                </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

  </div>
</div>