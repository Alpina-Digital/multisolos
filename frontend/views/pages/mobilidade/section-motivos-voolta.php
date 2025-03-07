<?php

/**
 * Template Part Name: Motivos Voolta
 * Template Part Type: SECTION
 * Template Part Page: Soluções Mobilidade
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
<section class="section-motivos-voolta bg-voolta-black padding-top-xl">
  <div class="max-width-lg container flex flex-column gap-xl items-center">

    <div class="flex flex-column gap-lg items-center text-center">
      <?php if (!empty($titulo)) : ?>
        <h2 class="section-motivos-voolta__titulo titulo-secao"><?= $titulo; ?></h2>
      <?php endif; ?>

      <?php if (!empty($texto)) : ?>
        <div class="section-motivos-voolta__texto paragrafo-branco"><?= $texto; ?></div>
      <?php endif; ?>
    </div>

    <?php if (!empty($cards)) : ?>
      <div class="grid gap-sm">
        <?php foreach ($cards as $card) : ?>
          <div class="section-motivos-voolta__card col-12 col-6@sm col-3@md flex flex-column gap-sm items-center text-center">
            <?= $card['icone'] ?? ''; ?>

            <div class="flex flex-column gap-xs">
              <?php if (!empty($card['titulo'])) : ?>
                <h3 class="section-motivos-voolta__card-titulo"><?= $card['titulo']; ?></h3>
              <?php endif; ?>

              <?php if (!empty($card['texto'])) : ?>
                <div class="section-motivos-voolta__card-texto"><?= $card['texto']; ?></div>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($cta_texto) && !empty($cta_link)) : ?>
      <a href="<?= $cta_link; ?>" target="<?= $cta_target ?? '_self'; ?>" class="section-motivos-voolta__cta btn btn--accent"><?= $cta_texto; ?></a>
    <?php endif; ?>

  </div>
</section>