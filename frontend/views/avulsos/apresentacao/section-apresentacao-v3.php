<?php

/**
 * Template Part Name: Apresentação (v3)
 * Template Part Type: SECTION
 * Template Part Page: Avulsos
 * Description: Título com vários botões de um lado e texto do outro.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da seção.
 *  @var string $texto Texto da seção.
 *  @var array<string,string> $botoes Botões da seção.
 * }
 */
extract($args);
?>
<section class="section-apresentacao section-apresentacao--v3 flex justify-center bg-cinza-escuro-ultra padding-y-xl padding-y-xxxl@md">
  <div class="max-width-lg container grid gap-lg gap-xxl@md">

    <div class="col-12 col-5@md flex flex-column gap-xl items-start">
      <?php if (!empty($titulo)): ?>
        <div class="section-apresentacao__titulo"><?= $titulo; ?></div>
      <?php endif; ?>

      <div class="hide flex@md flex-column gap-xs">
        <?php foreach ($botoes as $botao) : if (empty($botao['cta_link']) || empty($botao['cta_texto'])) continue; ?>
          <a href="<?= $botao['cta_link']; ?>" target="<?= $botao['cta_target'] ?? '_self'; ?>" class="btn btn--accent">
            <?= $botao['cta_texto']; ?></a>
        <?php endforeach; ?>
      </div>

    </div>

    <?php if (!empty($texto)): ?>
      <div class="col-12 col-7@md">
        <div class="section-apresentacao__texto"><?= $texto ?? '' ?></div>
      </div>
    <?php endif; ?>

    <div class="hide@md flex flex-column gap-md">
      <?php foreach ($botoes as $botao) : if (empty($botao['cta_link']) || empty($botao['cta_texto'])) continue; ?>
        <a href="<?= $botao['cta_link']; ?>" target="<?= $botao['cta_target'] ?? '_self'; ?>" class="btn btn--accent">
          <?= $botao['cta_texto']; ?></a>
      <?php endforeach; ?>
    </div>

  </div>
</section>