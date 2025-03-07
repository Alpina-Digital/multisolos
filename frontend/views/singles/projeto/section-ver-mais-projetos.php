<?php

/**
 * Template Part Name: Ver Mais Projetos
 * Template Part Type: SECTION
 * Template Part Page: Single Projeto
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $cards Cards do blog.
 * }
 */
extract($args); ?>
<section class="section-blog bg-cinza-escuro-ultra padding-y-xl padding-y-xxxl@md position-relative z-index-1">
  <div class="section-blog__container grid max-width-lg container gap-lg">

    <div class="col-12 flex@md justify-between items-end">
      <h2 class="titulo-secao"><?= $titulo; ?></h2>
      <a href="<?= $link; ?>" class="btn btn--accent padding-y-xs padding-x-lg hide block@md">
        Ver todos
      </a>
    </div>

    <?= $cards ?? ''; ?>

  </div>
</section>