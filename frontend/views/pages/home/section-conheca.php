<?php

/**
 * Template Part Name: Conheça
 * Template Part Type: SECTION
 * Template Part Page: Home
 * Description: Seção conheça a Multisolos.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 */
extract($args);

?>
<section class="secao-conheca bg-white">

    <div class="container max-width-lg padding-y-xl">
        <div class="grid gap-lg items-center">

            <?php //Coluna esquerda  ?>
            <div class="col-12 col-6@md">
                <p class="section-conheca__titulo-secao margin-bottom-xxs"><?= $titulo_secao ?></p>
                <h2 class="section-conheca__subtitulo-secao margin-bottom-sm"><?= $subtitulo_secao ?></h2>

                <div class="grid gap-sm">

                    <?php //CARD 1 ?>
                    <div class="section-conheca__box-numeros col-6 bg-contrast-higher padding-md radius-md">
                        <p class="numero"><?= $numero_box1 ?><sup><?= $sinal_box1 ?></sup></p>
                        <p class="texto"><?= $texto_box1 ?></p>
                    </div>

                    <?php //CARD 2 ?>
                    <div class="section-conheca__box-numeros col-6 padding-md radius-md">
                        <p class="numero"><?= $numero_box2 ?><sup><?= $sinal_box2 ?></sup></p>
                        <p class="texto"><?= $texto_box2 ?></p>
                    </div>
                </div>
            </div>

            <?php //Coluna direita ?>
            <div class="col-12 col-6@md position-relative flex flex-column gap-md">

                <h3 class="section-conheca__secao-texto-titulo"><?= $secao_texto_titulo ?></h3>
                <div class="section-conheca__secao-texto-texto"><?= $secao_texto_texto ?></div>
                <a href="<?= $cta_link ?>" class="section-conheca__cta-link btn btn--accent btn--sm"><?= $cta_texto ?> <?= get_svg_content('arrow-diagonal.svg', 'svg', 'true'); ?></a>
            </div>
        </div>
    </div>

</section>