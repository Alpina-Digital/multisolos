<?php
extract($args);
?>

<section class="section-sobre-servico grid items-center justify-center gap-md">

    <div class="max-width-lg container flex flex-column gap-xl">
        <div class="grid gap-sm">
            <div class="section-sobre-servico__texto-sobre flex flex-column gap-sm col-6 col-6@md bg-cinza-fundo radius-md padding-md">
                <h1 class="section-sobre-servico__titulo-sobre">Sobre</h1>
                <?= $texto ?>
                <a href="<?= $cta_link ?>" class="section-sobre-servico__cta-link btn btn--accent btn--sm"><?= $cta_texto ?> <?= get_svg_content('arrow-diagonal.svg', 'svg', 'true'); ?></a>
            </div>
            <div class="col-1@md"></div>
            <div class="flex flex-column gap-sm col-5 col-5@md bg-cinza-fundo radius-md padding-md">

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
    </div>

    <div class="max-width-lg container flex flex-column gap-xl">
        <div class="grid gap-sm">
            <?php
            $i = 1;
            foreach ($itens as $item):
                $indice = str_pad($i, 2, '0', STR_PAD_LEFT);

            ?>
                <div class="section-sobre-servico__item flex flex-column gap-sm col-12 col-6@md bg-cinza-fundo radius-md padding-md">
                    <div class="flex flex-column gap-xs">
                        <h3 class="section-sobre-servico__indice"><?= $indice ?></h3>
                    </div>
                    <div class="section-sobre-servico__texto"><?= $item['texto'] ?></div>
                </div>
            <?php
                $i++;
            endforeach;
            ?>
        </div>
    </div>
</section>