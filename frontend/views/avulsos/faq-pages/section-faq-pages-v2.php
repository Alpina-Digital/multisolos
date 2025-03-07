<?php

/**
 * Template Part Name: FAQ nas Páginas (v2)
 * Template Part Type: SECTION
 * Template Part Page: Avulsos
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
<section class="section-faq-pages section-faq-pages--v2 bg-cinza-escuro-ultra">
  <div class="section-faq-pages__container max-width-lg container padding-md padding-xl@sm flex flex-column gap-lg">

    <div class="flex flex-column flex-row@sm justify-between items-stretch items-start@sm gap-md">
      <div class="flex flex-column gap-xs">
        <h2 class="section-faq-pages__titulo"><?= $titulo; ?></h2>
        <div class="section-faq-pages__texto"><?= $texto; ?></div>
      </div>
      <a href="<?= $cta_link; ?>" target="<?= $cta_target; ?>" class="btn btn--accent btn--hover-white"><?= $cta_texto; ?></a>
    </div>

    <div class="section-faq-pages__itens">
      <ul class="accordion js-accordion" data-animation="on" data-multi-items="off">
        <?php foreach ($perguntas as $i => $pergunta): ?>
          <li class="section-faq-pages__accordion accordion__item <?= $i === 0 ? 'accordion__item--is-open' : ''; ?> js-accordion__item">
            <button class="reset accordion__header padding-y-sm js-tab-focus" type="button">
              <span class="section-faq-pages__accordion-titulo"><?= $pergunta['titulo']; ?></span>

              <svg class="icon accordion__icon-plus no-js:is-hidden" viewBox="0 0 20 20" aria-hidden="true">
                <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="2" y1="10" x2="18" y2="10" />
                  <line x1="10" y1="18" x2="10" y2="2" />
                </g>
              </svg>
            </button>

            <div class="accordion__panel padding-top-xxs padding-bottom-md js-accordion__panel">
              <div class="section-faq-pages__accordion-texto paragrafo-branco text-component">
                <?= $pergunta['resposta']; ?>
              </div>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

  </div>
</section>