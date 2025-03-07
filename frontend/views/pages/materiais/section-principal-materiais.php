<?php

/**
 * Template Part Name: Principal (Materiais)
 * Template Part Type: SECTION
 * Template Part Page: Materiais Ricos
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @cody _1_tabs
 * 
 * @var $args {
 * 	@var string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>
<section class="section-principal-materiais bg-cinza-escuro-ultra">
  <div class="max-width-lg container flex flex-column gap-md gap-xl@md">

    <div class="tabs flex justify-center">
      <ul class="section-principal-materiais__tabs flex">
        <li class=" section-principal-materiais__tab flex-shrink-0">
          <a href="javascript:;" class="tabs__control" aria-selected="<?= empty($categoria_selecionada) ? 'true' : 'false'; ?>" data-slug="">Todos</a>
        </li>
        <?php foreach ($categorias as $cat): ?>
          <li class=" section-principal-materiais__tab flex-shrink-0">
            <a href="javascript:;" class="tabs__control" aria-selected="<?= $categoria_selecionada === $cat->slug ? 'true' : 'false'; ?>" data-slug="<?= $cat->slug; ?>"><?= $cat->name; ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>


    <?php if ($cards): ?>
      <div class="grid gap-md gap-lg@md">
        <?= $cards; ?>
      </div>

      <div class="section-principal-materiais__paginacao">
        <?= $paginacao; ?>
      </div>
    <?php else: ?>
      <div class="section-principal-materiais__notfound paragrafo-branco-lg"> Não há materiais ricos a serem exibidos. </div>
    <?php endif; ?>

  </div>
</section>