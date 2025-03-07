<?php

/**
 * Template Part Name: Opções Financiamento
 * Template Part Type: SECTION
 * Template Part Page: Resultados
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>
<section class="section-opcoes-financiamento bg-cinza-escuro-ultra padding-top-lg padding-bottom-xl padding-bottom-xxxl@md">
  <div class="max-width-lg container flex flex-column gap-lg">

    <div class="flex flex-column gap-sm">
      <h2 class="section-opcoes-financiamento__titulo titulo-secao text-center"><?= $titulo; ?></h2>
      <h3 class="section-opcoes-financiamento__texto text-center color-white"><?= $texto; ?></h3>
    </div>

    <div class="flex flex-column gap-md">

      <div class="grid gap-md">
        <?php foreach ($itens as $item): ?>
          <div class="section-opcoes-financiamento__item col-12 col-4@md flex flex-column gap-sm">
            <div class="section-opcoes-financiamento__item-titulo"><?= $item['subtitulo']; ?></div>
            <div class="flex flex-column gap-xs">
              <div class="section-opcoes-financiamento__item-valor"><?= $item['valor']; ?></div>
              <?php if (!empty($item['texto'])): ?>
                <div class="section-opcoes-financiamento__item-texto"><?= $item['texto']; ?></div>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="section-opcoes-financiamento__block-cta flex justify-between items-center gap-md">

        <div class="section-opcoes-financiamento__block-cta-texto text-component"><?= $texto_cta; ?></div>

        <?php if (!empty($cta_link) && !empty($cta_texto)): ?>
          <a href="<?= $cta_link; ?>" target="<?= $cta_target ?? '_self'; ?>" class="section-sistema-solar__btn btn btn--accent"><?= $cta_texto; ?></a>
        <?php endif; ?>

      </div>

    </div>


  </div>
</section>