<?php

/**
 * 
 */
class MS_Parceiro
{
  private static Alp_Entity $entity;
  private static Alp_Metabox $metaboxes;

  /**
   * Setup da entidade.
   * @hooked action 'after_setup_theme'
   * @return void
   */
  public static function setup(): void
  {
    self::$entity = (new Alp_Entity())
      ->create_post_type('Parceiro', 'Parceiros', null, false, 'businessman', false, false);

    self::create_metaboxes();
  }

  public static function create_metaboxes(): void
  {
    self::$entity
      ->create_metaboxes()
      ->add_metabox_box('', 'Informações do Parceiro')
      ->add_metabox_field_image('Logo', 'logo', 1, 12)
      ->render();
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', ['MS_Parceiro', 'setup']);
