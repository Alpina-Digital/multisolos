<?php

/**
 * Template Part Name: Três Passos
 * Template Part Type: SECTION
 * Template Part Page: Avulsos
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da seção.
 *  @var array{nome:string,texto:string} $itens_numericos Lista de passos.
 *  @var string $cta_link Link do CTA.
 *  @var string $cta_texto Texto do CTA.
 *  @var string $cta_target Target do CTA.
 * }
 */
extract($args);
?>
<section class="bg-cinza-escuro-ultra section-tres-passos padding-y-xl padding-y-xxxl@md">
  <div class="max-width-lg container flex flex-column gap-xl">

    <div class="section-tres-passos__titulo titulo-secao"><?= $titulo ?? ''; ?></div>

    <div class="grid gap-xl gap-xxxl@md">

      <div class="col-12 col-8@md flex flex-column gap-xl items-start">
        <?php foreach ($itens_numericos as $i => $item): ?>
          <div class="section-tres-passos__item flex gap-md items-start">
            <div class="section-tres-passos__item-numero"><?= $i + 1; ?></div>
            <div class="flex flex-column gap-xs">
              <div class="section-tres-passos__item-titulo"><?= $item['titulo'] ?? ''; ?></div>
              <div class="section-tres-passos__item-texto"><?= $item['texto'] ?? ''; ?></div>
            </div>
          </div>
        <?php endforeach; ?>
        <?php if ($cta_link && $cta_texto): ?>
          <a href="<?= $cta_link; ?>" class="section-tres-passos__btn btn btn--accent" target="<?= $cta_target ?? '_self'; ?>"><?= $cta_texto; ?></a>
        <?php endif; ?>
      </div>


      <div class="col-12 col-4@md flex flex-column justify-end gap-sm">
        <?php foreach ($itens_check as $i => $item): ?>
          <div class="section-tres-passos__item-lateral flex flex-column gap-xs items-center">
            <?= get_svg_content('icon-check-reverse.svg'); ?>
            <div class="section-tres-passos__item-lateral-titulo"><?= $item['texto'] ?? ''; ?></div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>


  </div>
</section>