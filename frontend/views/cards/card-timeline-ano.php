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
?>
<div class="slide flex-grow position-relative margin-top-xs position-relative margin-top-xs text-center border-top border-2">
<a href="javascript:;" class="block padding-top-xxs"><?= $ano; ?></a>
</div>