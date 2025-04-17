<?php

/**
 * Template Part Name: Accordion (Mobile)
 * Template Part Type: COL
 * Template Part Page: Footer
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @cody _1_example //coloque aqui os elementos do Cody que foram usados nessa template part.
 * 
 * @var $args {
 * 	@var string $titulo Título do accordion.
 * }
 */
extract($args);
?>
<div class="col-accordion-mobile hide@lg width-100%">
  <ul class="accordion js-accordion" data-animation="on" data-multi-items="off">

    <li class="accordion__item accordion__item--is-open js-accordion__item">
      <button class="reset accordion__header padding-y-sm padding-x-md js-tab-focus" type="button">
        <span class="text-md">Contato</span>

        <svg class="icon accordion__icon-arrow no-js:is-hidden" viewBox="0 0 20 20" aria-hidden="true">
          <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
            <line x1="10" y1="14" x2="3" y2="7" />
            <line x1="17" y1="7" x2="10" y2="14" />
          </g>
        </svg>
      </button>

      <div class="accordion__panel padding-top-xxs padding-x-md padding-bottom-md js-accordion__panel">
        <?= $contatos ?? ''; ?>
      </div>
    </li>

    <li class="accordion__item js-accordion__item">
      <button class="reset accordion__header padding-y-sm padding-x-md js-tab-focus" type="button">
        <span class="text-md">Soluções</span>

        <svg class="icon accordion__icon-arrow no-js:is-hidden" viewBox="0 0 20 20" aria-hidden="true">
          <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
            <line x1="10" y1="14" x2="3" y2="7" />
            <line x1="17" y1="7" x2="10" y2="14" />
          </g>
        </svg>
      </button>

      <div class="accordion__panel padding-top-xxs padding-x-md padding-bottom-md js-accordion__panel">
        <div class="flex flex-column gap-xs">
          <?= $menu_footer1 ?? ''; ?>
        </div>
      </div>
    </li>

    <li class="accordion__item js-accordion__item">
      <button class="reset accordion__header padding-y-sm padding-x-md js-tab-focus" type="button">
        <span class="text-md">Institucional</span>

        <svg class="icon accordion__icon-arrow no-js:is-hidden" viewBox="0 0 20 20" aria-hidden="true">
          <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
            <line x1="10" y1="14" x2="3" y2="7" />
            <line x1="17" y1="7" x2="10" y2="14" />
          </g>
        </svg>
      </button>

      <div class="accordion__panel padding-top-xxs padding-x-md padding-bottom-md js-accordion__panel">
        <div class="flex flex-column gap-xs">
          <?= $menu_footer2 ?? ''; ?>
        </div>
      </div>
    </li>

  </ul>
</div>