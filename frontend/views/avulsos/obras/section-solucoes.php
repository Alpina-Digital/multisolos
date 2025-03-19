<?php

/**
 * Template Part Name: Soluções
 * Template Part Type: SECTION
 * Template Part Page: Obras
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 *  @var string $titulo Título da Seção
 *  @var string $itens Cards da seção
 * }
 */
extract($args);
?>
<section class="section-solucoes max-width-lg container position-relative padding-top-xl padding-top-xxxl@md padding-bottom-md padding-bottom-xl@md flex flex-column gap-xl">

  <h2 class="section-solucoes__titulo titulo-secao"><?= $titulo ?? ''; ?></h2>

  <div class="grid">
    <div class="col-12 flex flex-column gap-md">
      <?= $itens ?? ''; ?>
    </div>
  </div>

</section>