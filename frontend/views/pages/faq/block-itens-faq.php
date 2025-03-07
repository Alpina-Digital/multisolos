<?php

/**
 * Template Part Name: Faq Level2
 * Template Part Type: ITEM
 * Template Part Page: Faq
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
<div class="block-itens-faq">
  <ul class="accordion js-accordion" data-animation="on" data-multi-items="off">
    <?php foreach ($itens as $i => $item): ?>
      <li class="block-itens-faq__item accordion__item <?= $i === 0 ? 'accordion__item--is-open' : ''; ?> js-accordion__item">
        <button class="reset accordion__header padding-y-md js-tab-focus flex gap-md" type="button">
          <span class="block-itens-faq__item-titulo"><?= $item->titulo; ?></span>

          <svg class="icon accordion__icon-plus no-js:is-hidden" viewBox="0 0 20 20" aria-hidden="true">
            <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
              <line x1="2" y1="10" x2="18" y2="10" />
              <line x1="10" y1="18" x2="10" y2="2" />
            </g>
          </svg>
        </button>

        <div class="accordion__panel padding-top-xxs padding-bottom-md js-accordion__panel">
          <div class="block-itens-faq__item-texto paragrafo-branco text-component">
            <?= $item->conteudo; ?>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>