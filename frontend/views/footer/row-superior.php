<?php

/**
 * Template Part Name: Superior
 * Template Part Type: ROW
 * Template Part Page: Footer
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 * 
 * @var $args {
 *  @var string $titulo Título no footer.
 * 	@var array{nome:string,link:string,icone:string} $sociais Redes sociais.
 * }
 */
extract($args);
?>
<div class="footer__superior max-width-xxl container padding-top-xl flex flex-column justify-between items-center items-start@md gap-lg gap-sm@md">
  <?= $sociais; ?>
</div>
<div class="container max-width-xxl footer__divider margin-y-lg"></div>