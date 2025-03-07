<?php

/**
 * 
 */
class SV_Reconhecimento
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
      ->create_post_type('Reconhecimento', 'Reconhecimentos', null, false, 'awards', false, false);
    self::create_metaboxes();
  }

  public static function create_metaboxes(): void
  {
    self::$entity
      ->create_metaboxes()
      ->add_metabox_box('', 'Informações do Reconhecimento')
      ->add_metabox_field_image('Imagem', 'imagem', 1, 12)
      ->render();
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', ['SV_Reconhecimento', 'setup']);
