<?php

/**
 * Template Part Name: Etapa Projeto V2
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
<li class="item-etapa-projeto-v2 accordion__item <?= $numero == 1 ? 'accordion__item--is-open' : ''; ?> js-accordion__item">
  <button class="reset accordion__header padding-y-sm js-tab-focus color-white" type="button">
    <div class="flex gap-xs items-center">
      <span class="item-etapa-projeto-v2__numero"><?= $numero ?? ''; ?></span>
      <span class="item-etapa-projeto-v2__titulo"><?= $titulo ?? ''; ?></span>
    </div>

    <svg class="icon accordion__icon-plus no-js:is-hidden" viewBox="0 0 20 20" aria-hidden="true">
      <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
        <line x1="2" y1="10" x2="18" y2="10" />
        <line x1="10" y1="18" x2="10" y2="2" />
      </g>
    </svg>
  </button>

  <div class="accordion__panel padding-bottom-sm js-accordion__panel">
    <div class="item-etapa-projeto-v2__texto text-component">
      <?= apply_filters('the_content', $texto ?? ''); ?>
    </div>
  </div>
</li>