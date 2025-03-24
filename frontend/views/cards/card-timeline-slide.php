<?php extract($args); ?>
<div class="slide">
  <div class="card-timeline bg-cinza-fundo radius-lg grid">
    <div class="col-7@lg flex items-center">
      <div class="padding-x-xl padding-y-md">
        <div class="text-xxxxxxl font-bold color-azul-escuro margin-bottom-xs"><?= $ano; ?></div>
        <div class="text-xxl font-bold margin-bottom-sm color-verde-marca"><?= $titulo; ?></div>
        <div><?= $texto; ?></div>
      </div>
    </div>
    <div class="col@lg">
      <div class="slick timeline-card-slick radius-lg overflow-hidden flex">
        <?php foreach ($fotos as $foto) { ?>
          <div class="slide">
            <figure class="width-100% radius-lg overflow-hidden bg-cinza-claro">
              <img class="block width-100% height-100% object-cover" src="<?= $foto; ?>" alt="" />
            </figure>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>