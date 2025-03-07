<?php

/**
 * Template Part Name: Etapas Projeto
 * Template Part Type: SECTION
 * Template Part Page: -
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 *  @var string $subtitulo Subtítulo da seção.
 *  @var string $titulo Título da seção.
 *  @var string $cta_link Link do botão de chamada para ação.
 *  @var string $cta_texto Texto do botão de chamada para ação.
 *  @var string $cta_target Target do link do botão de chamada para ação.
 *  @var string $itens Conteúdo HTML dos itens da seção.
 * @var bool $texto_itens Se os itens devem ter texto.
 * }
 */
extract($args);
?>
<section class="section-etapas-projeto bg-cinza-escuro-ultra <?= $classes; ?>">
  <div class="max-width-lg container grid gap-xl gap-xxl@md">

    <div class="col-12 col-4@md flex flex-column gap-xl items-start">
      <div class="flex flex-column gap-sm">
        <h3 class="section-etapas-projeto__subtitulo subtitulo-secao"><?= $subtitulo ?? ''; ?></h3>
        <h2 class="section-etapas-projeto__titulo titulo-secao"><?= $titulo ?? ''; ?></h2>
      </div>
      <?php if (!empty($cta_link) && !empty($cta_texto)): ?>
        <a href="<?= $cta_link; ?>" class="btn btn--accent hide block@md" target="<?= $cta_target; ?>"><?= $cta_texto; ?></a>
      <?php endif; ?>
    </div>

    <?php if (!empty($texto_itens)): ?>
      <div class="col-12 col-8@md">
        <ul class="accordion  js-accordion" data-animation="on" data-multi-items="off">
          <?= $itens; ?>
        </ul>
      </div>

    <?php else: ?>
      <div class="col-12 col-8@md grid gap-y-sm gap-x-xxl">
        <?= $itens; ?>
      </div>

    <?php endif; ?>

    <?php if (!empty($cta_link) && !empty($cta_texto)): ?>
      <a href="<?= $cta_link; ?>" class="btn btn--accent hide@md" target="<?= $cta_target; ?>"><?= $cta_texto; ?></a>
    <?php endif; ?>

  </div>
</section>