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

    <div class="max-width-lg container flex flex-column gap-lg padding-bottom-md padding-bottom-xs@md">
      <a href="<?= $voltar; ?>" class="section-cabecalho-post__voltar flex gap-xxs items-center margin-top-md"> <?= get_svg_content('/blog/seta-voltar.svg'); ?> Blog </a>

      <div class="flex flex-column gap-md">
        <h1 class="section-cabecalho-post__titulo color-white"><?= $titulo; ?></h1>
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