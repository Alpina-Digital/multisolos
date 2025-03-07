<?php

/**
 * Reproduz o banner de energia solar como investimento.
 * @package Alpina V4
 * @version 4.0
 */
trait SV_Banner_Energia_Investimento
{
  use Alp_Renderable;

  /**
   * Encadeia as metaboxes do banner de energia solar como investimento.
   * @param Alp_Metabox $metaboxes Objeto de metaboxes entrando.
   * @return Alp_Metabox Objeto saindo.
   */
  public function chain_metaboxes_banner_energia_investimento(Alp_Metabox $metaboxes): Alp_Metabox
  {
    return $metaboxes
      ->add_metabox_box('banner_investimento', 'Seção Banner Energia Solar como investimento')
      ->add_metabox_field_text('Subtítulo', 'subtitulo', 6, ['std' => 'Energia Solar como investimento'])
      ->add_metabox_field_biu('Título', 'titulo', 6, ['std' => 'A energia solar é uma das melhores formas de investir seu dinheiro'])
      ->add_metabox_heading('Bloco Azul', '', 12)
      ->add_metabox_field_image('Imagem de Fundo', 'imagem', 1, 2, '', ['std' => [614]])
      ->add_metabox_field_biu('Título', 'titulo_azul', 5)
      ->add_metabox_field_biu('Texto', 'texto_azul', 5)
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 4, ['std' => 'Solicitar Orçamento'])
      ->add_metabox_field_text('Link no botão', 'cta_link', 4, ['std' => '/orcamento'])
      ->add_metabox_field_select_target('Onde abrir o link', 'cta_target', 4);
  }

  /**
   * Renderiza o banner de energia solar como investimento.
   * @return string HTML renderizado.
   */
  public function render_banner_energia_investimento(string $class = 'padding-bottom-xl'): string
  {
    if (!isset($this->template) || !$this->template) return '';

    /**
     * @var array{subtitulo:string,titulo:string,texto:string,imagem:string} $args
     */
    $args = $this->get_post_metas_values('banner_investimento', ['metafields' => ['imagem' => 'src']]);
    $args['class'] = $class;
    return $this->html('frontend/views/avulsos/banner-energia-solar-como-investimento.php', $args);
  }
}
