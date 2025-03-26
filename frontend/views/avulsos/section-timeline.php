<?php

/**
 * Template Part Name: Quem somos
 * Template Part Type: SECTION
 * Template Part Page: Avulsos
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @cody _1_ticker Ticker para o mobile.
 * 
 * @var $args {
 * 	@var string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>
<section class="section-timeline grid items-center justify-center gap-md padding-y-xl padding-y-xxxl@md">
	<div class="container max-width-md">
		<div class="flex flex-column flex-row@sm justify-between items-center width-100%">
			<div>
				<h1 class="section-timeline__titulo-secao">Linha do tempo</h1>
				<h2 class="section-timeline__subtitulo-secao padding-y-md">Nossa história</h2>
			</div>
			<div>
				<a href="javascript:;" class="btn btn--swiper padding-x-0 js-confia-prev"><?= get_svg_content('chevron.svg', "flip-x", true); ?></a>
				<a href="javascript:;" class="btn btn--swiper padding-x-0 js-confia-prev"><?= get_svg_content('chevron.svg', "", true); ?></a>
			</div>
		</div>
	</div>
	<div class="container max-width-md">
		<div class="slick timeline-slick">
			<?= $conteudo; ?>
		</div>
		<div class="position-relative margin-top-md">
			<div class="slide-navigation slick padding-top-xxs flex text-xxl">
				<?= $anos; ?>
			</div>
		</div>
	</div>
</section>