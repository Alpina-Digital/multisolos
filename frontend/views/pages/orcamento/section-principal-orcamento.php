<?php

/**
 * Template Part Name: Principal (Orçamento)
 * Template Part Type: SECTION
 * Template Part Page: Solicitar Orçamento
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @cody _1_example //coloque aqui os elementos do Cody que foram usados nessa template part.
 * 
 * @var $args {
 * 	@var string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>
<section class="section-principal-orcamento bg-cinza-escuro-ultra padding-bottom-xl">
  <div class="max-width-md container flex flex-column gap-xl">

    <div class="flex flex-column gap-sm">
      <h3 class="section-principal-orcamento__titulo">Selecione o tipo de instalação:</h3>
      <div class="grid grid-col-5@md gap-sm">
        <?php foreach ($tipos as $tipo): ?>
          <div class="section-principal-orcamento__item section-principal-orcamento__item--instalacao col-12 col-6@xxxs col-4@xs col-1@md flex flex-column gap-xs items-center" data-solucao="<?= $tipo['nome']; ?>">
            <div class="section-principal-orcamento__checkbox custom-checkbox">
              <input class="custom-checkbox__input" type="checkbox" aria-label="Checkbox label">
              <div class="custom-checkbox__control" aria-hidden="true"></div>
            </div>
            <div class="section-principal-orcamento__item-icone">
              <?= $tipo['icone']; ?>
            </div>
            <h4 class="section-principal-orcamento__item-titulo text-center"><?= $tipo['nome']; ?></h4>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="flex flex-column gap-sm">
      <h3 class="section-principal-orcamento__titulo">Ou selecione a solução:</h3>
      <div class="grid gap-sm">
        <?php foreach ($solucoes as $solucao): ?>
          <div class="section-principal-orcamento__item section-principal-orcamento__item--solucao col-12 col-6@xxxs col-3@sm flex gap-xs items-center" data-solucao="<?= $solucao; ?>">
            <div class="section-principal-orcamento__checkbox custom-checkbox">
              <input class="custom-checkbox__input" type="checkbox" aria-label="Checkbox label">
              <div class="custom-checkbox__control" aria-hidden="true"></div>
            </div>
            <h4 class="section-principal-orcamento__item-titulo"><?= $solucao; ?></h4>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="flex flex-column gap-md">
      <h3 class="section-principal-orcamento__titulo">Preencha o formulário abaixo:</h3>
      <div class="section-principal-orcamento__form-holder">
        <div class="section-principal-orcamento__form-container cf7-form-block"><?= $form; ?></div>
      </div>
    </div>

  </div>
</section>