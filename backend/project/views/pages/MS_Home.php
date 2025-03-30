<?php

/**
 * Classe responsável pela página Home.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Home extends Alp_Page
{
  use Alp_Banners_Home;

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
      // ->add_render($avulsos->render_section_blog())
      ->add_render($avulsos->render_section_nossos_servicos())
      ->add_render($avulsos->render_section_newsletter())
      ->echo_render();
  }

 
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new MS_Home(), 'setup']);
