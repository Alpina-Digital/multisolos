<?php

/**
 * Template Part Name: Newsletter
 * Template Part Type: SECTION
 * Template Part Page: -
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>

<section class="section-newsletter max-width-lg bg-cinza-escuro-ultra padding-bottom-lg padding-bottom-xxl@md">
  <div class="section-newsletter__container max-width-lg container padding-md padding-xl@md grid gap-md items-start">

    <div class="col-12 col-5@sm flex flex-column gap-sm">
      <h3 class="section-newsletter__titulo">Fique por dentro das <br><span>nossas novidades</span></h3>
    </div>

    <div class="col-12 col-7@sm section-newsletter__form-container cf7-form-block width-100%">
      <?= Alp_Settings::get_form('newsletter'); ?>
    </div>

  </div>
</section>