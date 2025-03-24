<?php extract($args); ?>
<section class="section-timeline position-relative padding-y-xxl">
	<div class="container max-width-md">
		<div class="title margin-bottom-lg">Linha do tempo</div>

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