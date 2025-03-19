<?php

/**
 * Template Part Name: Superior/Logo
 * Template Part Type: COL
 * Template Part Page: Footer
 * Description: A logo do cliente.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 * 
 * 
 * @var $args {
 * 	@var string $logo Logo do cliente.
 * }
 */
extract($args);
?>
<div class="col-logo flex-shrink-0 flex flex-column gap-sm">
  <?= $logo; ?>
</div>