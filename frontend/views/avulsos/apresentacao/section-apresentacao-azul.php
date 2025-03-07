<?php

/**
 * Template Part Name: Apresentação (azul)
 * Template Part Type: SECTION
 * Template Part Page: Avulsos
 * Description: Subtítulo, Título e Texto em fundo azul.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $subtitulo Subtítulo da seção.
 * 	@var string $titulo Título da seção.
 *  @var string $texto Texto da seção.
 * }
 */
extract($args);
?>
<section class="section-apresentacao-azul bg-cinza-escuro-ultra padding-top-lg">
  <div class="max-width-md container flex flex-column gap-sm padding-y-xl padding-top-xxxl@md padding-bottom-xxl@md">
    <?php if (!empty($subtitulo)): ?>
      <h2 class="section-apresentacao-azul__subtitulo subtitulo-secao"><?= $subtitulo; ?></h2>
    <?php endif; ?>
    <?php if (!empty($titulo)): ?>
      <h1 class="section-apresentacao-azul__titulo"><?= $titulo; ?></h1>
    <?php endif; ?>
    <?php if (!empty($texto)): ?>
      <div class="section-apresentacao-azul__texto paragrafo-branco-lg"><?= $texto; ?></div>
    <?php endif; ?>
  </div>
</section>