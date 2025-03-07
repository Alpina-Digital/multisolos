<?php

/**
 * Template Part Name: Miolo Post
 * Template Part Type: SECTION
 * Template Part Page: Post
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $conteudo Conteúdo do post.
 * }
 */
extract($args);
?>
<section class="section-miolo-post">
  <div class="max-width-lg container grid gap-md gap-xxl@md">

    <figure class="section-miolo-post__destaque">
      <?= $imagem; ?>
    </figure>

    <div class="col-12 col-9@md">
      <article class="blog-content article text-component">
        <?= $conteudo; ?>
      </article>
      <div class="blog-publicado">
        <div class="blog-publicado__data">Publicado em <?= $criado; ?></div>
        <?php if ($modificado): ?>
          <div class="blog-publicado__data">Última modificação em <?= $modificado; ?></div>
        <?php endif; ?>
      </div>
    </div>

    <div class="col-12 col-3@md position-relative">
      <aside class="blog-sidebar position-sticky top-sm">
        <div class="flex flex-column gap-lg">

          <?php if ($categorias): ?>
            <div class="flex flex-column gap-sm">
              <h3>Navegue por categorias</h3>
              <ul class="flex flex-column gap-xs">
                <?php foreach ($categorias as $categoria): ?>
                  <li><a href="<?= home_url('blog'); ?>/?categoria=<?= $categoria->slug; ?>"><?= $categoria->name; ?></a></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <div class="flex flex-column gap-sm">
            <h3>Compartilhe</h3>
            <div class="flex gap-xxs">
              <?php foreach ($shares as $share): ?>
                <a href="<?= $share->link; ?>" class="blog-sidebar__icone" target="_blank">
                  <?= $share->icone; ?>
                </a>
              <?php endforeach; ?>
            </div>
          </div>

        </div>
      </aside>
    </div>

  </div>
</section>