<?php

/**
 * Template Part Name: Superior/Redes
 * Template Part Type: COL
 * Template Part Page: Footer
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 * 
 * @var $args {
 * 	@var array $sociais Redes sociais.
 * }
 */
extract($args);
?>
<div class="col-contato">
  <div class="footer__sociais flex gap-sm">
    <?php foreach ($sociais as $social): if (!$social->link) continue; ?>
      <a href="<?= $social->link; ?>" class="footer__social" target="_blank" aria-label="<?= $social->nome; ?>">
        <?= $social->icone; ?>
      </a>
    <?php endforeach; ?>
  </div>
</div>