<?php

/**
 * Classe responsável pela página FAQ.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class SV_Materiais extends Alp_Page
{
  use SV_Apresentacao;

  private string $categoria;
  private int $posts_por_pagina = 6;
  private int $pagina = 1;

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   * @return void
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-materiais.php', 'materiais');
    $this->create_metaboxes();
  }

  /**
   * Cria os metaboxes da página.
   * @return void
   */
  public function create_metaboxes(): void
  {
    $this->template->create_metaboxes()
      ->chain_from_callable([$this, 'chain_metaboxes_apresentacao_azul'])
      ->render();
  }

  /**
   * Renderiza a página FAQ.
   * @return void
   */
  public function render(): void
  {
    $this->pagina = $_GET['pagina'] ?? 1;
    $this->categoria = $_GET['categoria'] ?? '';

    $avulsos = new SV_Avulsos();

    $this
      ->add_render($this->render_section_apresentacao_azul())
      ->add_render($this->render_section_principal())
      ->add_render($avulsos->render_section_blog())
      ->add_render($avulsos->render_section_newsletter())
      ->echo_render();
  }

  /**
   * Renderiza a seção principal da página.
   * @return string HTML renderizado.
   */
  public function render_section_principal(): string
  {
    $args['categoria'] = $this->categoria;

    $posts = $this->get_ultimos($this->posts_por_pagina, $this->categoria, $this->pagina);

    $args['cards'] = '';

    $destaque = true;
    while ($posts->have_posts()) {
      $posts->the_post();
      $args['cards'] .= $this->render_card_material(get_the_ID(), 'col-12 col-4@md');
    }

    $paginacao = new Alp_Paginacao($posts);
    $args['paginacao'] = $this->html('frontend/base/paginacao/block-paginacao.php', compact('paginacao'));
    $args['categorias'] = get_terms(['taxonomy' => 'material_cat', 'hide_empty' => true]);
    $args['categoria_selecionada'] = $this->categoria ?? '';

    return $this->html('frontend/views/pages/materiais/section-principal-materiais.php', $args);
  }

  /**
   * Renderiza um card de blog.
   * @param int $id ID do post.
   * @param string $classes Classes CSS adicionais.
   * @return string HTML renderizado.
   */
  public function render_card_material(int $id, string $classes = 'col-12 col-4@md'): string
  {
    $args = (new SV_Material($id))->get_post_metas_values();

    $titulo = get_the_title($id);
    $categoria = get_the_terms($id, 'material_cat')[0]->name;

    $tipo = $args['tipo'] ?? 'url';

    if ($tipo === 'video') {
      $link = get_ombed_iframe_src(wp_oembed_get($args['video'] ?? ''));
      $icone = get_svg_content('assistir.svg');
    } elseif ($tipo === 'arquivo') {
      $link = wp_get_attachment_url($args['arquivo'] ?? '');
      $args['download_name'] = sanitize_title(get_the_title($id));
      $icone = get_svg_content('baixar.svg', '', true, [], 'stroke');
    } elseif ($tipo === 'url') {
      $link = $args['url'] ?? '';
      $icone = get_svg_content('baixar.svg', '', true, [], 'stroke');
    }

    $args = array_merge($args, compact('titulo', 'categoria', 'link', 'classes', 'tipo', 'icone'));

    return $this->html('frontend/views/cards/card-material', $args);
  }

  /**
   * Retorna os últimos materiais.
   * @param int $quantidade Quantidade de materiais.
   * @param int|array|string $cat Categoria dos materiais.
   * @param int|array|string $pagina Página dos materiais.
   * @param array<string,mixed> $args Mais args para a montagem da query.
   * @return WP_Query Query resultante.
   */
  private function get_ultimos(int $quantidade = 6, int|array|string $cat = 0, int $pagina = 1, array $args = []): WP_Query
  {
    $default_args = [
      'post_type' => 'material',
      'posts_per_page' => $quantidade,
      'orderby' => 'date',
      'order' => 'DESC',
      'paged' => $pagina
    ];

    if (is_array($cat)) $cat = array_map([$this, 'get_cat_id'], $cat);
    else $cat = $this->get_cat_id($cat);

    if ($cat) {
      $args['tax_query'] = [
        [
          'taxonomy' => 'material_cat',
          'field' => 'id',
          'terms' => $cat,
          'compare' => 'IN'
        ]
      ];
    }

    $args = array_merge($default_args, $args);

    return new WP_Query($args);
  }

  /**
   * Retorna o ID de uma categoria.
   * @param string $cat_slug Slug da categoria.
   * @return int ID da categoria.
   */
  private function get_cat_id(string $cat_slug): int
  {
    if (is_numeric($cat_slug)) return $cat_slug;

    $cat = get_term_by('slug', $cat_slug, 'material_cat');
    if ($cat instanceof WP_Term) return $cat->term_id;
    return 0;
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new SV_Materiais(), 'setup']);
