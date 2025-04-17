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
<section class="section-miolo-post padding-top-xxl padding-bottom-md padding-bottom-xxl@md">
  <div class="max-width-lg container grid gap-md gap-xxl@md">
    <div class="col-12 col-8@md">
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

    <div class="col-12 col-4@md position-relative">
      <aside class="blog-sidebar position-sticky top-sm bg-cinza-claro">
        <div class="flex flex-column gap-lg">

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