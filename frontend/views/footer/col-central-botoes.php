<?php

/**
 * Template Part Name: Central/Botões
 * Template Part Type: COL
 * Template Part Page: Footer
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 * 
 * @var $args {
 * 	@var string $menu HTML do menu.
 * }
 */
extract($args);
?>
<div class="col-botoes flex flex-column gap-sm">
  <?php foreach ($botoes as $botao): ?>
    <a href="<?= $botao->link ?>" target="<?= $botao->target ?? '_self'; ?>" class="<?= $botao->class ?>"><?= $botao->nome ?></a>
  <?php endforeach; ?>
</div>