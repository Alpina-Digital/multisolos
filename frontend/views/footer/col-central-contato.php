<?php

/**
 * Template Part Name: Central/Contato
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
<div class="col-contato <?= $class; ?> flex-column gap-sm flex-shrink-0">

  <a href="#mapa" aria-controls="modal-footer" data-url="<?= $endereco_url; ?>" target="_blank" class="footer__link flex gap-xxs">
    <div class="footer__icon flex-shrink-0"><?= $pin; ?></div>
    <div class="flex flex-column gap-xxs">
      <?= $endereco; ?>
      <div class="flex gap-xxs font-semibold color-accent">
        <span>Ver no mapa</span>
        <?= $arrow; ?>
      </div>
    </div>
  </a>

  <?php if (!empty($telefone1)): ?>
    <a href="<?= $telefone1->url; ?>" target="_blank" class="footer__link flex gap-xxs">
      <div class="footer__icon"><?= $telefone_icone; ?></div>
      <div class="footer__text"><?= $telefone1->texto; ?></div>
    </a>
  <?php endif; ?>

  <?php if (!empty($telefone2)): ?>
    <a href="<?= $telefone2->url; ?>" target="_blank" class="footer__link flex gap-xxs">
      <div class="footer__icon"><?= $telefone_icone; ?></div>
      <div class="footer__text"><?= $telefone2->texto; ?></div>
    </a>
  <?php endif; ?>

  <?php if (!empty($whatsapp)): ?>
    <a href="<?= $whatsapp->url; ?>" target="_blank" class="footer__link flex gap-xxs">
      <div class="footer__icon"><?= $whatsapp_icone; ?></div>
      <div class="footer__text"><?= $whatsapp->texto; ?></div>
    </a>
  <?php endif; ?>

</div>