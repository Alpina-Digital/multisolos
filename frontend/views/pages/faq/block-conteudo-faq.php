<?php

/**
 * Template Part Name: Conteúdo (FAQ)
 * Template Part Type: BLOCK
 * Template Part Page: FAQ
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var array<int,stdClass> $itens Itens de FAQ.
 * }
 */
extract($args);
?>
<div class="block-conteudo-faq">
  <?php if (!empty($itens)): ?>
    <ul class="accordion js-accordion flex flex-column gap-lg" data-animation="on" data-multi-items="on">
      <?php foreach ($itens as $i => $item): ?>
        <li class="block-conteudo-faq__accordion accordion__item <?= $i === 0 ? 'accordion__item--is-open' : ''; ?> js-accordion__item">
          <button class="reset accordion__header js-tab-focus padding-lg" type="button">
            <span class="block-conteudo-faq__accordion-titulo titulo-secao"><?= $item->name; ?></span>

            <svg class="icon accordion__icon-arrow no-js:is-hidden" viewBox="0 0 20 20" aria-hidden="true">
              <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                <line x1="10" y1="14" x2="3" y2="7" />
                <line x1="17" y1="7" x2="10" y2="14" />
              </g>
            </svg>
          </button>

          <div class="block-conteudo-faq__accordion-conteudo accordion__panel padding-x-lg js-accordion__panel">
            <?= $item->conteudo; ?>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <div class="block-conteudo-faq__sem-resultados">Não foi encontrado nenhum resultado. Tente refazer sua busca.</div>
  <?php endif; ?>
</div>