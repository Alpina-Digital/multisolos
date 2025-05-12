<?php

/**
 * Template Part Name: Timeline
 * Template Part Type: Item
 * Template Part Page: Quem somos
 * Description: Exibe um item da timeline
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
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
<div class="item-timeline__item js-timeline-item <?= $visible_class ?> ">
  <div class="max-width-lg grid">
    <div class="col-12 col-6@md overflow-hidden padding-top-xxl padding-bottom-xxl">
      <h3 class="item-timeline__ano"><?= $ano ?></h3>
      <h4 class="item-timeline__titulo margin-top-md"><?= $titulo ?></h4>
      <div class="item-timeline__texto margin-top-md"><?= $texto ?></div>
    </div>
    <div class="item-timeline__bg col-12 col-6@md overflow-hidden padding-xl radius-md" style="background-image:url('<?= empty($foto) ? get_template_directory_uri() . '/assets/imgs/foto-sobre.jpg' : $foto ?>')">
    </div>
  </div>

</div>