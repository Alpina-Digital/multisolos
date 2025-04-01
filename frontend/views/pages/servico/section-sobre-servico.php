<?php
extract($args);
?>

<section class="section-sobre-servico grid items-center justify-center gap-md">

    <div class="max-width-lg container flex flex-column gap-xl">
        <div class="grid gap-sm">
            <div class="section-sobre-servico__texto-sobre flex flex-column gap-sm col-6 col-6@md bg-cinza-fundo radius-md padding-md">
                <h1 class="section-sobre-servico__titulo-sobre">Sobre</h1>
                <?= $texto ?>
                <!-- <a href="<?= home_url()?>/fale-conosco" class="section-sobre-servico__cta-link btn btn--accent btn--sm">Solicitar orçamento <?= get_svg_content('arrow-diagonal.svg', 'svg', 'true'); ?></a> -->
                <a href="<?= $cta_link?>" class="section-sobre-servico__cta-link btn btn--accent btn--sm"><?= $cta_texto?> <?= get_svg_content('arrow-diagonal.svg', 'svg', 'true'); ?></a>
            </div>
            <div class="flex flex-column gap-sm col-6 col-6@md bg-cinza-fundo radius-md padding-md">
                <?php
                foreach ($imagens as $imagem):
                    echo $imagem;
                endforeach;
                ?>
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