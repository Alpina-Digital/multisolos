<?php

/**
 * Template Part Name: Paginacao
 * Template Part Type: BLOCK
 * Template Part Page: -
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var Alp_Paginacao $paginacao A paginação.
 * }
 */
extract($args);
?>
<nav class="block-paginacao flex items-center justify-between" aria-label="Paginação">

  <?php $anterior = $paginacao->get_anterior(); ?>
  <a href="<?= $paginacao->get_link_pagina($anterior); ?>" class="block-paginacao__arrow <?= !$anterior ? 'block-paginacao__arrow--disabled' : NULL; ?>" aria-label="Vá para a página anterior">
    <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M25.333 16.5003H6.66634M6.66634 16.5003L11.9997 21.8337M6.66634 16.5003L11.9997 11.167" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    </svg>

    <span>Anterior</span>
  </a>

  <ol class="block-paginacao__numeros">
    <?php
    if ($inicio = $paginacao->get_inicio()) { ?>
      <li>
        <a href="<?= $paginacao->get_link_pagina(1); ?>" class="block-paginacao__item" aria-label="Vá para a página 1">1</a>
      </li>
    <?php }
    if ($paginacao->get_pontos_antes()) { ?>
      <li aria-hidden="true">
        <span class="block-paginacao__item block-paginacao__item--ellipsis">...</span>
      </li>
    <?php }
    foreach ($paginacao->get_anteriores() as $pagina) {
    ?>
      <li>
        <a href="<?= $paginacao->get_link_pagina($pagina); ?>" class="block-paginacao__item" aria-label="Vá para a página <?= $pagina; ?>"><?= $pagina; ?></a>
      </li>
    <?php
    }
    if ($atual = $paginacao->get_atual()) {
    ?>
      <li>
        <a href="#0" class="block-paginacao__item block-paginacao__item--selected" aria-label="Página atual, página <?= $atual; ?>" aria-current="page"><?= $atual; ?></a>
      </li>
    <?php
    }
    foreach ($paginacao->get_seguintes() as $pagina) {
    ?>
      <li>
        <a href="<?= $paginacao->get_link_pagina($pagina); ?>" class="block-paginacao__item" aria-label="Vá para a página <?= $pagina; ?>"><?= $pagina; ?></a>
      </li>
    <?php
    }
    if ($paginacao->get_pontos_depois()) { ?>
      <li aria-hidden="true">
        <span class="block-paginacao__item block-paginacao__item--ellipsis">...</span>
      </li>
    <?php }
    if ($fim = $paginacao->get_final()) { ?>
      <li>
        <a href="<?= $paginacao->get_link_pagina($fim); ?>" class="block-paginacao__item" aria-label="Vá para a página <?= $fim; ?>"><?= $fim; ?></a>
      </li>
    <?php } ?>
  </ol>

  <?php $seguinte = $paginacao->get_seguinte(); ?>
  <a href="<?= $paginacao->get_link_pagina($seguinte); ?>" class="block-paginacao__arrow <?= !$seguinte ? 'block-paginacao__arrow--disabled' : NULL; ?>" aria-label="Vá para a página seguinte">
    <span>Próxima</span>
    <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M6.66699 16.4997L25.3337 16.4997M25.3337 16.4997L20.0003 11.1663M25.3337 16.4997L20.0003 21.833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    </svg>

  </a>

</nav>