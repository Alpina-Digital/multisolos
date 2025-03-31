<?php
class MS_Obras_Entregues
{
  use Alp_Entitable;

  /**
   * Faz o setup da Entidade.
   * @hooked action 'after_setup_theme'
   */
  public static function setup(): void
  {
    self::$entity = (new Alp_Entity())
      ->create_post_type('Obra', 'Obras entregues', 'obras_entregues', true, 'flag', true, true)
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
      ->add_metabox_field_text('Slogan', 'slogan', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      
      ->add_metabox_heading('', 'Depoimento')
      ->add_metabox_field_biu('Texto', 'depoimento_texto', 12)
      ->add_metabox_field_text('Nome', 'depoimento_nome', 5)
      ->add_metabox_field_text('Responsável', 'depoimento_responsavel', 4)
      ->add_metabox_field_image('Foto', 'depoimento_foto', 1, 3)
      
      ->add_metabox_field_image('Galeria de imagens', 'galeria', 12)

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
add_action('after_setup_theme', ['MS_Obras_Entregues', 'setup']);
