<?php

/**
 * Template Part Name: FAQ nas Páginas (v1)
 * Template Part Type: SECTION
 * Template Part Page: Avulsos
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
<section class="section-faq-pages section-faq-pages--v1 bg-cinza-escuro-ultra">
  <div class="section-faq-pages__container max-width-lg container padding-md padding-xl@sm flex flex-column gap-lg">

    <div class="flex flex-column flex-row@sm justify-between items-stretch items-start@sm gap-md">
      <div class="flex flex-column gap-xs">
        <h2 class="section-faq-pages__titulo"><?= $titulo; ?></h2>
        <div class="section-faq-pages__texto"><?= $texto; ?></div>
      </div>
      <a href="<?= $cta_link; ?>" target="<?= $cta_target; ?>" class="btn btn--accent btn--hover-white"><?= $cta_texto; ?></a>
    </div>

    <div class="section-faq-pages__itens">
      <?php foreach ($categorias as $categoria): ?>
        <a href="/faq/?cat=<?= $categoria->slug; ?>" class="section-faq-pages__item flex justify-between gap-md items-center">
          <h3 class="section-faq-pages__item-titulo">Perguntas frequentes sobre <strong> <?= $categoria->name; ?></strong></h3>
          <div class="section-faq-pages__item-seta flex-shrink-0">
            <?= get_svg_content('seta-direita.svg', '', true, [], 'stroke'); ?>
          </div>
        </a>
      <?php endforeach; ?>
    </div>

  </div>
</section>