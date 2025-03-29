<?php

/**
 * Template Part Name: Principal (Servicos)
 * Template Part Type: SECTION
 * Template Part Page: Servicos
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
<section class="section-principal-servicos bg-cinza-escuro-ultra padding-top-xl padding-top-xxl@md">
  <div class="max-width-lg container flex flex-column gap-md gap-xl@md">

    <div class="hide@lg">
      <ul class="section-principal-servicos__categorias padding-bottom-md flex flex-wrap justify-center gap-xs">
        <li class="section-principal-servicos__categoria-li flex-shrink-0">
          <a href="javascript:;" class="section-principal-servicos__categoria" aria-selected="<?= empty($categoria_selecionada) ? 'true' : 'false'; ?>" data-slug="">Todos</a>
        </li>
        <?php foreach ($categorias as $cat): ?>
          <li class="section-principal-servicos__categoria-li flex-shrink-0">
            <a href="javascript:;" class="section-principal-servicos__categoria" aria-selected="<?= $categoria_selecionada === $cat->slug ? 'true' : 'false'; ?>" data-slug="<?= $cat->slug; ?>"><?= $cat->name; ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="tabs hide flex@lg justify-center">
      <ul class="section-principal-servicos__tabs flex">
        <li class=" section-principal-servicos__tab flex-shrink-0">
          <a href="javascript:;" class="tabs__control" aria-selected="<?= $categoria_selecionada === 'todos' ? 'true' : 'false'; ?>" data-slug="todos">Todos</a>
        </li>
        <?php foreach ($categorias as $cat): ?>
          <li class=" section-principal-servicos__tab flex-shrink-0">
            <a href="javascript:;" class="tabs__control" aria-selected="<?= $categoria_selecionada === $cat->slug ? 'true' : 'false'; ?>" data-slug="<?= $cat->slug; ?>"><?= $cat->name; ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>


    <?php if ($cards): ?>
      <div class="grid gap-md">
        <?= $cards; ?>
      </div>

      <div class="section-principal-servicos__paginacao">
        <?= $paginacao; ?>
      </div>
    <?php else: ?>
      <div class="section-principal-servicos__notfound paragrafo-branco-lg"> Não há servicos a serem exibidos. </div>
    <?php endif; ?>

  </div>
</section>