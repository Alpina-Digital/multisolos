<?php

/**
 * Classe responsável pela página do Blog.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Blog extends Alp_Page
{
  private string $pesquisa;
  private string $categoria;
  private int $posts_por_pagina = 9;
  private int $pagina = 1;

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   * @return void
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-blog.php', 'blog');
    $this->create_metaboxes();
  }

  /**
   * Cria as metaboxes do template.
   * @return void
   */
  public function create_metaboxes(): void
  {
    $this->template->create_metaboxes()
      ->add_metabox_box('', 'Informações do Blog')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_box('ultimas', 'Seção de Blog em outras páginas')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_text('Texto do Botão', 'cta_texto', 6)
      // ->add_metabox_box('newsletter', 'Seção Newsletter')
      // ->add_metabox_field_biu('Título', 'titulo', 6)
      // ->add_metabox_field_biu('Texto', 'texto', 6)
      ->render();
  }

  /**
   * Renderiza a página.
   * @return void
   */
  public function render(): void
  {
    $this->pesquisa = $_GET['pesquisa'] ?? '';
    $this->pagina = $_GET['pagina'] ?? 1;
    $this->categoria = $_GET['categoria'] ?? '';

    $this
      ->add_render($this->render_section_principal())
      ->echo_render();
  }

  public function render_section_principal(): string
  {
    $args = $this->get_post_metas_values('_main');
    $args['lupa'] = get_svg_content('lupa.svg');
    $args['pesquisa'] = $this->pesquisa;
    $args['categoria'] = $this->categoria;

    $posts = Alp_Blog::get_ultimas($this->posts_por_pagina, $this->categoria, $this->pagina, ['s' => $this->pesquisa]);

    $args['cards'] = '';

    while ($posts->have_posts()) {
      $posts->the_post();
      $args['cards'] .= $this->render_card_blog(get_the_ID(), 'col-12 col-4@md');
    }

    $paginacao = new Alp_Paginacao($posts);
    $args['paginacao'] = $this->html('frontend/base/paginacao/block-paginacao.php', compact('paginacao'));
    $args['categorias'] = get_terms(['taxonomy' => 'category', 'hide_empty' => true, 'exclude' => 1]);
    $args['categoria_selecionada'] = $this->categoria ?? '';

    return $this->html('frontend/views/pages/blog/section-principal-blog.php', $args);
  }

  /**
   * Renderiza um card de blog.
   * @param int $id ID do post.
   * @return string HTML do card.
   */
  public function render_card_blog_destaque(int $id): string
  {
    $titulo = get_the_title($id);
    $resumo = get_the_excerpt($id);
    $imagem = get_the_post_thumbnail($id, 'large');
    $categoria = get_the_category($id)[0]->name;
    $url = get_the_permalink($id);

    $args = compact('titulo', 'resumo', 'imagem', 'url', 'categoria');
    return $this->html('frontend/views/cards/card-blog-destaque.php', $args);
  }

  /**
   * Renderiza um card de blog.
   * @param int $id ID do post.
   * @param string $classes Classes CSS adicionais.
   * @return string HTML renderizado.
   */
  public function render_card_blog(int $id, string $classes = 'col-12 col-4@md'): string
  {
    $titulo = get_the_title($id);
    $categoria = get_the_category($id)[0]->name;
    $resumo = get_the_excerpt($id);
    $imagem = get_the_post_thumbnail_url($id);
    $link = get_the_permalink($id);

    $args = compact('titulo', 'categoria', 'resumo', 'imagem', 'link', 'classes');

    return $this->html('frontend/views/cards/card-blog', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new MS_Blog(), 'setup']);
