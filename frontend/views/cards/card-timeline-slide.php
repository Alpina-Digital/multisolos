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
<div class="section-timeline__card js-timeline-card <?= $visibleClass ?> ">
  <div class="max-width-lg grid">
    <div class="col-12 col-8@md overflow-hidden">
      <h3 class="text-md color-primary font-bold margin-bottom-xs"><?= $ano ?></h3>
      <h4 class="text-lg font-bold"><?= $titulo ?></h4>
    </div>
    <div class="col-12 col-4@md overflow-hidden padding-xl" style="background-image:url('<?= empty($foto) ? get_template_directory_uri() . '/assets/imgs/foto-sobre.jpg' : $foto ?>')">
    </div>
  </div>

</div>