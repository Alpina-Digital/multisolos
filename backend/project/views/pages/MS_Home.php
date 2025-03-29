<?php

/**
 * Classe responsável pela página Home.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Home extends Alp_Page
{
  use Alp_Banners_Home, MS_Section_Projetos;

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-home.php', 'home');
    $this->create_metaboxes();
  }

  /**
   * Cria as metaboxes do template.
   */
  public function create_metaboxes(): void
  {
    $this->template->create_metaboxes()
      //QUEM SOMOS NA HOME
      ->add_metabox_box('quem_somos', 'Seção de chamada para Quem Somos')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_group('Itens', 'itens', 'Item {#}', 2)
      ->add_metabox_field_image('Ícone', 'icone', 1, 2)
      ->add_metabox_field_biu('Título', 'titulo', 5)
      ->add_metabox_field_biu('Texto', 'texto', 5)
      ->close_metabox_group()
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 4)
      ->add_metabox_field_cpt('Selecione a Página', 'cta_link', 'page', 1, 4)
      ->add_metabox_field_image('Imagem Lateral', 'imagem', 1, 4)

      ->render();
  }

  /**
   * Renderiza toda a Home.
   * @return void
   */
  public function render(): void
  {
    $avulsos = new MS_Avulsos();

    $this
      ->add_render($this->render_section_banners())
      ->add_render($this->render_section_servicos())
      // ->add_render($avulsos->render_section_blog())
      ->add_render($avulsos->render_section_newsletter())
      ->echo_render();
  }

  /**
   * Renderiza a seção de informações do Serviço.
   * @return string HTML renderizado.
   */
  public function render_section_servicos(): string
  {
    $query = new WP_Query([
      'post_type' => 'servico',
      'posts_per_page' => 6,
    ]);

    if (!$query->have_posts()) return false;

    $cards = '';

    $indice = 0;
    while ($query->have_posts()) {
      $indice++;
      $query->the_post();
      $cards .= $this->render_card_servico(get_the_ID(), 'card-projeto--archive col-12 col-4@md', $indice);
    }

    $args = compact('cards');

    return $this->html('frontend/views/singles/servico/section-servicos.php', $args);
  }

  /**
   * Renderiza um card de servico.
   * @param int $id ID do servico.
   * @param string $css_classes Classes CSS adicionais.
   * 
   * @return string HTML renderizado.
   */
  public function render_card_servico(int $id, $css_classes = '', int $indice = 0): string
  {

    $titulo = get_the_title($id);
    $texto_card = esc_html(get_post_meta($id, 'servico_texto_card', true));
    $imagem = wp_get_attachment_image_url(get_post_meta($id, 'servico_imagem', true));
    $link = get_permalink($id);
    $indice = sprintf('%02d', $indice); //adiciona o 0 na frente do numero


    $args = compact('titulo', 'texto_card', 'imagem', 'link', 'css_classes', 'indice');

    return $this->html('frontend/views/cards/card-servico', $args);
  }

  /**
   * Renderiza a seção Quem Somos na Home.
   * @return string HTML renderizado.
   */
  public function render_section_quem_somos_home(): string
  {
    /**
     * @var array{titulo:string,texto:string,cta_texto:string,cta_link:string,imagem:string,itens:array<array{icone:string,titulo:string,texto:string}>} $args
     */
    $args = $this->get_post_metas_values('quem_somos');
    if (empty($args['itens'])) $args['itens'] = [];
    if (!is_array($args['itens'])) $args['itens'] = [$args['itens']];

    $args['cta_link'] = get_permalink($args['cta_link']);

    return $this->html('frontend/views/pages/home/section-quem-somos-home.php', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new MS_Home(), 'setup']);
