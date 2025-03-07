<?php

/**
 * Template Part Name: Superior/Contato
 * Template Part Type: COL
 * Template Part Page: Footer
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 * 
 * @var $args {
 * 	@var array $itens
 * }
 */
extract($args);
?>
<div class="col-contato flex flex-column gap-xl">

  <div>
    <h3 class="footer__title">Contato</h3>
    <div class="flex flex-column gap-xs">
      <?php foreach ($contatos as $item): ?>
        <a href="<?= $item->link; ?>" class="footer__link flex gap-xxs"
          <?php if ($item->modal): ?> aria-controls="modal-footer" data-url="<?= $item->modal; ?>" <?php endif; ?>>
          <?= $item->icone; ?>
          <span><?= $item->value; ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

  <div>
    <h3 class="footer__title">Conecte-se com a gente</h3>
    <div class="flex gap-xs">
      <?php foreach ($sociais as $item):
        if (empty($item->link)) continue; ?>
        <a href="<?= $item->link; ?>" class="footer__social" target="_blank" aria-label="<?= $item->nome; ?>">
          <?= $item->icone; ?>
        </a>
      <?php endforeach; ?>
    </div>
  </div>



</div>