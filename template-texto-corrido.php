<?php

/**
 * Template Name: Texto corrido
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

$header_class = 'header-model-v2';
get_header();
the_post();
?>
<div class="padding-top-xxl padding-top-xxl@md bg-cinza-escuro-ultra"></div>
<article class="texto-corrido padding-y-xl padding-y-xxxl@md bg-cinza-escuro-ultra">
  <div class="container max-width-lg border-0 flex flex-column gap-lg">
    <h1 class="section-apresentacao-azul__titulo text-center margin-bottom-md"><?= get_the_title(); ?></h1>
    <div class="text-component color-cinza-escuro">
      <?php the_content(); ?>
    </div>
  </div>
</article>
<?php
get_footer();
