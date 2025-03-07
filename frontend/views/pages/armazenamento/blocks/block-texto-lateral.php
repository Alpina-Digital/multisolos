<?php

/**
 * Template Part Name: Texto Lateral
 * Template Part Type: BLOCK
 * Template Part Page: Sistemas para Armazenamento
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 *  @var string $titulo Título do texto lateral.
 *  @var string $texto Texto do texto lateral.
 * }
 */
extract($args);
?>
<div class="block-texto-lateral grid gap-md gap-xxl@md padding-bottom-xl padding-bottom-xxxl@md">

  <div class="col-12 col-3@md">
    <?php if (!empty($titulo)): ?>
      <h2 class="titulo-secao text-center text-left@md"><?= $titulo; ?></h2>
    <?php endif; ?>
  </div>

  <div class="col-12 col-9@md">
    <?php if (!empty($texto)): ?>
      <div class="block-texto-lateral__texto  text-center text-left@md text-component paragrafo-branco"><?= $texto; ?></div>
    <?php endif; ?>
  </div>

</div>