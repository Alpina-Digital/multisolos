<?php

/**
 * Template Part Name: Serviços
 * Template Part Type: SECTION
 * Template Part Page: Serviços
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
      <h2 class="titulo-secao">estaqueamento e sondagem</h2>
      <h2 class="titulo-secao">Nossos serviços</h2>
    </div>

    <?= $cards ?? ''; ?>

  </div>
</section>