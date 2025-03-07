<?php

/**
 * Template Part Name: Apresentação Solve
 * Template Part Type: SECTION
 * Template Part Page: Soluções O&M
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $logo Logo da Solve.
 * 	@var string $titulo Título da seção
 * 	@var string $texto Texto da seção
 * 	@var string $enfeites Enfeites da seção.
 * 	@var string $icone Ícone lateral da seção.
 * }
 */
extract($args);
?>
<section class="section-apresentacao-solve">
  <div class="max-width-lg container grid gap-0 gap-xxxl@md items-center">

    <div class="col-12 col-8@md flex flex-column gap-lg">
      <?= $logo ?? ''; ?>

      <?php if (!empty($titulo)) : ?>
        <h2 class="section-apresentacao-solve__titulo"><?= $titulo; ?></h2>
      <?php endif; ?>

      <?php if (!empty($texto)) : ?>
        <div class="section-apresentacao-solve__texto"><?= $texto ?></div>
      <?php endif; ?>

      <?= $enfeites; ?>
    </div>

    <div class="col-12 col-4@md hide block@md">
      <?= $icone; ?>
    </div>

  </div>
</section>