<?php

/**
 * Template Part Name: Servico Ponta
 * Template Part Type: SECTION
 * Template Part Page: Quem Somos
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
<div class="section-servico-ponta max-width-lg container flex flex-column gap-xl">
  <h2 class="titulo-secao text-center"><?= $titulo; ?></h2>
  <div class="grid gap-xl">
    <?php foreach ($itens as $item): ?>
      <div class="col-12 col-3@sm flex flex-column gap-sm items-center">
        <div class="section-servico-ponta__item-icone"><?= $item->icone ?? ''; ?></div>
        <div class="section-servico-ponta__item-texto text-center color-white text-component"><?= $item->titulo ?? ''; ?></div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<div class="padding-top-md"></div>