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
extract($args);
// foreach ($posts_instagram as $link) {
//     echo $link . "<br>";
// }
?>
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


                <?php
                foreach ($posts_instagram as $post_url) :

                    // cURL para pegar o HTML da página do Instagram
                    $ch = curl_init($post_url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0'); // necessário pro Instagram não bloquear
                    $html = curl_exec($ch);
                    curl_close($ch);

                    // Busca pela meta tag og:image
                    if (preg_match('/<meta property="og:image" content="([^"]+)"/', $html, $matches)) :
                        $imagem_url = $matches[1];

                ?>
                        <a href="<?= $post_url ?>" target="_blank" class="card_redes_sociais flex flex-column items-start col-12 col-4@md" style="background-image:url('<?= $imagem_url ?>')"></a>
                <?php
                    endif;
                endforeach;

                ?>

            </div>
        </div>

        
    </div>
</section>