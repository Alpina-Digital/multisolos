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