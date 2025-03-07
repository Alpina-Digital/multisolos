<?php

/**
 * Template Part Name: Por que Autoprodução
 * Template Part Type: SECTION
 * Template Part Page: Autoprodução
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da Seção.
 * 	@var stdClass[] $itens Itens da seção.
 * }
 */
extract($args);
?>
<section class="section-por-que bg-cinza-escuro-ultra padding-y-xl">
  <div class="max-width-lg container flex flex-column gap-xl padding-top-xl">

    <h2 class="titulo-secao text-center"><?= $titulo; ?></h2>

    <div class="grid gap-xl">
      <?php foreach ($itens as $item): ?>
        <div class="col-12 col-6@sm col-4@md flex flex-column gap-sm items-center">
          <div class="section-por-que__item-icone"><?= $item['icone'] ?? ''; ?></div>
          <div class="section-por-que__item-texto text-center color-white text-component"><?= $item['titulo'] ?? ''; ?></div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>