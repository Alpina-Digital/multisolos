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
 * está utilizando o js _nova_timeline.js
 * 
 * @var $args {
 * 	@var string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>


<section class="section-timeline padding-y-xl">
	<div class="container max-width-md">
		<div class="flex flex-column flex-row@sm justify-between items-center width-100%">
			<div>
				<h1 class="section-timeline__titulo-secao">Linha do tempo</h1>
				<h2 class="section-timeline__subtitulo-secao padding-y-md">Nossa história</h2>
			</div>
			<div>
				<button class="btn btn--swiper padding-x-0 js-timeline-prev" aria-label="Anterior">
					<?= get_svg_content('chevron.svg', "flip-x", true); ?>
				</button>
				<button class="btn btn--swiper padding-x-0 js-timeline-next" aria-label="Próximo">
					<?= get_svg_content('chevron.svg', "", true); ?>
				</button>
			</div>
		</div>
	</div>
	<div class="container max-width-adaptive-lg">
		<div class="section-timeline__cards position-relative overflow-hidden" style="background-color: white;">
			<?= $card ?>
		</div>

		<div class="timeline__dates flex items-center gap-md border-top padding-top-sm margin-top-md">
			<?= $anos ?>
		</div>

	</div>
</section>