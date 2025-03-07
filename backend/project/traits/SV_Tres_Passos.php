<?php

/**
 * Trait responsável por adicionar a seção com três passos.
 * @package Alpina V4
 * @version 4.0
 */
trait SV_Tres_Passos
{
  use Alp_Renderable;

  /**
   * Encadeia os metaboxes da seção com três passos.
   * @param Alp_Metabox $metaboxes Objeto de metaboxes entrando.
   * @return Alp_Metabox Objeto de metaboxes saindo.
   */
  public function chain_metaboxes_tres_passos(Alp_Metabox $metaboxes): Alp_Metabox
  {
    return $metaboxes
      ->add_metabox_box('tres_passos', 'Seção com Três Passos')
      ->add_metabox_field_biu('Título', 'titulo', 12)
      ->add_metabox_group('Itens Numéricos', 'itens_numericos', 'Item Numérico {#} - {titulo}')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->close_metabox_group()
      ->add_metabox_group('Itens com Check', 'itens_check', 'Item com Check {#} - {texto}')
      ->add_metabox_field_text('Texto', 'texto', 12)
      ->close_metabox_group()
      ->add_metabox_field_text('Texto do CTA', 'cta_texto', 4)
      ->add_metabox_field_text('Link do CTA', 'cta_link', 4)
      ->add_metabox_field_select_target('Onde abrir o link?', 'cta_target', 4);
  }

  /**
   * Renderiza a seção com três passos.
   * @return string HTML renderizado.
   */
  public function render_section_tres_passos(): string
  {
    $args = $this->get_post_metas_values('tres_passos');
    if (empty($args['itens_numericos'])) $args['itens_numericos'] = [];
    if (!is_array($args['itens_numericos'])) $args['itens_numericos'] = [$args['itens_numericos']];

    if (empty($args['itens_check'])) $args['itens_check'] = [];
    if (!is_array($args['itens_check'])) $args['itens_check'] = [$args['itens_check']];

    return $this->html('frontend/views/avulsos/section-tres-passos.php', $args);
  }
}
