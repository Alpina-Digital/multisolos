<?php

/**
 * Classe responsável pela página de Projetos.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Projetos extends Alp_Page
{
  use
    MS_Banner_Topo,
    MS_Section_Projetos;

  private string $categoria;
  private int $posts_por_pagina = 6;
  private int $pagina = 1;

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-projetos.php', 'projetos');
    $this->create_metaboxes();
  }

  /**
   * Cria as metaboxes do template.
   */
  public function create_metaboxes(): void
  {
    $this
      ->template->create_metaboxes()
      //BANNER
      ->chain_from_callable([$this, 'chain_metaboxes_banner_topo'])
      ->render();
  }

  /**
   * Renderiza a página.
   * @return void
   */
  public function render(): void
  {
    $this->pagina = $_GET['pagina'] ?? 1;
    $this->categoria = $_GET['categoria'] ?? '';

    $avulsos = new MS_Avulsos();

    $this
      ->add_render($this->render_banner_topo())
      ->add_render($this->render_section_principal())
      ->add_render($avulsos->render_section_blog())
      ->add_render($avulsos->render_section_newsletter())
      ->echo_render();
  }


  public function render_section_principal(): string
  {
    $args['categoria'] = $this->categoria;

    $posts = $this->get_ultimos($this->posts_por_pagina, $this->categoria, $this->pagina);

    $args['cards'] = '';

    $destaque = true;
    while ($posts->have_posts()) {
      $posts->the_post();
      $args['cards'] .= $this->render_card_projeto_v2(get_the_ID(), 'card-projeto--archive col-12 col-4@md');
    }

    $paginacao = new Alp_Paginacao($posts);
    $args['paginacao'] = $this->html('frontend/base/paginacao/block-paginacao.php', compact('paginacao'));
    $args['categorias'] = get_terms(['taxonomy' => 'projeto_cat', 'hide_empty' => true]);
    $args['categoria_selecionada'] = $this->categoria ?? '';

    return $this->html('frontend/views/pages/projetos/section-principal-projetos.php', $args);
  }

  /**
   * Retorna os últimos projetos.
   * @param int $quantidade Quantidade de projetos.
   * @param int|array|string $cat Categoria dos projetos.
   * @param int|array|string $pagina Página dos projetos.
   * @param array<string,mixed> $args Mais args para a montagem da query.
   * @return WP_Query Query resultante.
   */
  public function get_ultimos(int $quantidade = 6, int|array|string $cat = 0, int $pagina = 1, array $args = []): WP_Query
  {
    $default_args = [
      'post_type' => 'projeto',
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
          'taxonomy' => 'projeto_cat',
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

    $cat = get_term_by('slug', $cat_slug, 'projeto_cat');
    if ($cat instanceof WP_Term) return $cat->term_id;
    return 0;
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new MS_Projetos(), 'setup']);
