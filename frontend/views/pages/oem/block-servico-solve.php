<?php

/**
 * Template Part Name: Servico Solve
 * Template Part Type: BLOCK
 * Template Part Page: Soluções O&M
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título do serviço
 * 	@var string $texto Texto do serviço
 * 	@var array $itens Itens do serviço
 * 	@var string $class Classe CSS adicional
 * }
 */
extract($args);
?>
<div class="block-servico-solve padding-lg flex flex-column gap-md <?= $class; ?>">

  <div class="flex flex-column gap-sm">
    <?php if (!empty($titulo)) : ?>
      <h3 class="block-servico-solve__titulo"><?= $titulo; ?></h3>
    <?php endif; ?>

    <?php if (!empty($texto)) : ?>
      <div class="block-servico-solve__texto paragrafo-branco"><?= $texto; ?></div>
    <?php endif; ?>
  </div>

  <?php if ($itens): ?>
    <ul class="block-servico-solve__itens grid gap-x-md gap-y-xs">
      <?php foreach ($itens as $item) : if (empty($item['titulo'])) continue; ?>
        <li class="block-servico-solve__item <?= $class === 'block-servico-solve--spot' ? 'col-12' : 'col-12 col-6@md'; ?>"><?= $item['titulo']; ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

</div>