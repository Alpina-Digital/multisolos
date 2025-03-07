<?php

/**
 * Template Part Name: Energia Solar Como Investimento
 * Template Part Type: SECTION
 * Template Part Page: Quem Somos
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Titulo da seção.
 *  @var string $texto Texto da seção.
 *  @var string $titulo_azul Titulo do bloco azul.
 *  @var string $texto_azul Texto do bloco azul.
 * }
 */
extract($args);
?>
<section class="bg-cinza-escuro-ultra <?= $class; ?>">
  <div class="banner-energia-solar-como-investimento max-width-lg padding-y-xl padding-y-xxxl@md container@md padding-x-lg padding-x-xl@md grid gap-md"
    style="--banner-energia-solar-imagem:url('<?= $imagem; ?>')">
    <div class="col-12 col-7@md flex flex-column gap-md">
      <h2 class="banner-energia-solar-como-investimento__subtitulo text-center text-left@md"><?= $subtitulo ?? ''; ?></h2>
      <div class="banner-energia-solar-como-investimento__titulo text-center text-left@md"><?= $titulo ?? ''; ?></div>
    </div>
    <div class="banner-energia-solar-como-investimento__card col-12 flex flex-column flex-row@md justify-between@md items-center gap-md">
      <div class="flex flex-column gap-xs gap-xxs@md">
        <h2 class="banner-energia-solar-como-investimento__card-h2 text-center text-left@md"><?= $titulo_azul ?? ''; ?></h2>
        <div class="banner-energia-solar-como-investimento__card-texto text-component text-center text-left@md"><?= $texto_azul ?? ''; ?></div>
      </div>
      <?php if (!empty($cta_texto) && !empty($cta_link)): ?>
        <a href="<?= $cta_link; ?>" target="<?= $cta_target; ?>" class="banner-energia-solar-como-investimento__botao btn btn--accent btn--hover-white"><?= $cta_texto; ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>