<?php

/**
 * @package Alp Cody
 * @since 1.0
 */


if (is_plugin_active('woocommerce/woocommerce.php') && is_checkout()) { ?>

    <div id="checkout-page">
        <section class="page page-<?= $post->post_name ?> padding-bottom-lg">
            <section class="checkout padding-y-md@sm">
                <div class="container max-width-adaptive-lg">
                    <div class="text-component margin-bottom-lg">
                        <h1 class="text-center">Pagamento</h1>
                    </div>

                    <?= do_shortcode('[woocommerce_checkout]'); ?>

                </div>
            </section>
        </section>
    </div>

<?php } else { ?>
    <section id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
        <article class="contentArticle">
            <?php
            the_content(__('Continue lendo <span class="meta-nav">&rarr;</span>', 'alp'));
            wp_link_pages(array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'alp') . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ));
            ?>
        </article>
    </section>
<?php }
?>