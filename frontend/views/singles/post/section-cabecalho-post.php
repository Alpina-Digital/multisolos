<?php

/**
 * Template Part Name: Cabeçalho (Post)
 * Template Part Type: SECTION
 * Template Part Page: Post
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
<section class="section-cabecalho-post padding-top-xxl padding-top-xxxl@md">
  <div class="bg-cinza-escuro">

    <div class="max-width-lg container flex flex-column gap-lg padding-bottom-md padding-bottom-xs@md">
      <a href="<?= $voltar; ?>" class="section-cabecalho-post__voltar flex gap-xxs items-center margin-top-md"> <?= $voltar_seta; ?> Blog </a>

      <div class="flex flex-column gap-md">
        <h1 class="section-cabecalho-post__titulo titulo-secao-mini color-white"><?= $titulo; ?></h1>

        <div class="flex flex-column flex-row@xs gap-md">
          <?php if ($categorias): ?>
            <div class="flex flex-wrap gap-sm">
              <?php foreach ($categorias as $categoria): ?>
                <div class="section-cabecalho-post__categoria"><?= $categoria->name; ?></div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
          <div class="section-cabecalho-post__leitura flex gap-xxxs items-center flex-shrink-0"> <?= $relogio; ?>Tempo de leitura: <em><?= $tempo; ?></em> </div>
        </div>

      </div>
    </div>

  </div>

  <div class="section-cabecalho-post__gradient margin-top-md">
    <div class="max-width-lg container">
      <figure class="section-cabecalho-post__destaque">
        <?= $imagem; ?>
      </figure>
    </div>
  </div>

</section>