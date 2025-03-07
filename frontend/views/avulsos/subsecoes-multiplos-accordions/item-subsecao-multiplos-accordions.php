<?php

/**
 * Template Part Name: Subsecao Multiplos Accordions
 * Template Part Type: ITEM
 * Template Part Page: Subsecoes Multiplos Accordions
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
<div class="item-subsecao-multiplos-accordions grid gap-lg gap-xxl@md">

  <div class="col-12 col-4@md flex flex-column gap-sm">
    <?= $icone ?? ''; ?>
    <div class="item-subsecao-multiplos-accordions__titulo"><?= $titulo ?? ''; ?></div>
  </div>

  <div class="col-12 col-8@md">
    <ul class="accordion js-accordion flex flex-column gap-xs" data-animation="on" data-multi-items="off">
      <?php foreach ($itens as $item): ?>
        <li class="accordion__item js-accordion__item">
          <button class="reset accordion__header padding-y-sm padding-x-md js-tab-focus" type="button">
            <span class="item-subsecao-multiplos-accordions__titulo-accordion"><?= $item['titulo'] ?? ''; ?></span>

            <svg class="icon accordion__icon-arrow no-js:is-hidden" viewBox="0 0 20 20" aria-hidden="true">
              <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                <line x1="10" y1="14" x2="3" y2="7" />
                <line x1="17" y1="7" x2="10" y2="14" />
              </g>
            </svg>
          </button>

          <div class="accordion__panel padding-top-xxs padding-x-md padding-bottom-md js-accordion__panel">
            <div class="item-subsecao-multiplos-accordions__texto-accordion paragrafo-branco text-component">
              <?= $item['texto'] ?? ''; ?>
            </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

</div>