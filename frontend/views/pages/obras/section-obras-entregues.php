<?php

/**
 * Template Part Name: Obras
 * Template Part Type: SECTION
 * Template Part Page: Obras
 * Description: Seção obras entregues.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 */

extract($args);
?>

<?php
foreach ($itens as $index => $obra): ?>
    <section class="section-obras-entregues margin-bottom-xs border-radius-lg margin-top-xxl">
        <div class="section-obras-entregues__interno bg-white max-width-md container grid">

            <div class="col-12 col-5@md flex-shrink-0 flex-grow-0">

                <?php $swiper_class = 'galeria-obras-entregues-' . $index; ?>
                <div class="galeria-obras-entregues">

                    <div class="galeria-obras-entregues__galeria swiper js-<?= $swiper_class; ?>-swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($obra['galeria'] as $i => $img_url): ?>
                                <div class="galeria-obras-entregues__imagem swiper-slide" style="--galeria-obras-entregues-imagem: url('<?= esc_url($img_url); ?>');">
                                    <a href="javascript:;" class="galeria-obras-entregues__zoom btn btn--zoom" aria-label="Zoom" aria-controls="lightbox-<?= $swiper_class; ?>" data-lightbox-item="lightbox-<?= $swiper_class; ?>-item-<?= $i + 1; ?>">
                                        <?= get_svg_content('icon-zoom.svg', '', true, [], 'stroke'); ?>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="galeria-obras-entregues__btns flex gap-xs items-center justify-end">
                        <a href="javascript:;" class="btn btn--swiper  padding-x-0 js-<?= $swiper_class; ?>-prev flex-shrink-0">
                            <?= get_svg_content('chevron.svg', "flip-x", true); ?>
                        </a>
                        <a href="javascript:;" class="btn btn--swiper  padding-x-0 js-<?= $swiper_class; ?>-next flex-shrink-0">
                            <?= get_svg_content('chevron.svg', "", true); ?>
                        </a>

                    </div>

                </div>

            </div>

            <div class="col-12 col-7@md flex flex-column gap-md padding-md@md">

                <h3 class="section-obras-entregues__titulo">Multisolos <span>+ <?= $obra['titulo'] ?? ''; ?></span></h3>
                <h2 class="section-obras-entregues__slogan"><?= $slogan ?? ''; ?></h2>
                <hr>
                <div class="section-obras-entregues__texto"><?= $obra['texto'] ?? ''; ?></div>
                <hr>
                <div class="section-obras-entregues__depoimento_texto"><?= $obra['depoimento_texto'] ?? ''; ?></div>
                <div class="flex justify-between items-center">
                    <div>
                        <p class="section-obras-entregues__depoimento_nome"><?= $obra['depoimento_nome'] ?? ''; ?></p>
                        <p class="section-obras-entregues__depoimento_responsavel"><?= $obra['depoimento_responsavel'] ?? ''; ?></p>
                    </div>
                    <div>
                        <img class="section-obras-entregues__depoimento_imagem" src="<?= $obra['depoimento_imagem'] ?: get_media_src('placeholders/silhueta.jpg'); ?>" alt="Foto do responsável">
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php endforeach; ?>