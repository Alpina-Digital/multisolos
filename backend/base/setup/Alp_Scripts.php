<?php

/**
 * Classe responsável pelo registro dos scripts e folhas de estilos usados no tema.
 * @author Alpina
 * @since Alpina V4
 * @version 4.0 
 */
class Alp_Scripts
{

  /**
   * Configura os scripts e estilos que serão usados no frontend.
   * @hooked action 'wp_enqueue_scripts'
   * @return void
   */
  public static function configurar_scripts_frontend(): void
  {
    $theme_version = wp_get_theme()->get('Version');
    $theme_url = get_stylesheet_directory_uri();

    if (is_singular() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
    }

    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-mask', $theme_url . '/assets/js/jquery.mask.min.js', ['jquery'], false, true);
    wp_enqueue_script('select2', "https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js", ['jquery'], false, false);
    wp_enqueue_script('swiper', $theme_url . '/assets/js/swiper.min.js', [], $theme_version, true);
    wp_enqueue_script('cleave', 'https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js', []);

    wp_enqueue_script('codyframe-js', $theme_url . '/assets/js/scripts.js', ['swiper', 'jquery', 'jquery-mask', 'jquery-ui-core', 'select2', 'cleave'], $theme_version, true);

    wp_enqueue_style('select2-css', "https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css", [], $theme_version);
    wp_enqueue_style('codyframe', $theme_url . '/assets/css/style.css', ['select2-css'], $theme_version);

    wp_localize_script('codyframe-js', 'alp_urls', [
      'ajax' => admin_url('admin-ajax.php'),
      'rest' => esc_url_raw(rest_url())
    ]);
  }

  /**
   * Configura os scripts e estilos que serão usados no frontend.
   * @hooked action 'wp_enqueue_scripts'
   * @return void
   */
  public static function configurar_scripts_backend(): void
  {
    wp_enqueue_media();
  }
}

/**
 * Hooks
 */
add_action('wp_enqueue_scripts', ['Alp_Scripts', 'configurar_scripts_frontend']);
add_action('admin_enqueue_scripts', ['Alp_Scripts', 'configurar_scripts_backend']);
