<?php

/**
 * Template Part Name: Principal (Blog)
 * Template Part Type: SECTION
 * Template Part Page: Blog
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
<section class="section-principal-blog bg-cinza-claro padding-top-xxl@md padding-bottom-lg">
  <div class="max-width-lg container flex flex-column gap-md gap-xl@md">

    <div class="flex flex-column flex-row@md gap-md justify-between@md items-center items-end@md">
      <h2 class="titulo-secao"><?= $titulo; ?></h2>
      <form class="section-principal-blog__busca">
        <div class="search-input search-input--icon-right">
          <input class="section-principal-blog__input search-input__input form-control" type="search" name="pesquisa" id="search-input" placeholder="O que você procura?" value="<?= $pesquisa ?? ''; ?>" aria-label="Pesquisa">
          <button class="search-input__btn cursor-pointer margin-right-xxs">
            <?= $lupa; ?>
          </button>
        </div>
        <?php if ($categoria_selecionada): ?>
          <input type="hidden" name="categoria" value="<?= $categoria_selecionada ?? ''; ?>">
        <?php endif; ?>
      </form>
    </div>

    <div class="hide@lg">
      <ul class="section-principal-blog__categorias padding-bottom-md flex flex-wrap justify-center gap-xs">
        <li class="section-principal-blog__categoria-li flex-shrink-0">
          <a href="javascript:;" class="section-principal-blog__categoria" aria-selected="<?= empty($categoria_selecionada) ? 'true' : 'false'; ?>" data-slug="">Todas</a>
        </li>
        <?php foreach ($categorias as $cat): ?>
          <li class="section-principal-blog__categoria-li flex-shrink-0">
            <a href="javascript:;" class="section-principal-blog__categoria" aria-selected="<?= $categoria_selecionada === $cat->slug ? 'true' : 'false'; ?>" data-slug="<?= $cat->slug; ?>"><?= $cat->name; ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="tabs hide flex@lg justify-center">
      <ul class="section-principal-blog__tabs flex">
        <li class=" section-principal-blog__tab flex-shrink-0">
          <a href="javascript:;" class="tabs__control" aria-selected="<?= empty($categoria_selecionada) ? 'true' : 'false'; ?>" data-slug="">Todas</a>
        </li>
        <?php foreach ($categorias as $cat): ?>
          <li class=" section-principal-blog__tab flex-shrink-0">
            <a href="javascript:;" class="tabs__control" aria-selected="<?= $categoria_selecionada === $cat->slug ? 'true' : 'false'; ?>" data-slug="<?= $cat->slug; ?>"><?= $cat->name; ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>


    <?php if ($cards): ?>
      <div class="grid gap-md gap-x-lg@md gap-y-xl@md">
        <?= $cards; ?>
      </div>

      <div class="section-principal-blog__paginacao">
        <?= $paginacao; ?>
      </div>
    <?php elseif ($pesquisa): ?>
      <div class="section-principal-blog__notfound paragrafo-branco-lg"> Nada foi encontrado. Tente fazer uma nova busca. </div>
    <?php else: ?>
      <div class="section-principal-blog__notfound paragrafo-branco-lg"> Não há notícias a serem exibidas. </div>
    <?php endif; ?>

  </div>
</section>