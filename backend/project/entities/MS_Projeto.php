<?php
class MS_Projeto
{
  use Alp_Entitable, Alp_Renderable;

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
      ->add_metabox_field_biu('Texto do card', 'texto_card', 9)
      ->add_metabox_field_image('Imagem de Destaque', 'imagem', 1, 3)
      ->add_metabox_field_biu('Texto', 'texto', 12, ['options' => ['textarea_rows' => 10]])
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
   * Renderiza a página.
   * @return void
   */
  public function render(): void
  {
    $this
      ->add_render($this->render_section_ver_mais_projetos())
      ->echo_render();
  }

  /**
   * Renderiza a seção de informações do Projeto.
   * @return string HTML renderizado.
   */
  public function render_section_ver_mais_projetos(): string
  {
    $query = new WP_Query([
      'post_type' => 'projeto',
      'posts_per_page' => 6,
    ]);

    if (!$query->have_posts()) return false;

    $cards = '';

    while ($query->have_posts()) {
      $query->the_post();
      $cards .= $this->render_card_servico(get_the_ID(), 'card-projeto--archive col-12 col-4@md');
    }

    $args = compact('cards');

    return $this->html('frontend/views/singles/servico/section-servicos.php', $args);
  }

  /**
   * Renderiza um card de projeto.
   * @param int $id ID do projeto.
   * @param string $css_classes Classes CSS adicionais.
   * 
   * @return string HTML renderizado.
   */
  public function render_card_servico(int $id, $css_classes = ''): string
  {
    $args = (new MS_Projeto($id))->get_post_metas_values('', ['metafields' => ['imagem' => 'img']]);

    $args = array_merge($args, compact('css_classes'));
    return $this->html('frontend/views/cards/card-servico', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', ['MS_Projeto', 'setup']);
