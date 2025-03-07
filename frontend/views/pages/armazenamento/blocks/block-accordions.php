<?php

/**
 * Template Part Name: Accordions
 * Template Part Type: BLOCK
 * Template Part Page: Sistemas para Armazenamento
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
<div class="block-accordions grid gap-xl gap-xxl@md padding-bottom-xl padding-bottom-xxl@md items-center">

  <div class="col-12 col-6@md">
    <div class="block-accordions__imagem flex items-end justify-end" style="--block-accordions-imagem: url('<?= $imagem; ?>');"></div>
    <?php if (!empty($cta_texto) && !empty($cta_link)): ?>
      <a href="<?= $cta_link; ?>" class="block-accordions__cta btn btn--accent" target="<?= $cta_target ?? '_self'; ?>"><?= $cta_texto; ?></a>
    <?php endif; ?>
  </div>

  <div class="col-12 col-6@md">
    <ul class="accordion js-accordion" data-animation="on" data-multi-items="off">
      <?php foreach ($accordions as $i => $accordion): ?>
        <li class="block-accordions__accordion accordion__item <?= $i === 0 ? 'accordion__item--is-open' : ''; ?> js-accordion__item">
          <button class="reset accordion__header padding-y-sm padding-x-md@md js-tab-focus" type="button">
            <span class="block-accordions__accordion-titulo"><?= $accordion['titulo']; ?></span>

            <svg class="icon accordion__icon-plus no-js:is-hidden" viewBox="0 0 20 20" aria-hidden="true">
              <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                <line x1="2" y1="10" x2="18" y2="10" />
                <line x1="10" y1="18" x2="10" y2="2" />
              </g>
            </svg>
          </button>

          <div class="accordion__panel padding-top-xxs padding-x-md@md padding-bottom-md js-accordion__panel">
            <div class="block-accordions__accordion-texto paragrafo-branco text-component">
              <?= $accordion['texto']; ?>
            </div>
          </div>
        </li>
      <?php endforeach; ?>
  </div>

</div>