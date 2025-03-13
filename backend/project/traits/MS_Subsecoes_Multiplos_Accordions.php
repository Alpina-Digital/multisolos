<?php

/**
 * Reproduz uma seção com subseções com múltiplos accordions.
 * @package Alpina V4
 * @version 4.0
 */
trait MS_Subsecoes_Multiplos_Accordions
{
  use Alp_Renderable;

  /**
   * Adiciona os metaboxes da seção de múltiplos accordions.
   * @param Alp_Metabox $metaboxes Instância da classe de metaboxes.
   * @param string $id ID da metabox.
   * @param string $name Nome da metabox.
   * @return Alp_Metabox Instância da classe de metaboxes.
   */
  public function chain_metaboxes_subsecoes_multiplos_accordions(Alp_Metabox $metaboxes, string $id, string $name): Alp_Metabox
  {
    $metaboxes
      ->add_metabox_box($id, $name)
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_group('Subseções', 'subsecoes', 'Subseção {#} - {titulo}')
      ->add_metabox_field_image('Ícone', 'icone', 1, 3)
      ->add_metabox_field_text('Título', 'titulo', 9)
      ->add_metabox_group('Itens', 'itens', 'Item {#} - {titulo}', 2)
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->close_metabox_group()
      ->close_metabox_group();

    return $metaboxes;
  }

  /**
   * Renderiza a seção de múltiplos accordions.
   * @return string HTML renderizado.
   */
  public function render_section_subsecoes_multiplos_accordions($box_id = 'accordions', $classes = 'padding-y-xl'): string
  {
    $args = $this->get_post_metas_values($box_id);

    if (empty($args['subsecoes'])) $args['subsecoes'] = [];
    if (!is_array($args['subsecoes'])) $args['subsecoes'] = [$args['subsecoes']];

    foreach ($args['subsecoes'] as &$subsecao) {
      $subsecao = $this->render_item_subsecao_multiplos_accordions($subsecao);
    }

    $args['subsecoes'] = implode('', $args['subsecoes']);
    $args['classes'] = $classes;

    return $this->html('frontend/views/avulsos/subsecoes-multiplos-accordions/section-subsecoes-multiplos-accordions.php', $args);
  }

  /**
   * Renderiza um item de subseção de múltiplos accordions.
   * @param array $args Argumentos para renderização.
   * @return string HTML renderizado.
   */
  private function render_item_subsecao_multiplos_accordions(array $args): string
  {
    if (empty($args['itens'])) $args['itens'] = [];
    if (!is_array($args['itens'])) $args['itens'] = [$args['itens']];

    return $this->html('frontend/views/avulsos/subsecoes-multiplos-accordions/item-subsecao-multiplos-accordions.php', $args);
  }
}
