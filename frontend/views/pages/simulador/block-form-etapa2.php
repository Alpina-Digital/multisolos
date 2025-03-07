<?php

/**
 * Template Part Name: Form Etapa2
 * Template Part Type: BLOCK
 * Template Part Page: Simulador
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
<div class="block-form-etapa2 flex flex-column gap-lg">

  <div class="flex flex-column gap-sm">
    <h3 class="block-form-etapa2__titulo">Selecione o tipo de instalação:</h3>
    <div class="grid gap-sm">
      <?php foreach ($tipos as $tipo): ?>
        <div class="block-form-etapa2__item block-form-etapa2__item--instalacao col-12 col-6@xs col-3@sm flex flex-column gap-xs items-center" data-instalacao="<?= $tipo['nome']; ?>">
          <div class="block-form-etapa2__checkbox custom-checkbox">
            <input class="custom-checkbox__input" type="checkbox" aria-label="Checkbox label">
            <div class="custom-checkbox__control" aria-hidden="true"></div>
          </div>
          <div class="block-form-etapa2__item-icone">
            <?= $tipo['icone']; ?>
          </div>
          <h4 class="block-form-etapa2__item-titulo text-center"><?= $tipo['nome']; ?></h4>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="section-principal-orcamento__form-holder">
    <?= $form; ?>
  </div>

</div>