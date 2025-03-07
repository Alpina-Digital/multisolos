<?php

/**
 * Template Part Name: Nos Destacamos
 * Template Part Type: ITEM
 * Template Part Page: Quem Somos
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @cody _1_accordion A <li> do accordion.
 * 
 * @var $args {
 * 	@var string $titulo Título do item.
 * 	@var string $texto Texto do item.
 * }
 */
extract($args);
?>
<li class="item-nos-destacamos accordion__item js-accordion__item">
  <button class="reset accordion__header padding-y-sm js-tab-focus" type="button">
    <span class="item-nos-destacamos__titulo"><?= $titulo ?? ''; ?></span>

    <svg class="icon accordion__icon-plus no-js:is-hidden" viewBox="0 0 20 20" aria-hidden="true">
      <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
        <line x1="2" y1="10" x2="18" y2="10" />
        <line x1="10" y1="18" x2="10" y2="2" />
      </g>
    </svg>
  </button>

  <div class="item-nos-destacamos__texto accordion__panel padding-bottom-md js-accordion__panel">
    <div class="text-component">
      <?= apply_filters('the_content', $texto ?? ''); ?>
    </div>
  </div>
</li>