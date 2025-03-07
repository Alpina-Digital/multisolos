<?php

/**
 * Template Part Name: Motivos (ESI)
 * Template Part Type: SECTION
 * Template Part Page: Economia Sem Investimento
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 *  @var string $titulo Título da seção.
 *  @var array $motivos Conteúdo HTML dos motivos da seção.
 * }
 */
extract($args);
?>
<section class="section-motivos-esi bg-cinza-escuro-ultra padding-top-xl@md padding-bottom-md padding-bottom-xxxl@md">
  <div class="max-width-lg container grid gap-md gap-xxl@md">

    <div class="col-12 col-4@md">
      <h2 class="section-motivos-esi__titulo titulo-secao"><?= $titulo ?? ''; ?></h2>
    </div>

    <div class="col-12 col-8@md">
      <ul class="accordion js-accordion" data-animation="on" data-multi-items="off">
        <?php foreach ($motivos as $i => $motivo): ?>
          <li class="section-motivos-esi__item accordion__item <?= !$i ? 'accordion__item--is-open' : ''; ?> js-accordion__item">
            <button class="reset accordion__header padding-y-sm padding-x-md js-tab-focus" type="button">
              <span class="section-motivos-esi__item-titulo"><?= $motivo['titulo']; ?></span>

              <svg class="icon accordion__icon-plus no-js:is-hidden" viewBox="0 0 20 20" aria-hidden="true">
                <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="2" y1="10" x2="18" y2="10" />
                  <line x1="10" y1="18" x2="10" y2="2" />
                </g>
              </svg>
            </button>

            <div class="accordion__panel padding-top-xxs padding-x-md padding-bottom-md js-accordion__panel">
              <div class="section-motivos-esi__item-texto text-component">
                <?= $motivo['texto']; ?>
              </div>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

  </div>
</section>