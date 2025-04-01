<?php

/**
 * Classe responsável por uma página de serviço.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Servico extends Alp_Page
{

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-servico.php', 'servico');
    $this->create_metaboxes();
  }

  /**
   * Cria as metaboxes do template.
   */
  public function create_metaboxes(): void
  {
    $this->template->create_metaboxes()
      //BANNER TOPO
      ->add_metabox_box('banner_topo', 'Banner do topo')
      ->add_metabox_field_image('Banner do topo', 'imagem', 1, 3, '', ['required' => true])

      //CARROSSEL
      ->add_metabox_box('', 'Informações do carrossel')
      ->add_metabox_field_text('Texto do card', 'texto_card', 9, ['required' => true])
      ->add_metabox_field_image('Imagem do card', 'imagem_card', 1, 3, '', ['required' => true])

      //CONTEUDO DE DENTRO DA PÁGINA
      ->add_metabox_box('sobre', 'Sobre o serviço')
      ->add_metabox_field_biu('Texto', 'texto', 12, ['options' => ['textarea_rows' => 10]])
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 4)
      ->add_metabox_field_cpt('Selecione a Página', 'cta_link', 'page', 1, 4)
      ->add_metabox_group('Itens', 'itens')
      ->add_metabox_field_text('Texto', 'texto')
      ->close_metabox_group()
      ->add_metabox_field_image('Galeria de Imagens', 'imagens', 12, 6, 'Tamanho sugerido: 1216px x 640px')

      ->render();
  }


  /**
   * Renderiza toda a página.
   * @return void
   */
  public function render(): void
  {
    $avulsos = new MS_Avulsos();

    $this
      ->add_render($this->render_section_banner_topo())
      ->add_render($this->render_section_info_servico())
      ->add_render($avulsos->render_section_obras_entregues())
      ->add_render($avulsos->render_section_quem_ja_confiou())
      ->echo_render();
  }


  /**
   * Renderiza o banner do topo.
   * @return string HTML renderizado.
   */
  public function render_section_banner_topo(): string
  {
    $args = $this->get_post_metas_values('banner_topo', ['metafields' => ['imagem' => 'src']]);

    return $this->html('frontend/views/pages/servico/section-banner-topo.php', $args);
  }

  /**
   * Renderiza a seção de informações do Serviço.
   * @return string HTML renderizado.
   */
  public function render_section_info_servico(): string
  {
    $args = $this->get_post_metas_values('sobre', ['metafields' => ['imagens' => 'src']]);
    if (empty($args['imagens'])) $args['imagens'] = [];
    if (!is_array($args['imagens'])) $args['imagens'] = [$args['imagens']];

    return $this->html('frontend/views/pages/servico/section-sobre-servico.php', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new MS_Servico(), 'setup']);
