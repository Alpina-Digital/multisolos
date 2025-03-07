<?php

/**
 * Classe responsável pela página FAQ.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class SV_FAQ extends Alp_Page
{
  use SV_Apresentacao;

  private string $cat_selecionada = '';
  private string $busca = '';

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   * @return void
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-faq.php', 'faq');
    $this->create_metaboxes();

    if (empty($this->busca)) $this->busca = $_REQUEST['busca'] ?? '';
    if (empty($this->cat_selecionada)) $this->cat_selecionada = $_REQUEST['cat'] ?? '';
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
    $this
      ->add_render($this->render_section_apresentacao_azul())
      ->add_render($this->render_section_principal())
      ->echo_render();
  }

  /**
   * Renderiza a seção principal.
   * @return string HTML renderizado.
   */
  public function render_section_principal(): string
  {
    $cat_selecionada = $this->cat_selecionada;
    $busca = $this->busca;

    $categorias = $this->get_categorias_principais();

    $conteudo = $this->render_block_conteudo_faq();

    $args = compact('conteudo', 'busca', 'categorias', 'cat_selecionada');

    return $this->html('frontend/views/pages/faq/section-principal-faq.php', $args);
  }

  /**
   * Renderiza o bloco de conteúdo de FAQ.
   * @return string HTML renderizado.
   */
  private function render_block_conteudo_faq(): string
  {
    $itens = [];
    $cats = $this->get_categorias_principais();

    foreach ($cats as $cat) {
      $conteudo = $this->render_block_itens_faq($cat->slug);
      if ($conteudo) $itens[] = (object) ['name' => $cat->name, 'conteudo' => $conteudo];
    }

    return $this->html('frontend/views/pages/faq/block-conteudo-faq.php', compact('itens'));
  }

  /**
   * Renderiza os itens de FAQ.
   * @param string $cat_slug Slug da categoria.
   * @return string HTML renderizado.
   */
  private function render_block_itens_faq(string $cat_slug): string
  {
    $args = [
      'post_type' => 'faq',
      'posts_per_page' => -1,
      's' => $this->busca
    ];

    if ($cat_slug) {
      $args['tax_query'] = [
        [
          'taxonomy' => 'faq_cat',
          'field' => 'slug',
          'terms' => $cat_slug
        ]
      ];
    }

    $query = new WP_Query($args);

    if (!$query->have_posts()) return '';

    $itens = [];

    while ($query->have_posts()) {
      $query->the_post();
      $itens[] = (object) [
        'titulo' => get_the_title(),
        'conteudo' => apply_filters('the_content', get_the_content())
      ];
    }

    return $this->html('frontend/views/pages/faq/block-itens-faq.php', compact('itens'));
  }

  /**
   * Retorna as categorias principais de FAQ.
   * @return array Categorias.
   */
  private function get_categorias_principais(): array
  {
    $categorias = [];

    if (empty($this->cat_selecionada)) {
      $terms = get_terms([
        'taxonomy' => 'faq_cat',
        'parent' => 0,
        'hide_empty' => true
      ]);
    } else {
      $terms = [get_term_by('slug', $this->cat_selecionada, 'faq_cat')];
    }



    foreach ($terms as $term) {
      $categorias[] = (object) [
        'name' => $term->name,
        'slug' => $term->slug,
        'active' => $term->slug === $this->cat_selecionada
      ];
    }

    return $categorias;
  }

  /**
   * Retorna o conteúdo da seção principal via AJAX.
   * @return void
   */
  public function ajax_conteudo_bloco_faqs(): void
  {
    $this->setup();
    wp_send_json_success($this->render_block_conteudo_faq());
    wp_die();
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new SV_FAQ(), 'setup']);
add_action('wp_ajax_conteudo_faq', [new SV_FAQ(), 'ajax_conteudo_bloco_faqs']);
add_action('wp_ajax_nopriv_conteudo_faq', [new SV_FAQ(), 'ajax_conteudo_bloco_faqs']);
