<?php

/**
 * Classe responsável pela página de Soluções.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class SV_Solucoes extends Alp_Page
{
  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-solucoes.php', 'solucoes');
    $this->create_metaboxes();
  }

  /**
   * Cria as metaboxes do template.
   */
  public function create_metaboxes(): void
  {
    $this->template->create_metaboxes()

      //BANNER
      ->add_metabox_box('banner', 'Banner no Topo')
      ->add_metabox_field_biu('Subtítulo', 'subtitulo', 3)
      ->add_metabox_field_biu('Título', 'titulo', 3)
      ->add_metabox_field_biu('Texto', 'texto', 3)
      ->add_metabox_field_image('Imagem de Fundo', 'imagem', 1, 3)
      //SERVIÇOS ESPECIALIZADOS
      ->add_metabox_box('especializados', 'Serviços Especializados')
      ->add_metabox_field_text('Subtítulo', 'subtitulo', 6)
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_group('Cards', 'cards', 'Card {#} - {titulo}')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_field_cpt('Link do Saiba Mais', 'cta_link', 'page', 1, 6)
      ->add_metabox_field_image('Imagem de Fundo', 'imagem', 1, 6)
      ->close_metabox_group()
      //TIPOS DE SOLUÇÕES
      ->add_metabox_box('tipos', 'Tipos de Soluções')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_text('Subtítulo', 'subtitulo', 6)
      ->add_metabox_group('Tipos', 'tipos', 'Tipo {#} - {titulo}')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_field_image('Ícone', 'icone', 1, 3)
      ->add_metabox_field_image('Imagem Lateral', 'imagem', 1, 3)
      ->add_metabox_field_cpt('Link do Saiba Mais', 'cta_link', 'page', 1, 6)
      ->close_metabox_group()

      ->render();
  }


  public function render(): void
  {
    $avulsos = new SV_Avulsos();
    $this->add_render($this->render_banner_topo())

      ->add_render($avulsos->render_section_servicos_especializados())
      ->add_render($avulsos->render_section_solucoes())
      ->add_render($avulsos->render_block_glow_azul(660, 'esquerda'))
      ->add_render($avulsos->render_block_glow_azul(1200, 'direita'))

      ->echo_render();
  }
  use SV_Banner_Topo;
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new SV_Solucoes(), 'setup']);
