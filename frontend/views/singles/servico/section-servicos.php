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
<section class="section-servicos bg-cinza-escuro-ultra padding-y-xl padding-y-xxxl@md position-relative z-index-1">
  <div class="section-servicos__container grid max-width-lg container gap-lg">

    <div class="col-12">
    <h2 class="section-servicos__titulo-secao">estaqueamento e sondagem</h2>
    <h3 class="section-servicos__subtitulo-secao">Nossos serviços</h3>
    <br><br><pre>***será implementado o swiper***</pre>
    </div>

    <?= $cards ?? ''; ?>

  </div>
</section>