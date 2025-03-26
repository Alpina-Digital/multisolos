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
	<div class="container max-width-adaptive-lg">
		<div class="margin-bottom-md">
			<h1 class="section-timeline__titulo-secao">Linha do tempo</h1>
			<h2 class="section-timeline__subtitulo-secao padding-y-md">Nossa história</h2>
		</div>

		<div class="timeline__nav flex justify-end gap-xs margin-bottom-md">
			<button class="btn btn--swiper padding-x-0 js-timeline-prev" aria-label="Anterior">
				<?= get_svg_content('chevron.svg', "flip-x", true); ?>
			</button>
			<button class="btn btn--swiper padding-x-0 js-timeline-next" aria-label="Próximo">
				<?= get_svg_content('chevron.svg', "", true); ?>
			</button>
		</div>

		<div class="timeline__cards position-relative overflow-hidden">
			<div class="timeline__card js-timeline-card is-visible" data-year="1993">
				<div class="grid gap-md items-center">
					<div>
						<h3 class="text-md color-primary font-bold margin-bottom-xs">1993</h3>
						<h4 class="text-lg font-bold">Lorem ipsum dolor sit</h4>
						<p class="text-sm color-contrast-medium">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
					</div>
					<div>
						<img src="https://multisolos.alpdev.com.br/wp-content/uploads/2025/03/foto-sobre.jpg" alt="Imagem 1993" class="radius-md shadow-md">
					</div>
				</div>
			</div>

			<div class="timeline__card js-timeline-card" data-year="1998">
				<div class="grid gap-md items-center">
					<div>
						<h3 class="text-md color-primary font-bold margin-bottom-xs">1998</h3>
						<h4 class="text-lg font-bold">Outro marco importante</h4>
						<p class="text-sm color-contrast-medium">Descrição do evento em 1998. Lorem ipsum dolor sit amet.</p>
					</div>
					<div>
						<img src="http://localhost/multisolos/wp-content/uploads/2025/03/bg-servicos.png" alt="Imagem 1998" class="radius-md shadow-md">
					</div>
				</div>
			</div>

			<!-- + cards -->
		</div>

		<div class="timeline__dates flex items-center gap-md border-top padding-top-sm margin-top-md">
			<span class="timeline__date js-timeline-date active" data-index="0">1993</span>
			<span class="timeline__date js-timeline-date" data-index="1">1998</span>
			<span class="timeline__date js-timeline-date" data-index="2">2002</span>
			<!-- + datas -->
		</div>
	</div>
</section>


<?php /*
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
</section>*/ ?>