<?php

/**
 * Trait responsável por renderizar o banner no topo da página.
 * @package Alpina V4
 * @version 4.0
 * 
 */
trait SV_Banner_Topo
{
  use Alp_Renderable;

  /**
   * Encadeia os metaboxes do banner no topo da página.
   * @param Alp_Metabox $metaboxes Objeto de metaboxes entrando.
   * @return Alp_Metabox Objeto de metaboxes saindo.
   */
  public function chain_metaboxes_banner_topo(Alp_Metabox $metaboxes, bool $logo = false): Alp_Metabox
  {
    $metaboxes
      ->add_metabox_box('banner', 'Banner no Topo')
      ->add_metabox_field_image('Imagem de Fundo', 'imagem', 1, 6);

    if ($logo) $metaboxes->add_metabox_field_image('Logo da Empresa', 'logo', 1, 6);
    else $metaboxes->add_metabox_field_text('Subtítulo', 'subtitulo', 6);

    $metaboxes
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6);

    return $metaboxes;
  }

  /**
   * Renderiza o banner no topo da página.
   * @return string HTML renderizado.
   */
  public function render_banner_topo(): string
  {
    if (!isset($this->template) || !$this->template) return '';

    $args = $this->get_post_metas_values('banner', ['metafields' => ['imagem' => 'src', 'logo' => 'svg']]);
    return $this->html('frontend/views/avulsos/section-hero-page.php', $args);
  }
}
