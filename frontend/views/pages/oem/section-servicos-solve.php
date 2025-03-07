<?php

/**
 * Template Part Name: Servicos Solve
 * Template Part Type: SECTION
 * Template Part Page: Soluções O&M
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da seção.
 * 	@var string $cta_texto Texto do botão.
 * 	@var string $cta_link Link do botão.
 * 	@var string $personalizados Conteúdo do bloco Serviços Personalizados.
 * 	@var string $comissionamentos Conteúdo dos blocos de Comissionamento.
 * 	@var string $spot Conteúdo do bloco Spot.
 * }
 */
extract($args);
?>
<section class="section-servicos-solve">
  <div class="section-servicos-solve__container max-width-lg container@md flex flex-column gap-lg">

    <div class="flex flex-column flex-row@xxs text-center text-left@xxs gap-md items-center justify-between">
      <?php if (!empty($titulo)) : ?>
        <h2 class="section-servicos-solve__titulo titulo-secao"><?= $titulo; ?></h2>
      <?php endif; ?>

      <?php if (!empty($cta_texto) && !empty($cta_link)) : ?>
        <a href="<?= $cta_link; ?>" class="section-servicos-solve__btn btn btn--accent"><?= $cta_texto; ?></a>
      <?php endif; ?>
    </div>

    <div class="grid gap-md">
      <div class="col-12"><?= $personalizados; ?></div>

      <div class="col-12 col-6@md flex flex-column gap-md">
        <?= $comissionamentos; ?>
      </div>

      <div class="col-12 col-6@md"><?= $spot; ?></div>
    </div>

  </div>
</section>