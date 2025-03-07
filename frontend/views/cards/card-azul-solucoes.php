<?php

/**
 * Template Part Name: Azul Soluções (v1)
 * Template Part Type: CARD
 * Template Part Page: Cards
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var array $args {
 *  @var string $numero Número do cartão.
 *  @var string $titulo Título do cartão.
 *  @var string $texto Texto do cartão.
 *  @var string $cta_link Link do CTA.
 *  @var string $cta_target Target do CTA.
 *  @var string $cta_texto Texto do CTA.
 *  @var string $classes Classes adicionais.
 * }
 */
extract($args);
?>
<div class="card-azul-solucoes <?= $classes; ?> flex flex-column justify-between gap-md">

  <div class="flex flex-column gap-xs">
    <div class="flex <?= empty($cta_texto) ? 'flex-column items-start' : 'items-center'; ?> gap-xs">
      <div class="card-azul-solucoes__numero"> <?= $numero; ?> </div>
      <h3 class="card-azul-solucoes__titulo"> <?= $titulo; ?> </h3>
    </div>
    <div class="card-azul-solucoes__texto"> <?= $texto; ?> </div>
  </div>

  <?php if (!empty($cta_link) && !empty($cta_texto)) : ?>
    <a href="<?= $cta_link; ?>" target="<?= $cta_target; ?>" class="card-azul-solucoes__cta btn btn--accent"><?= $cta_texto; ?></a>
  <?php endif; ?>
</div>