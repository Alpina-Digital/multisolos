<?php

/**
 * Template Part Name: Solução
 * Template Part Type: CARD
 * Template Part Page: -
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 *  @var int $id ID do card (para múltiplas galerias).
 * 	@var array<int,string> $galeria Galeria de imagens.
 *  @var string $titulo Título do card.
 *  @var string $texto Texto do card.
 *  @var string $vantagens Vantagens do card.
 *  @var string $cta_texto Texto do CTA.
 *  @var string $cta_link Link do CTA.
 *  @var string $cta_target Target do CTA.
 * }
 */
extract($args);
?>
<div class="card-solucao flex flex-column flex-row@md" id="servico-<?= $id; ?>">

  <div class="card-solucao__imagens flex flex-column js-servico-swiper swiper-container position-relative overflow-hidden" data-id="<?= $id; ?>">
    <div class="swiper-wrapper">
      <?php foreach ($galeria as $imagem) { ?>
        <figure class="swiper-slide">
          <?= $imagem; ?>
        </figure>
      <?php } ?>
    </div>

    <?php if (count($galeria ?? []) > 1): ?>
      <div class="flex gap-xs position-absolute right-sm bottom-sm z-index-1">
        <a href="javascript:" class="card-solucao__btn-swiper js-solucao-prev" aria-label="Anterior"><?= get_svg_content('chevron-left.svg', '', true, [], 'stroke'); ?></a>
        <a href="javascript:" class="card-solucao__btn-swiper js-solucao-next" aria-label="Seguinte"><?= get_svg_content('chevron-left.svg', 'flip-x', true, [], 'stroke'); ?></a>
      </div>
    <?php endif; ?>
  </div>

  <div class="padding-xl flex flex-column gap-lg">

    <div class="flex flex-column gap-md">
      <h2 class="card-solucao__titulo titulo-secao"><?= $titulo; ?></h2>
      <div class="card-solucao__texto text-component"><?= $texto; ?></div>
      <div class="card-solucao__vantagens-texto text-component">Vantagens:</div>
      <div class="card-solucao__texto text-component"><?= $vantagens; ?></div>
    </div>

    <a href="<?= $cta_link; ?>" target="<?= $cta_target; ?>" class="card-solucao__btn btn btn--accent"><?= $cta_texto; ?></a>

  </div>

</div>