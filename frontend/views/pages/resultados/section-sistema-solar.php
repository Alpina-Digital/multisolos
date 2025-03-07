<?php

/**
 * Template Part Name: Sistema Solar
 * Template Part Type: SECTION
 * Template Part Page: Resultados
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
<section class="section-sistema-solar padding-y-lg">
  <div class="max-width-lg container flex flex-column gap-lg">

    <h2 class="section-sistema-solar__titulo titulo-secao text-center">Seu sistema solar em números</h2>

    <div class="grid gap-md">
      <?php foreach ($itens as $item): ?>
        <div class="section-sistema-solar__info col-12 col-4@md flex gap-sm">
          <?= $item['icone']; ?>
          <div class="flex flex-column gap-xxs">
            <div class="section-sistema-solar__info-titulo"><?= $item['titulo']; ?></div>
            <div class="section-sistema-solar__info-valor"><?= $item['valor']; ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <?php if (!empty($cta_link) && !empty($cta_texto)): ?>
      <a href="<?= $cta_link; ?>" target="<?= $cta_target ?? '_self'; ?>" class="section-sistema-solar__btn btn btn--accent"><?= $cta_texto; ?></a>
    <?php endif; ?>

  </div>
</section>