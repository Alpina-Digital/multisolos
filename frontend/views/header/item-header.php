<?php

/**
 * Template Part Name: Header
 * Template Part Type: ITEM
 * Template Part Page: Header
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título do item.
 * 	@var string $url URL do item.
 * 	@var array<int,StdClass{titulo:string,url:string}> $filhos Filhos do item.
 * }
 */
extract($args);
$mais = preg_match('%#mais%', $url);
?>
<li class="f-header__item <?= $classes; ?>">
  <a href="<?= !$filhos ? $url : '#1'; ?>" target="<?= $target; ?>" class="<?= $filhos ? 'f-header__dropdown-control js-f-header__dropdown-control items-center' : 'f-header__link'; ?>">
    <?php if ($mais): ?>
      <span class="hide@md">Mais</span>
      <?= get_svg_content('chevron-down.svg', 'margin-left-xxxs hide@md'); ?>
      <?= get_svg_content('menu.svg', 'hide block@md'); ?>
    <?php else: ?>
      <span><?= $titulo; ?></span>
      <?php if ($filhos): ?>
        <?= get_svg_content('chevron-down.svg', 'margin-left-xxxs'); ?>
      <?php endif; ?>
    <?php endif; ?>
  </a>

  <?php if ($filhos): ?>
    <ul class="f-header__dropdown">
      <?php foreach ($filhos as $filho): ?>
        <li><a href="<?= $filho->url; ?>" target="<?= $filho->target; ?>" class="f-header__dropdown-link"><?= $filho->titulo; ?></a></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</li>