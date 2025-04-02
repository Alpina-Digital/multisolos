<?php
class MS_Equipamentos
{
  use Alp_Entitable;

  /**
   * Faz o setup da Entidade.
   * @hooked action 'after_setup_theme'
   */
  public static function setup(): void
  {
    self::$entity = (new Alp_Entity())
      ->create_post_type('Equipamento', 'Equipamentos', 'equipamentos', false, 'admin-tools', false, false)
      ->create_taxonomy('', '');

    self::create_metaboxes();
  }

  /**
   * Estabelece os metaboxes de Serviço.
   * @return void
   */
  public static function create_metaboxes(): void
  {
    self::$entity
      ->create_metaboxes()
      
      ->add_metabox_box('', 'Conteúdo')
      ->add_metabox_field_biu('Texto', 'texto', 12)
      
      ->add_metabox_heading('Imagem destacada', '')
      ->add_metabox_field_image('', 'imagem_destacada', 1, 3)
      ->render();
  }

  /**
   * Retorna os valores dos metadados do post.
   * @return array{} Valores dos metadados.
   */
  public function get_post_metas_values(): array
  {
    return self::$entity->get_metaboxes()->get_post_metas_values($this->id, '');
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', ['MS_Equipamentos', 'setup']);
