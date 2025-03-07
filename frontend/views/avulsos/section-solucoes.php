<?php

/**
 * Template Part Name: Solucoes
 * Template Part Type: SECTION
 * Template Part Page: Avulsos
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @cody _1_tabs
 * 
 * @var $args {
 * 	@var string $titulo Titulo da seção.
 * 	@var string $subtitulo Subtitulo da seção.
 * 	@var array<int,stdClass> $tipos Subtitulo da seção.
 * }
 */
extract($args);
?>
<section class="section-solucoes bg-cinza-escuro-ultra <?= $class; ?>">
  <div class="max-width-lg container flex flex-column gap-lg">

    <div class="flex flex-column-reverse flex-row@md gap-md justify-between items-start items-center@md">
      <h2 class="section-solucoes__titulo titulo-secao"><?= $titulo; ?></h2>
      <h3 class="section-solucoes__subtitulo subtitulo-secao"><?= $subtitulo; ?></h3>
    </div>

    <div class="tabs js-tabs grid gap-md gap-xl@md">

      <div class="col-12 col-6@md">
        <ul class="flex flex-column gap-xs js-tabs__controls" aria-label="Tabs Interface">
          <?php foreach ($tipos as $i => $tipo) : ?>
            <li>
              <a href="<?= $tipo->cta_link; ?>" data-link="" class="section-solucoes__item tabs__control flex flex-row gap-sm" aria-selected="true">
                <?= $tipo->icone ?? ''; ?>

                <div class="flex flex-column gap-xxs">
                  <span class="section-solucoes__solucao-titulo"><?= $tipo->titulo ?? ''; ?></span>
                  <span class="section-solucoes__solucao-texto"><?= $tipo->texto ?? ''; ?></span>
                </div>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="col-12 col-6@md">
        <div class="js-tabs__panels height-100%">
          <?php foreach ($tipos as $i => $tipo): ?>
            <a href="<?= $tipo->cta_link ?? '#0'; ?>" id="tab-solucoes-<?= $i; ?>" class="section-solucoes__imagem-tab js-tabs__panel height-100% flex justify-end items-end" style="--section-solucoes-imagem-tab: url('<?= $tipo->imagem ?? ''; ?>');">
              <div class="btn btn--accent">Ver mais</div>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </div>
</section>