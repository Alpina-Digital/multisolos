<?php

/**
 * Classe responsável pelo post do Blog.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Post
{
  use Alp_Renderable;

  /**
   * Renderiza a página.
   * @return void
   */
  public function render(): void
  {
    $this
      ->add_render($this->render_section_cabecalho_post())
      ->add_render($this->render_section_miolo_post())
      ->add_render($this->render_section_confira_tambem())
      ->echo_render();
  }

  /**
   * Renderiza o cabeçalho do post.
   * @return string HTML renderizado.
   */
  public function render_section_cabecalho_post(): string
  {
    $args = [
      'voltar' => home_url('blog'),
      'voltar_seta' => get_svg_content('chevron.svg', '', true),
      'titulo' => get_the_title(),
      'relogio' => get_svg_content('clock.svg', 'color-accent', true, [14, 14], 'stroke'),
      'tempo' => Alp_Blog::calcular_tempo_leitura(get_queried_object_id()) . ' min',
      'categorias' => get_the_category(get_queried_object_id()),
      'imagem' => get_the_post_thumbnail(get_queried_object_id(), 'full')
    ];

    return $this->html('frontend/views/singles/post/section-cabecalho-post.php', $args);
  }

  /**
   * Renderiza o miolo do post.
   * @return string HTML renderizado.
   */
  public function render_section_miolo_post(): string
  {
    $conteudo = apply_filters('the_content', get_the_content());
    $shares = Alp_Blog::links_share();
    $categorias = get_categories(['hide_empty' => true]);

    $criado = get_the_date('d/m/Y - H:i');
    $modificado = get_the_modified_date('d/m/Y - H:i');

    if ($criado === $modificado) $modificado = false;

    foreach ($shares as $rede => &$share) {
      $share = (object) [
        'icone' => get_svg_content("blog/{$rede}.svg"),
        'link' => $share
      ];
    }

    $args = compact('conteudo', 'shares', 'categorias', 'criado', 'modificado');
    return $this->html('frontend/views/singles/post/section-miolo-post.php', $args);
  }

  /**
   * Renderiza a seção de posts relacionados.
   * @return string HTML renderizado.
   */
  public function render_section_confira_tambem(): string
  {
    $blog = new MS_Blog();

    $posts = Alp_Blog::get_relacionadas(get_queried_object_id(), 10);
    if (!$posts->have_posts()) return '';

    $cards = [];
    while ($posts->have_posts()) {
      $posts->the_post();
      $cards[] = $blog->render_card_blog(get_the_ID(), 'swiper-slide');
    }

    $titulo = 'Confira também';
    $swiper_class = 'blog-cards';

    $cards = implode('', $cards);
    $args = compact('cards', 'titulo', 'swiper_class');
    return $this->html('frontend/views/singles/post/section-confira-tambem.php', $args);
  }
  public static function show_tamanho_destaque()
  {
    global $pagenow, $post_type;
    if (!in_array($pagenow, ['post-new.php', 'post.php']) || $post_type !== 'post') return
?>
    <script>
      jQuery(document).ready(function($) {
        var notice = '<p><strong>Tamanho sugerido:</strong> 1216 x 520 px</p>';
        $('#postimagediv .inside').append(notice);
      });
    </script>
<?php
  }
}

add_action('admin_head', ['MS_Post', 'show_tamanho_destaque']);
