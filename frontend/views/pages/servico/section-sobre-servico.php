<?php
extract($args);
?>
<section class="section-sobre-servico gap-md bg-cinza-claro">

    <div class="max-width-lg grid container gap-sm gap-xxl@md padding-top-xxl padding-bottom-xl"> <!-- div geral -->

        <div class="col-12 col-6@md flex flex-column padding-y-xl gap-lg">
            <h1 class="section-sobre-servico__titulo-sobre">Sobre</h1>
            <?= $texto ?>
            <a href="<?= home_url() ?>/?tipo_contato=orcamento" class="section-sobre-servico__cta-link btn btn--accent btn--sm">Solicitar orçamento <?= get_svg_content('arrow-diagonal.svg', 'svg', 'true'); ?></a>
        </div>

        <div class="col-12 col-6@md flex flex-column padding-sm@md">
            <div class="galeria-sobre-servico">
                <div class="galeria-sobre-servico__galeria swiper js-slides-sobre-servico-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($imagens as $imagem): ?>
                            <div class="galeria-sobre-servico__imagem swiper-slide" style="--galeria-sobre-servico-imagem: url('<?= $imagem; ?>');">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="galeria-sobre-servico__btns flex gap-xs items-center justify-end">
                    <a href="javascript:;" class="btn btn--swiper  padding-x-0 js-slides-sobre-servico-prev flex-shrink-0">
                        <?= get_svg_content('chevron.svg', "flip-x", true); ?>
                    </a>
                    <a href="javascript:;" class="btn btn--swiper  padding-x-0 js-slides-sobre-servico-next flex-shrink-0">
                        <?= get_svg_content('chevron.svg', "", true); ?>
                    </a>
                </div>
            </div>
        </div>

    </div>

</section>