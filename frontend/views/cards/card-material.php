<?php

/**
 * Template Part Name: Material Rico
 * Template Part Type: CARD
 * Template Part Page: Cards
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título do material.
 * 	@var string $categoria Categoria do material.
 * 	@var string $texto Texto do material.
 * 	@var string $link Link do material.
 * 	@var string $imagem Imagem do material.
 * }
 */
extract($args);
?>
<div class="card-material flex flex-column items-start <?= $classes; ?>">

  <div class="card-material__imagem" style="--card-material-imagem: url('<?= $imagem ?? ''; ?>');"> </div>

  <div class="card-material__info flex flex-column gap-sm justify-between">
    <div class="flex flex-column gap-xs">
      <div class="card-material__categoria"><?= $categoria ?? ''; ?></div>
      <h3 class="card-material__titulo"><?= $titulo ?? ''; ?></h3>
      <div class="card-material__texto line-clamp-2"><?= $texto ?? ''; ?></div>
    </div>
    <?php if ($tipo === 'video'): ?>
      <a href="#video" class="card-material__btn btn btn--accent padding-y-xs padding-x-sm flex justify-between gap-xxs" aria-controls="modal-footer" data-url="<?= $link; ?>">
        <span> Assistir</span>
        <?= $icone ?? ''; ?>
      </a>
    <?php elseif ($tipo === 'arquivo'): ?>
      <a href="<?= $link ?? '#0'; ?>" target="_blank" class="card-material__btn btn btn--accent padding-y-xs padding-x-sm flex justify-between gap-xxs" download="<?= $download_name; ?>">
        <span> Baixar</span>
        <?= $icone ?? ''; ?>
      </a>
    <?php elseif ($tipo === 'url'): ?>
      <a href="<?= $link ?? '#0'; ?>" target="_blank" class="card-material__btn btn btn--accent padding-y-xs padding-x-sm flex justify-between gap-xxs">
        <span> Baixar</span>
        <?= $icone ?? ''; ?>
      </a>
    <?php endif; ?>
  </div>


</div>