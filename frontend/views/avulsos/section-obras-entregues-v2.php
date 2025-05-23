<?php

/**
 * Template Part Name: Obras V2
 * Template Part Type: SECTION
 * Template Part Page: -
 * Description: Seção obras entregues versao 2 vertical. Exemplo: página Obras
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $cards Cards de obras.
 * }
 */
extract($args);
?>
<section class="section-obras-entregues-v2 gap-xl@md padding-y-xxxl">
    <div class="max-width-lg flex flex-column container gap-md gap-xl@md">
        <?= $cards ?>
    </div>

</section>