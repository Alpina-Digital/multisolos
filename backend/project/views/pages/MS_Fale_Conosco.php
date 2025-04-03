<?php

/**
 * Classe responsável pela página Fale Conosco.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Fale_Conosco extends Alp_Page
{
  use MS_Banner_Topo;
  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   * @return void
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-fale-conosco.php', 'contato');
    $this->create_metaboxes();
  }

  /**
   * Cria os metaboxes da página.
   * @return void
   */
  public function create_metaboxes(): void
  {
    $this->template->create_metaboxes()
      //BANNER
      ->chain_from_callable([$this, 'chain_metaboxes_banner_topo'])

      ->add_metabox_box('', 'Informações da Página')
      ->add_metabox_field_biu('Título', 'titulo', 12)
      ->render();
  }

  /**
   * Renderiza a página FAQ.
   * @return void
   */
  public function render(): void
  {
    $this
      ->add_render($this->render_banner_topo())
      ->add_render($this->render_section_principal())
      ->echo_render();
  }

  /**
   * Renderiza a seção principal.
   * @return string HTML renderizado.
   */
  public function render_section_principal(): string
  {
    $footer = new MS_Footer();
    $args = $this->get_post_metas_values('_main');

    $contatos = $footer->get_contatos();
    $args['contatos'] = [$contatos[1], $contatos[2], $contatos[0]];

    $args['sociais'] = $footer->get_sociais();

    $args['form_contato'] = Alp_Settings::get_form('contato');
    $args['form_orcamento'] = Alp_Settings::get_form('orcamento');

    return $this->html('frontend/views/pages/fale-conosco/section-fale-conosco.php', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new MS_Fale_Conosco(), 'setup']);
