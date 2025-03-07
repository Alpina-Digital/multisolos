<?php

/**
 * Template Part Name: Vantagens 
 * Template Part Type: SECTION
 * Template Part Page: Grid Zero
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
<section class="section-vantagens-gridzero bg-cinza-escuro-ultra padding-top-xl padding-bottom-xxl">
  <div class="max-width-lg container flex flex-column gap-xl padding-top-xl padding-bottom-sm">

    <h2 class="titulo-secao text-center"><?= $titulo; ?></h2>

    <div class="grid grid-col-4 gap-xl">
      <?php foreach ($itens as $item): ?>
        <div class="col-4 col-2@sm col-1@md flex flex-column gap-sm items-center">
          <div class="section-vantagens-gridzero__item-icone"><?= $item['icone'] ?? ''; ?></div>
          <div class="section-vantagens-gridzero__item-titulo text-center color-white text-component"><?= $item['titulo'] ?? ''; ?></div>
          <div class="section-vantagens-gridzero__item-texto text-center color-white text-component"><?= $item['texto'] ?? ''; ?></div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>