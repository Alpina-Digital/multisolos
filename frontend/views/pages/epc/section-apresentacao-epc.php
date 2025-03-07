<?php

/**
 * Template Part Name: Apresentação (EPC)
 * Template Part Type: SECTION
 * Template Part Page: Soluções EPC
 * Description: Título de um lado, texto do outro. Cards embaixo.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da seção.
 *  @var string $texto Texto da seção.
 *  @var string $cards Cards da seção.
 * }
 */
extract($args);
?>
<section class="section-apresentacao section-apresentacao--v2 flex justify-center bg-cinza-escuro-ultra padding-y-xl padding-y-xxxl@md">
  <div class="max-width-lg container grid gap-xl">

    <div class="col-12 col-6@md">
      <div class="section-apresentacao__titulo"><?= $titulo ?? '' ?></div>
    </div>

    <div class="col-12 col-6@md">
      <div class="section-apresentacao__texto"><?= $texto ?? '' ?></div>
    </div>

    <div class="col-12 grid gap-md">
      <?= $cards; ?>
    </div>

  </div>
</section>