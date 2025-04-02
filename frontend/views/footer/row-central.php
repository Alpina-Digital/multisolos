<?php

/**
 * Template Part Name: Central
 * Template Part Type: ROW
 * Template Part Page: Footer
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 * 
 * @var $args {
 * 	@var string $cols Renderização das colunas.
 * }
 */
extract($args);
?>
<div class="container max-width-lg margin-bottom-md">
  <div class="flex flex-column flex-row@lg justify-between items-center items-stretch@lg gap-lg gap-xxl@lg padding-top-lg padding-top-0@lg">
    <?= $cols; ?>
  </div>
</div>
<div class="container max-width-lg footer__divider margin-y-lg"></div>