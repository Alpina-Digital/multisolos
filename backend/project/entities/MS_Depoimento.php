<?php

/**
 * Classe para a entidade de Depoimento.
 */
class MS_Depoimento
{
  use Alp_Entitable;

  /**
   * Setup da entidade.
   * @hooked action 'after_setup_theme'
   * @return void
   */
  public static function setup(): void
  {
    self::$entity = (new Alp_Entity())
      ->create_post_type('Depoimento', 'Depoimentos', 'depoimento', false, 'format-chat', false, false);

    self::create_metaboxes();
  }

  public static function create_metaboxes(): void
  {
    self::$entity
      ->create_metaboxes()
      ->add_metabox_box('', 'Informações Gerais')
      ->add_metabox_field_text('Autor', 'nome', 4)
      ->add_metabox_field_biu('Texto do Depoimento', 'depoimento', 12)
      ->render();
  }

  /**
   * Retorna os valores dos metadados do post.
   * @return array{nome:string,depoimento:string} Valores dos metadados.
   */
  public function get_post_metas_values(): array
  {
    return self::$entity->get_metaboxes()->get_post_metas_values($this->id, '_main');
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', ['MS_Depoimento', 'setup']);
