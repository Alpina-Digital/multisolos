<?php
/**
 * Template Part Name: Timeline
 * Template Part Type: CARD
 * Template Part Page: Quem somos
 * Description: Exibe a linha horizontal com os anos
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 *  @var string $ano conteudo_item_ano no MS_Avulsos.
 * }
 */
extract($args);

// echo $ano . ' - ' . $contador_ano;
?>
<span class="timeline__date js-timeline-date <?= $visibleClass ?>" data-index="<?= $contador_ano ?>"><?= $ano ?></span>