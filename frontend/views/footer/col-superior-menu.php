<?php

/**
 * Template Part Name: Superior/Menu
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
 * 	@var array $menu
 * }
 */
extract($args);
?>
<div class="col-menu flex flex-column gap-xl flex-shrink-0">

  <div>
    <h3 class="footer__title"><?= $titulo; ?></h3>
    <?= $menu; ?>
    <div class="">
    </div>
  </div>

</div>