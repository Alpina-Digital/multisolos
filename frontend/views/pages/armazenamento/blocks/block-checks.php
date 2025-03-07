<?php

/**
 * Template Part Name: Checks
 * Template Part Type: BLOCK
 * Template Part Page: Sistemas para Armazenamento
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * @var string $titulo Título do bloco.
 * @var array $itens Itens do bloco.
 * @var string $check_icone Ícone de check.
 * }
 */
extract($args);
?>
<div class="block-checks grid gap-md gap-xxl@md padding-bottom-xl padding-bottom-xxxl@md">

  <div class="col-12 col-3@md">
    <?php if (!empty($titulo)): ?>
      <h2 class="titulo-secao text-center text-left@md"><?= $titulo; ?></h2>
    <?php endif; ?>
  </div>

  <div class="col-12 col-9@md">
    <ul class="grid gap-y-sm gap-x-xxl">
      <?php foreach ($itens as $item): if (!$item['texto']) continue; ?>
        <li class="block-checks__item col-12 col-6@md flex gap-xs items-center">
          <?= $check_icone ?? ''; ?>
          <?= $item['texto']; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

</div>