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
<div class="card-timeline-slide__card js-timeline-card <?= $visible_class ?> ">
  <div class="max-width-lg grid">
    <div class="col-12 col-8@md overflow-hidden padding-top-xxl padding-bottom-xxl">
      <h3 class="card-timeline-slide__ano"><?= $ano ?></h3>
      <h4 class="card-timeline-slide__titulo margin-top-md"><?= $titulo ?></h4>
      <div class="card-timeline-slide__texto margin-top-md"><?= $texto ?></div>
    </div>
    <div class="card-timeline-slide__bg col-12 col-4@md overflow-hidden padding-xl radius-md" style="background-image:url('<?= empty($foto) ? get_template_directory_uri() . '/assets/imgs/foto-sobre.jpg' : $foto ?>')">
    </div>
  </div>

</div>