<?php

/**
 * Template Part Name: Avulso
 * Template Part Type: SECTION
 * Template Part Page: -
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * }
 */
extract($args); ?>
<section class="section-redes-sociais bg-cinza-escuro-ultra padding-top-xl padding-top-xxxl@md padding-bottom-xl padding-bottom-xxl@md position-relative z-index-1">
    <div class="section-redes-sociais__container max-width-lg container gap-lg overflow-hidden">

        <div class="col-12 flex@md justify-between items-end margin-bottom-md">
            <div class="flex flex-column gap-sm">
                <h2 class="subtitulo-secao">Redes sociais</h2>
                <h3 class="titulo-secao">Novidades da multisolos</h3>
            </div>
            <a href="https://www.instagram.com/multisolos/" target="_blank" class="section-redes-sociais__btn-ver-tudo btn btn--accent btn--sm"> Ver mais <?= get_svg_content('arrow__right_up.svg', 'svg', 'true'); ?> </a>
        </div>

        <div class="js-redes-sociais-swiper">
            <div class="swiper-wrapper">
                <a href="https://www.instagram.com/p/C8VI68DRamP/?img_index=1" target="_blank" class="card_redes_sociais flex flex-column items-start bg-white" style="background-image:url('https://multisolos.alpdev.com.br/wp-content/uploads/2025/04/post-insta1.jpg')"></a>
                <a href="https://www.instagram.com/p/CqJtymqsAkT/?img_index=1" target="_blank" class="card_redes_sociais flex flex-column items-start bg-white" style="background-image:url('https://multisolos.alpdev.com.br/wp-content/uploads/2025/04/post-insta2.jpg')"></a>
                <a href="https://www.instagram.com/p/Cb_COFmJEBD/?img_index=1" target="_blank" class="card_redes_sociais flex flex-column items-start bg-white" style="background-image:url('https://multisolos.alpdev.com.br/wp-content/uploads/2025/04/post-insta3.jpg')"></a>
            </div>
        </div>

        <!-- <a href="https://www.instagram.com/multisolos/" target="_blank" class="section-redes-sociais__btn-ver-tudo-m btn btn--accent btn--sm"> Ver tudo <?= get_svg_content('arrow__right_up.svg', 'svg', 'true'); ?> </a> -->
    </div>
</section>