<?php

/**
 * Template Part Name: Blog
 * Template Part Type: CARD
 * Template Part Page: Cards
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da notícia.
 * 	@var string $categoria Categoria da notícia.
 * 	@var string $resumo Resumo da notícia.
 * 	@var string $link Link da notícia.
 * 	@var string $imagem Imagem da notícia.
 * }
 */
extract($args);
?>
<a href="<?= $link ?? ''; ?>" class="card-blog flex flex-column items-start bg-white <?= $classes; ?>">

  <div class="card-blog__div-img" style="--card-blog-imagem: url('<?= $imagem ?: get_media_src('placeholders/placeholder.webp'); ?>');">
    <div class="card-blog__botao btn btn--accent padding-y-xs"><?= get_svg_content('arrow-diagonal.svg'); ?></div>
  </div>
  <div class="card-blog__div-texto">
    <h3 class="card-blog__titulo"><?= $titulo ?? ''; ?></h3>
    <div class="card-blog__texto line-clamp-2"><?= $resumo ?? ''; ?></div>
  </div>

</a>