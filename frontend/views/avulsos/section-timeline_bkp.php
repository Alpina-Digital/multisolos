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
		<div class="section-timeline__cards position-relative overflow-hidden"  style="background-color: white;">
			<?php for ($i = 1; $i < 10; $i++): ?>

				<div class="section-timeline__card js-timeline-card <?= $i == 1 ? 'is-visible' : '' ?>">
					<div class="max-width-lg grid">
						<div class="col-12 col-8@md overflow-hidden">
						<h3 class="text-md color-primary font-bold margin-bottom-xs"><?php echo 2020 + $i ?></h3>
						<h4 class="text-lg font-bold">Outro marco importante <?php echo 2020 + $i ?></h4>
						</div>
						<div class="col-12 col-4@md overflow-hidden padding-xl" style="background-image:url('https://multisolos.alpdev.com.br/wp-content/uploads/2025/03/foto-sobre.jpg')">
							<!-- <img src="https://multisolos.alpdev.com.br/wp-content/uploads/2025/03/foto-sobre.jpg"> -->
						</div>
					</div>

					<!-- col 1 -->
					<!-- <div class="col-8 col-8@md gap-xs">
						<h3 class="text-md color-primary font-bold margin-bottom-xs"><?php echo 2020 + $i ?></h3>
						<h4 class="text-lg font-bold">Outro marco importante <?php echo 2020 + $i ?></h4>

					</div> -->

					<!-- col 2 -->
					<!-- <div class="col-4 col-4@md gap-xs">
						<img src="https://multisolos.alpdev.com.br/wp-content/uploads/2025/03/foto-sobre.jpg" style="width:300px">
					</div> -->

				</div>
			<?php endfor; ?>
		</div>

		<div class="timeline__dates flex items-center gap-md border-top padding-top-sm margin-top-md">
			<?php for ($i = 1; $i < 10; $i++): ?>
				<span class="timeline__date js-timeline-date <?= $i == 1 ? 'active' : '' ?>" data-index="<?= $i ?>"><?php echo 2020 + $i ?></span>
			<?php endfor; ?>
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