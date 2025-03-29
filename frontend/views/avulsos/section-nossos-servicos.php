<?php

/**
 * Template Part Name: Servicos
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
<div class="overflow-hidden">
  <section class="section-nossos-servicos max-width-lg container flex flex-column gap-lg">

    <div class="flex flex-column flex-row@sm gap-sm gap-xxxl@sm justify-between">
      <h2 class="titulo-secao titulo-secao--dark flex-shrink-0"><?= $titulo ?? ''; ?></h2>
      <div class="text-component"><?= $texto ?? ''; ?></div>
    </div>

    <div class="grid gap-sm">
      <div class="col-12 col-4@sm flex"><?= $card_video; ?></div>
      <div class="col-12 col-5@sm flex flex-column gap-sm justify-between"><?= $cards_centro; ?></div>
      <div class="col-12 col-3@sm flex flex-column gap-sm justify-between">
        <?= $card_ponta; ?>
        <div class="section-nossos-servicos__ver-todos hide flex@md justify-start items-center">
          <a href="<?= $link_servicos; ?>" class="btn btn--accent btn--hover-white">Ver todos</a>
        </div>
      </div>
    </div>

  </section>
</div>