<?php

/**
 * Reproduz a seção de Apresentação das páginas em várias versões.
 * @package Alpina V4
 * @version 4.0
 */
trait MS_Apresentacao
{
  /**
   * Encadeia a seção de Apresentação (v1).
   * @param Alp_Metabox $metaboxes O objeto de Alp_Metabox.
   * @return Alp_Metabox
   */
  public function chain_metaboxes_apresentacao_v1(Alp_Metabox $metaboxes): Alp_Metabox
  {
    $metaboxes
      ->add_metabox_box('secao_apresentacao', 'Seção Apresentação')
      ->add_metabox_field_biu('Título', 'titulo', 3)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_field_image('Imagem Lateral', 'imagem', 1, 3)
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 4)
      ->add_metabox_field_text('Link no botão', 'cta_link', 4)
      ->add_metabox_field_select_target('Onde abrir o link', 'cta_target', 4);

    return $metaboxes;
  }

  /**
   * Encadeia a seção de Apresentação (v2).
   * @param Alp_Metabox $metaboxes O objeto de Alp_Metabox.
   * @return Alp_Metabox
   */
  public function chain_metaboxes_apresentacao_v2(Alp_Metabox $metaboxes): Alp_Metabox
  {
    $metaboxes
      ->add_metabox_box('secao_apresentacao', 'Seção Apresentação')
      ->add_metabox_field_biu('Título', 'titulo', 3)
      ->add_metabox_field_biu('Texto', 'texto', 9)
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 4)
      ->add_metabox_field_text('Link no botão', 'cta_link', 4)
      ->add_metabox_field_select_target('Onde abrir o link', 'cta_target', 4);

    return $metaboxes;
  }

  /**
   * Encadeia a seção de Apresentação (v3).
   * @param Alp_Metabox $metaboxes O objeto de Alp_Metabox.
   * @return Alp_Metabox
   */
  public function chain_metaboxes_apresentacao_v3(Alp_Metabox $metaboxes): Alp_Metabox
  {
    $metaboxes
      ->add_metabox_box('secao_apresentacao', 'Seção Apresentação')
      ->add_metabox_field_biu('Título', 'titulo', 3)
      ->add_metabox_field_biu('Texto', 'texto', 9)
      ->add_metabox_group('Botões', 'botoes', 'Botão {#} - {cta_texto}')
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 4)
      ->add_metabox_field_text('Link no botão', 'cta_link', 4)
      ->add_metabox_field_select_target('Onde abrir o link', 'cta_target', 4)
      ->close_metabox_group();
    return $metaboxes;
  }

  /**
   * Encadeia a seção de Apresentação (azul).
   * @param Alp_Metabox $metaboxes O objeto de Alp_Metabox.
   * @return Alp_Metabox
   */
  public function chain_metaboxes_apresentacao_azul(Alp_Metabox $metaboxes, $subtitulo = true): Alp_Metabox
  {
    $metaboxes
      ->add_metabox_box('secao_apresentacao', 'Seção Apresentação');

    if ($subtitulo) $metaboxes->add_metabox_field_text('Subtítulo', 'subtitulo', 4);

    $metaboxes
      ->add_metabox_field_biu('Título', 'titulo', $subtitulo ? 4 : 6)
      ->add_metabox_field_biu('Texto', 'texto', $subtitulo ? 4 : 6);

    return $metaboxes;
  }

  /**
   * Renderiza a seção de Apresentação (v1).
   * @param string $v Versão da seção.
   * @return string HTML renderizado.
   */
  public function render_section_apresentacao_v1(): string
  {
    $args = $this->get_post_metas_values('secao_apresentacao');
    return $this->html("frontend/views/avulsos/apresentacao/section-apresentacao-v1", $args);
  }

  /**
   * Renderiza a seção de Apresentação (v2).
   * @return string HTML renderizado.
   */
  public function render_section_apresentacao_v2(): string
  {
    $args = $this->get_post_metas_values('secao_apresentacao', false);
    return $this->html("frontend/views/avulsos/apresentacao/section-apresentacao-v2", $args);
  }

  /**
   * Renderiza a seção de Apresentação (v3).
   * @return string HTML renderizado.
   */
  public function render_section_apresentacao_v3(): string
  {
    $args = $this->get_post_metas_values('secao_apresentacao', false);
    return $this->html("frontend/views/avulsos/apresentacao/section-apresentacao-v3", $args);
  }

  /**
   * Renderiza a seção de Apresentação (azul).
   * @return string HTML renderizado.
   */
  public function render_section_apresentacao_azul(): string
  {
    $args = $this->get_post_metas_values('secao_apresentacao', false);
    return $this->html("frontend/views/avulsos/apresentacao/section-apresentacao-azul", $args);
  }
}
