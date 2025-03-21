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
<section class="section-equipe grid items-start gap-md">
    <h2>Equipe</h2>  
    <h1>corpo técnico</h1>
    <?= $cards; ?>
</section>