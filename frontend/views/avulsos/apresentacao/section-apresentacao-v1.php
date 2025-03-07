<?php

/**
 * Template Part Name: Apresentação (v1)
 * Template Part Type: SECTION
 * Template Part Page: Avulsos
 * Description: Título, texto e botão de um lado. Imagem de outro.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da seção.
 *  @var string $texto Texto da seção.
 *  @var string $cta_texto Texto do botão.
 *  @var string $cta_link URL do botão.
 *  @var string $cta_target Target do botão.
 *  @var string $imagem URL da imagem.
 * }
 */
extract($args);
?>
<section class="section-apresentacao section-apresentacao--v1 flex justify-center bg-cinza-escuro-ultra padding-y-xl padding-y-xxxl@md">
  <div class="max-width-lg container grid gap-xl">

    <div class="col-12 col-6@md flex flex-column gap-lg items-start">
      <div class="section-apresentacao__titulo"><?= $titulo ?? '' ?></div>
      <div class="section-apresentacao__texto"><?= $texto ?? '' ?></div>
      <?php if (!empty($cta_texto) && !empty($cta_link)) : ?>
        <a class="section-apresentacao__btn btn btn--accent" href="<?= $cta_link ?>" target="<?= $cta_target ?? '_self' ?>">
          <?= $cta_texto ?>
        </a>
      <?php endif; ?>
    </div>

    <div class="col-12 col-6@md">
      <div class="section-apresentacao__figure">
        <?= $imagem ?? ''; ?>
      </div>
    </div>

  </div>
</section>