<?php

/**
 * Classe responsável pela página de Soluções para Mobilidade Elétrica.
 * @package Alpina V4
 * @version 4.0
 */
class SV_Solucoes_Mobilidade extends Alp_Page
{
  use SV_Banner_Topo, SV_Apresentacao;

  /**
   * Faz o setup da estrutura da página no backend.
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-solucoes-mobilidade-eletrica.php', 'mobilidade');

    self::create_metaboxes();
  }

  /**
   * Cria as metaboxes do template.
   */
  public function create_metaboxes(): void
  {
    $this->template->create_metaboxes()
      //BANNER
      ->chain_from_callable([$this, 'chain_metaboxes_banner_topo'], logo: true)
      //APRESENTAÇÃO
      ->chain_from_callable([$this, 'chain_metaboxes_apresentacao_v2'])
      //SEÇÂO PRINCIPAL
      ->add_metabox_box('principal', 'Seção Principal')
      ->add_metabox_field_image('Imagem do Banner', 'imagem', 1, 2)
      ->add_metabox_field_image('Logo', 'logo', 1, 2)
      ->add_metabox_field_biu('Texto (Sobre)', 'texto', 8)
      ->add_metabox_heading('Bloco de Qualidades')
      ->add_metabox_field_text('Texto', 'texto_qualidades', 6)
      ->add_metabox_field_biu_list('Qualidades', 'qualidades', 6)
      ->add_metabox_heading('Forma de Trabalho')
      ->add_metabox_field_text('Título', 'titulo_trabalho', 6)
      ->add_metabox_field_biu('Texto', 'texto_trabalho', 6)
      ->add_metabox_heading('Bloco de Especializações')
      ->add_metabox_field_text('Título', 'titulo_especializacoes', 6)
      ->add_metabox_field_biu_list('Lista', 'lista_especializacoes', 6)
      ->add_metabox_heading('Bloco com Botão (CTA)')
      ->add_metabox_field_biu('Texto', 'texto_bloco_cta', 6)
      ->add_metabox_field_blank(6)
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 4)
      ->add_metabox_field_text('Link no botão', 'cta_link', 4)
      ->add_metabox_field_select_target('Onde abrir o link', 'cta_target', 4)
      //SEÇÂO MOTIVOS
      ->add_metabox_box('motivos', 'Seção Motivos')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_group('Cards', 'cards', 'Card {#} - {titulo}')
      ->add_metabox_field_image('Ícone', 'icone', 1, 2)
      ->add_metabox_field_biu('Título', 'titulo', 5)
      ->add_metabox_field_biu('Texto', 'texto', 5)
      ->close_metabox_group()
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 4)
      ->add_metabox_field_text('Link no botão', 'cta_link', 4)
      ->add_metabox_field_select_target('Onde abrir o link', 'cta_target', 4)
      //BANNER INFERIOR
      ->add_metabox_box('banner_inferior', 'Banner Inferior')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_field_image('Imagem', 'imagem', 1, 3)
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 3)
      ->add_metabox_field_text('Link no botão', 'cta_link', 3)
      ->add_metabox_field_select_target('Onde abrir o link', 'cta_target', 3)
      ->render();
  }

  /**
   * Renderiza a página.
   * @return void
   */
  public function render(): void
  {
    $avulsos = new SV_Avulsos();
    $this
      ->add_render($this->render_banner_topo())
      ->add_render($this->render_section_apresentacao_v2())
      ->add_render($this->render_section_apresentacao_voolta())
      ->add_render($this->render_section_motivos_voolta())
      ->add_render($this->render_section_banner_voolta())
      ->echo_render();
  }

  /**
   * Renderiza a seção de apresentação da Solução.
   * @return string HTML renderizado.
   */
  public function render_section_apresentacao_voolta(): string
  {
    $args = $this->get_post_metas_values('principal', ['metafields' => ['imagem' => 'src', 'logo' => 'svg']]);
    return $this->html('frontend/views/pages/mobilidade/section-apresentacao-voolta.php', $args);
  }

  /**
   * Renderiza a seção de motivos da Solução.
   * @return string HTML renderizado.
   */
  public function render_section_motivos_voolta(): string
  {
    $args = $this->get_post_metas_values('motivos', ['metafields' => ['icone' => 'svg']]);
    return $this->html('frontend/views/pages/mobilidade/section-motivos-voolta.php', $args);
  }

  /**
   * Renderiza o banner inferior da Solução.
   * @return string HTML renderizado.
   */
  public function render_section_banner_voolta(): string
  {
    $args = $this->get_post_metas_values('banner_inferior', ['metafields' => ['imagem' => 'src']]);
    return $this->html('frontend/views/pages/mobilidade/section-banner-voolta.php', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new SV_Solucoes_Mobilidade(), 'setup']);
