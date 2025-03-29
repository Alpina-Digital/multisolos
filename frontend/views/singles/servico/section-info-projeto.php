<?php

/**
 * Template Part Name: Info Projeto
 * Template Part Type: SECTION
 * Template Part Page: Projeto
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 *  @var string $potencia Potência do projeto
 *  @var string $localizacao Localização do projeto
 * }
 */
extract($args);
?>
<section class="section-info-projeto bg-cinza-escuro-ultra padding-top-md padding-top-lg@md">
  <div class="max-width-lg container grid gap-md">

    <div class="section-info-projeto__info col-12 col-4@md flex gap-sm items-center">
      <?= get_svg_content('projeto/potencia.svg'); ?>
      <div class="flex flex-column gap-xxs">
        <div class="section-info-projeto__info-titulo">Potência</div>
        <div class="section-info-projeto__info-valor"><?= $potencia; ?></div>
      </div>
    </div>

    <div class="section-info-projeto__info col-12 col-4@md flex gap-sm items-center">
      <?= get_svg_content('projeto/localizacao.svg'); ?>
      <div class="flex flex-column gap-xxs">
        <div class="section-info-projeto__info-titulo">Localização</div>
        <div class="section-info-projeto__info-valor"><?= $localizacao ?? ''; ?></div>
      </div>
    </div>

    <div class="col-12 col-4@md flex flex-column justify-between">
      <a href="/orcamento" class="btn btn--accent btn--hover-white">Solicitar Orçamento</a>
      <a href="/simular" class="btn btn--primary btn--hover-white">Simular Investimento</a>
    </div>

  </div>
</section>