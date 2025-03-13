<?php
class MS_Projeto
{
  use Alp_Entitable, Alp_Renderable, MS_Apresentacao, MS_Section_Projetos;

  /**
   * Faz o setup da Entidade.
   * @hooked action 'after_setup_theme'
   */
  public static function setup(): void
  {
    self::$entity = (new Alp_Entity())
      ->create_post_type('Projeto', 'Projetos', 'projeto', false, 'editor-kitchensink', true, true)
      ->create_taxonomy('Categoria de Projeto', 'projeto_cat');

    self::create_metaboxes();
  }

  /**
   * Estabelece os metaboxes de Projeto.
   * @return void
   */
  public static function create_metaboxes(): void
  {
    self::$entity
      ->create_metaboxes()
      //PRINCIPAL
      ->add_metabox_box('', 'Informações Gerais')
      ->add_metabox_field_switch('É um videocase?', 'videocase', 12)
      ->add_metabox_field_text('Potência', 'potencia', 4)
      ->add_metabox_field_select_estado('Estado', 'estado', 4)
      ->add_metabox_field_select_cidades('Cidade', 'cidade', 4)
      ->add_metabox_field_biu('Texto', 'texto', 9)
      ->add_metabox_field_image('Imagem de Destaque', 'imagem', 1, 3)
      //GALERIA
      ->add_metabox_box('', 'Galerias')
      ->add_metabox_group('Vídeos', 'videos', 'Vídeo {#}', 6, 12)
      ->add_metabox_field_image('Imagem de Destaque', 'imagem', 1, 3, 'Tamanho sugerido: 1216px x 640px')
      ->add_metabox_field_oembed('URL do Vídeo', 'url', 9)
      ->close_metabox_group()
      ->add_metabox_field_image('Galeria de Imagens', 'imagens', 12, 6, 'Tamanho sugerido: 1216px x 640px')
      ->render();
  }

  /**
   * Recebe um array com os valores dos campos do Banner.
   * @return array Valores dos campos.
   */
  public function get_post_metas_values(string $id = '', array|false $autoimage = []): array
  {
    $autoimage_defaults = [
      'metafields' => [
        'imagem'  => 'src',
        'video'   => 'src',
        'imagens' => 'src',
      ],
    ];

    $autoimage = array_merge($autoimage_defaults, $autoimage ?: []);

    $args = $this->get_metaboxes()->get_post_metas_values($this->id, '_main', $autoimage);

    $subtitulo = 'Projetos';
    $titulo = get_the_title($this->id);
    $link = get_the_permalink($this->id);

    $categoria = get_the_terms($this->id, 'projeto_cat');
    if (!empty($categoria)) $categoria = reset($categoria)->name;
    else $categoria = '';

    if (!empty($args['cidade']) && !empty($args['estado'])) $localizacao = Alp_IBGE::get_cidade($args['cidade']) . ' - ' . Alp_IBGE::get_estado($args['estado'], true);
    elseif (empty($args['cidade'])) $localizacao = Alp_IBGE::get_estado($args['estado']);

    $args['videocase'] = (bool) get_post_meta($this->id, 'projeto_videocase', true);

    $args = array_merge($args, compact('titulo', 'link', 'categoria', 'subtitulo', 'localizacao'));

    return $args;
  }

  /**
   * Renderiza a página.
   * @return void
   */
  public function render(): void
  {
    $this
      ->add_render($this->render_section_apresentacao_azul())
      ->add_render($this->render_section_galeria_projeto())
      ->add_render($this->render_section_info_projeto())
      ->add_render($this->render_section_ver_mais_projetos())
      ->echo_render();
  }

  /**
   * Renderiza a seção de informações do Projeto.
   * @return string HTML renderizado.
   */
  public function render_section_info_projeto(): string
  {
    $args = $this->get_post_metas_values();
    return $this->html('frontend/views/singles/projeto/section-info-projeto.php', $args);
  }

  /**
   * Renderiza a seção de informações do Projeto.
   * @return string HTML renderizado.
   */
  public function render_section_ver_mais_projetos(): string
  {
    $titulo = 'Veja mais projetos';
    $link = home_url('/projetos');

    $cards = '';

    $relacionados = $this->get_relacionados();
    if (!$relacionados->have_posts()) return '';

    while ($relacionados->have_posts()) {
      $relacionados->the_post();
      $cards .= $this->render_card_projeto_v2(get_the_ID(), 'card-projeto--archive col-12 col-4@md');
    }

    $args = compact('titulo', 'link', 'cards');

    return $this->html('frontend/views/singles/projeto/section-ver-mais-projetos.php', $args);
  }

  public function get_relacionados(): WP_Query
  {
    $categoria = get_the_terms($this->id, 'projeto_cat');

    if (!empty($categoria)) $categoria_id = wp_list_pluck($categoria, 'term_id');
    else $categoria_id = null;

    $query_args = [
      'post_type'      => 'projeto',
      'posts_per_page' => 3,
      'post__not_in'   => [$this->id],
    ];

    if ($categoria_id) {
      $query_args['tax_query'] = [
        [
          'taxonomy' => 'projeto_cat',
          'field'    => 'term_id',
          'terms'    => $categoria_id,
        ],
      ];
    }

    $query = new WP_Query($query_args);

    if ($query->found_posts >= 3) {
      return $query;
    }

    $faltando = 3 - $query->found_posts;

    $query_extra = new WP_Query([
      'post_type'      => 'projeto',
      'posts_per_page' => $faltando,
      'post__not_in'   => array_merge([$this->id], wp_list_pluck($query->posts, 'ID')),
    ]);

    $posts_final = array_merge($query->posts, $query_extra->posts);

    return new WP_Query([
      'post_type'      => 'projeto',
      'posts_per_page' => 3,
      'post__not_in'   => [$this->id],
      'post__in'       => wp_list_pluck($posts_final, 'ID'),
      'orderby'        => 'post__in',
    ]);
  }

  /**
   * Renderiza a seção de Galeria do Projeto.
   * @return string HTML renderizado.
   */
  public function render_section_galeria_projeto(): string
  {
    $args = $this->get_post_metas_values();

    if (empty($args['videos'])) $args['videos'] = [];
    if (!is_array($args['videos'])) $args['videos'] = [$args['videos']];

    $args['videos'] = array_map(function ($video) {

      if (!empty($video['url'])) {
        $video['url'] = (new WP_oEmbed)->get_html($video['url'] ?? '');
        $video['url'] = get_ombed_iframe_src($video['url']);
      }

      return $video;
    }, $args['videos']);

    if (empty($args['imagens'])) $args['imagens'] = [];
    if (!is_array($args['imagens'])) $args['imagens'] = [$args['imagens']];

    if (empty($args['videos']) && empty($args['imagens'])) return '';

    $args['video_pulse'] = $this->html('frontend/base/pulse-play/block-pulse-play.php');
    $args['swiper_class'] = 'galeria-projeto';

    return $this->html('frontend/views/singles/projeto/section-galeria-projeto.php', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', ['MS_Projeto', 'setup']);
