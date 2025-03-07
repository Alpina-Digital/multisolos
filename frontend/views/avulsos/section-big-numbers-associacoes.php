<?php

/**
 * Template Part Name: Big Numbers + Associações
 * Template Part Type: SECTION
 * Template Part Page: -
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var array<int,array<string,string>> $itens Itens de big numbers.
 * }
 */
extract($args);
?>
<section class="section-big-numbers-associacoes bg-cinza-escuro-ultra padding-bottom-xl">
  <div class="section-big-numbers-associacoes__wrapper max-width-md container padding-xl@md grid gap-sm gap-xxl@md">

    <div class="section-big-numbers-associacoes__bigs col-12 col-9@sm grid gap-y-lg gap-x-xl">
      <?php foreach ($itens as $item): ?>
        <div class="section-big-numbers-associacoes__big col-12 col-6@sm flex flex-row gap-sm">
          <figure class="section-big-numbers-associacoes__icone">
            <?= $item['icone'] ?? ''; ?>
          </figure>
          <div class="flex flex-column gap-xxs">
            <div class="section-big-numbers-associacoes__numero"><?= $item['numero'] ?? ''; ?></div>
            <div class="section-big-numbers-associacoes__legenda"><?= $item['legenda'] ?? ''; ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="section-big-numbers-associacoes__associacoes col-12 col-3@sm">
      <div class="section-big-numbers-associacoes__associacoes-wrapper flex flex-column gap-md items-start">
        <?php foreach ($associacoes as $associacao): ?>
          <div class="section-big-numbers-associacoes__associacao flex flex-column gap-xxs items-start">
            <figure class="section-big-numbers-associacoes__associacao-logo">
              <?= $associacao['logo'] ?? ''; ?>
            </figure>
            <div class="section-big-numbers-associacoes__associacao-descricao">
              <p><?= $associacao['descricao_curta'] ?? ''; ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
  <div class="padding-bottom-xxxl@md"></div>
</section>