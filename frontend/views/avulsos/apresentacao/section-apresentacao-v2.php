<?php

/**
 * Template Part Name: Apresentação (v2)
 * Template Part Type: SECTION
 * Template Part Page: Avulsos
 * Description: Título de um lado, texto e botão do outro.
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
 * }
 */
extract($args);
?>
<section class="section-apresentacao section-apresentacao--v2 flex justify-center bg-cinza-escuro-ultra padding-y-xl padding-y-xxxl@md">
  <div class="max-width-lg container grid gap-lg gap-xl@md">
    <div class="col-12 col-6@md">
      <div class="section-apresentacao__titulo"><?= $titulo ?? '' ?></div>
    </div>
    <div class="col-12 col-6@md flex flex-column gap-md items-start">
      <div class="section-apresentacao__texto"><?= $texto ?? '' ?></div>
      <?php if ($cta_texto && $cta_link) : ?>
        <a class="section-apresentacao__btn btn btn--accent flex gap-xxs" href="<?= $cta_link ?>" target="<?= $cta_target ?? '_self' ?>">
          <?= $cta_texto ?>
          <?php if (preg_match("%#[a-z]%", $cta_link)) echo get_svg_content('seta-down.svg', '', true); ?>
        </a>
      <?php endif; ?>
    </div>
  </div>
</section>