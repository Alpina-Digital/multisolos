<?php

/**
 * Template Part Name: Principal Simulador
 * Template Part Type: SECTION
 * Template Part Page: Simulador
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @cody _1_example //coloque aqui os elementos do Cody que foram usados nessa template part.
 * 
 * @var $args {
 * 	@var string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>
<section class="section-principal-simulador padding-bottom-lg padding-bottom-xl@md">
  <div class="max-width-md container padding-x-xxxl@md">

    <div class="section-principal-simulador__fase steps-v2" style="--step-v2-current-step: 0;">
      <p class="text-sm color-contrast-medium margin-bottom-xs"></p>
      <div class="steps-v2__indicator" aria-hidden="true"></div>
    </div>

    <div class="section-principal-simulador__form-container cf7-form-block padding-top-xl padding-bottom-xl padding-bottom-xxxl@md">
      <?= $form; ?>
    </div>

  </div>
</section>