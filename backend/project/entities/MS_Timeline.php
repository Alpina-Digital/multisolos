<?php
class MS_Timeline
{
  use Alp_Entitable;

  /**
   * Faz o setup da Entidade.
   * @hooked action 'after_setup_theme'
   */
  public static function setup(): void
  {
    self::$entity = (new Alp_Entity())
      ->create_post_type('Timeline', 'Timelines', 'timeline', true, 'backup', true, true);

    self::create_metaboxes();
  }

  /**
   * Estabelece os metaboxes de Projeto.
   * @return void
   */
  public static function create_metaboxes(): void
  {
    self::$entity
      ->create_metaboxes()

      ->add_metabox_box('timeline', 'Informações Gerais')
      ->add_metabox_field_biu('Texto', 'texto', 9)
      ->add_metabox_field_image('Imagem', 'foto', 1, 3)
      ->add_metabox_field_datetime('Data do evento', 'timeline_data', 12, 'date')
      ->render();
  }

   /**
   * Retorna os valores dos metadados do post.
   * @return array{timeline_texto:string,timeline_ano:string,timeline_foto:string} Valores dos metadados.
   */
  public function get_post_metas_values(): array
  {
    return self::$entity->get_metaboxes()->get_post_metas_values($this->id, 'timeline');
  }

}

/**
 * Hooks
 */
add_action('after_setup_theme', ['MS_Timeline', 'setup']);
