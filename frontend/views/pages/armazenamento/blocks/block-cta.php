<?php

/**
 * Template Part Name: Cta
 * Template Part Type: BLOCK
 * Template Part Page: Sistemas para Armazenamento
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>
<div class="block-cta flex flex-column flex-row@sm gap-xl gap-xxl@md margin-bottom-xl margin-bottom-xxl">
  <div class="block-cta__texto"> <?= $texto ?? ''; ?> </div>
  <?php if ($cta_link && $cta_texto): ?>
    <a href="<?= $cta_link ?? '#'; ?>" target="<?= $cta_target ?? "_self"; ?>" class="btn btn--accent btn--hover-white"><?= $cta_texto; ?></a>
  <?php endif; ?>
</div>