<?php

/**
 * Template Part Name: Principal Resultados
 * Template Part Type: SECTION
 * Template Part Page: Resultados
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>
<section class="section-superior-resultados bg-cinza-escuro-ultra padding-bottom-lg">
  <div class="max-width-lg container flex flex-column gap-sm">

    <div class="grid gap-md">
      <?php foreach ($itens as $item): ?>
        <div class="section-superior-resultados__info col-12 col-4@md flex gap-sm">
          <?= $item['icone']; ?>
          <div class="flex flex-column gap-xxs">
            <div class="section-superior-resultados__info-titulo"><?= $item['titulo']; ?></div>
            <div class="section-superior-resultados__info-valor"><?= $item['valor']; ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="paragrafo-branco text-center">OBS: esta é uma simulação do valor. Os custos finais do projeto podem variar.</div>

  </div>
</section>