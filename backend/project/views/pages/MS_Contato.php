<?php

/**
 * Classe responsável pela página Contato.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Contato extends Alp_Page
{
  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   * @return void
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-contato.php', 'contato');
    $this->create_metaboxes();
  }

  /**
   * Cria os metaboxes da página.
   * @return void
   */
  public function create_metaboxes(): void
  {
    $this->template->create_metaboxes()
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
    $args['form'] = Alp_Settings::get_form('contato');

    return $this->html('frontend/views/pages/contato/section-principal-contato.php', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new MS_Contato(), 'setup']);
