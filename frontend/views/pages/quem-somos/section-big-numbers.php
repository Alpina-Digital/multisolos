<?php

/**
 * Template Part Name: Big Numbers
 * Template Part Type: SECTION
 * Template Part Page: Quem Somos
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var stdClass[] $itens Itens de big numbers.
 * }
 */
extract($args);
?>
<section class="section-big-numbers">
  <div class="max-width-lg container@md position-relative">
    <div class="section-big-numbers__wrapper bg-primary padding-xl grid gap-lg">
      <?php foreach ($itens as $item): ?>
        <div class="section-big-numbers__big col-12 col-4@sm flex flex-row gap-sm">
          <figure class="section-big-numbers__icone">
            <?= $item->icone ?? ''; ?>
          </figure>
          <div class="flex flex-column gap-xxs">
            <div class="section-big-numbers__numero"><?= $item->numero ?? ''; ?></div>
            <div class="section-big-numbers__legenda"><?= $item->legenda ?? ''; ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>