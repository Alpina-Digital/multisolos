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
  <h3 class="footer__title"><?= $titulo; ?></h3>
  <a href="#mapa" aria-controls="modal-footer" data-url="<?= $endereco_url; ?>" target="_blank" class="footer__link flex gap-xxs">
    <div class="footer__icon flex-shrink-0"><?= $pin; ?></div>
    <div class="flex flex-column gap-xxs">
      <?= $endereco; ?>
    </div>
  </a>

  <?php if (!empty($telefone)): ?>
    <a href="<?= $telefone->url; ?>" target="_blank" class="footer__link flex gap-xxs">
      <div class="footer__icon"><?= $telefone_icone; ?></div>
      <div class="footer__text"><?= $telefone->texto; ?></div>
    </a>
  <?php endif; ?>

  <?php if (!empty($telefone2)): ?>
    <a href="<?= $telefone2->url; ?>" target="_blank" class="footer__link flex gap-xxs">
      <div class="footer__icon"><?= $telefone_icone; ?></div>
      <div class="footer__text"><?= $telefone2->texto; ?></div>
    </a>
  <?php endif; ?>

  <?php if (!empty($whatsapp)): ?>
    <span class="footer__link flex gap-xxs">
      <div class="footer__icon"><?= $whatsapp_icone; ?></div>
      <div class="footer__text">
        <a href="<?= $whatsapp->url; ?>" target="_blank"><?= $whatsapp->texto; ?></a>
        <?php if (!empty($whatsapp2)): ?>
          / <a href="<?= $whatsapp2->url; ?>" target="_blank"><?= $whatsapp2->texto; ?></a>
        <?php endif; ?>
      </div>
    </span>
  <?php endif; ?>

  <?php if (!empty($email)): ?>
    <a href="mailto:<?= $email ?>" class="footer__link flex gap-xxs">
      <div class="footer__icon"><?= $email_icone; ?></div>
      <div class="footer__text"><?= $email; ?></div>
    </a>
  <?php endif; ?>


</div>