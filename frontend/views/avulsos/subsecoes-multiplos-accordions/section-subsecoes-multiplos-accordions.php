<?php

/**
 * Template Part Name: Subseções Com Múltiplos Accordions
 * Template Part Type: SECTION
 * Template Part Page: -
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
<section class="section-subsecoes-multiplos-accordions bg-cinza-escuro-ultra <?= $classes; ?>">
  <div class="max-width-lg container flex flex-column gap-xl">

    <div class="flex flex-column flex-row@md gap-md gap-xxl@md items-end">
      <h2 class="section-subsecoes-multiplos-accordions__titulo titulo-secao flex-shrink-0"><?= $titulo ?? ''; ?></h2>
      <div class="section-subsecoes-multiplos-accordions__texto"><?= $texto ?? ''; ?></div>
    </div>

    <div class="flex flex-column">
      <?= $subsecoes; ?>
    </div>

  </div>
</section>