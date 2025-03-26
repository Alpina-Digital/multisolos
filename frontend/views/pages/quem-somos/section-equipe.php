<?php

/**
 * Template Part Name: Nos Diferencia
 * Template Part Type: SECTION
 * Template Part Page: Quem Somos
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da seção.
 * }
 */
extract($args);
?>
<section class="section-equipe grid  items-center justify-center gap-md padding-y-xl padding-y-xxxl@md">
    <h1 class="section-equipe__titulo-secao text-md text-uppercase">Nossa equipe</h1>
    <h2 class="section-equipe__subtitulo-secao text-uppercase">corpo técnico</h2>
    <?= $cards; ?>
</section>