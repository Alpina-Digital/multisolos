<?php

/**
 * Template Part Name: Nos Diferencia
 * Template Part Type: CARD
 * Template Part Page: Cards
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título do card.
 * 	@var string $texto_superior Texto superior do card.
 * 	@var array<int,string> $itens Itens do card.
 * 	@var string $texto_inferior Texto inferior do card.
 * }
 */
extract($args);
?>
<div class="card-nos-diferencia swiper-slide">
  <div class="flex flex-column gap-sm">

    <div class="flex flex-column gap-xs">
      <h3 class="card-nos-diferencia__titulo"><?= $titulo ?? ''; ?></h3>
      <div class="card-nos-diferencia__texto text-component"><?= $texto_superior ?? ''; ?></div>
    </div>

    <?php if (!empty($itens)): ?>
      <ul class="flex flex-column gap-xxs">
        <?php foreach ($itens as $item) : ?>
          <li class="card-nos-diferencia__item flex gap-xxs">
            <?= get_svg_content('icon-check-simple.svg', 'flex-shrink-0'); ?>
            <?= $item; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <div class="card-nos-diferencia__texto text-component">
      <?= $texto_inferior ?? ''; ?>
    </div>

    <?= get_svg_content('light-card-deco.svg', 'card-nos-diferencia__deco'); ?>

  </div>
</div>