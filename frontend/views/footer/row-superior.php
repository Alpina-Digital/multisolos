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
<div class="footer__superior max-width-lg container col-12 padding-top-xl flex@md justify-between items-end ">
  <?= $logo; ?>
  <?= $sociais; ?>
</div>
<div class="container max-width-lg footer__divider margin-y-lg"></div>