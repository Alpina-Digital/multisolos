<?php
/**
 * Template Part Name: Timeline
 * Template Part Type: CARD
 * Template Part Page: Quem somos
 * Description: Exibe um card de slide
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * conteudo_item_timeline definido em MS_Avulsos
 * 
 * @var $args {
 *  @var string $ano data do evento.
 *  @var string $titulo titulo do evento.
 *  @var string $texto texto do evento.
 *  @var string $fotos imagens do evento. no caso da MS apenas 1 imagem 
 * }
 */
extract($args);
?>
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
          <div class="slide">
            <figure class="width-100% radius-lg overflow-hidden bg-cinza-claro">
              <img class="block width-100% height-100% object-cover" src="<?= $foto; ?>" alt="" />
            </figure>
          </div>
      </div>
    </div>
  </div>
</div>