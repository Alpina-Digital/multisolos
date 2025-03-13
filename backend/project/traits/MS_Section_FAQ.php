<?php

/**
 * Trait responsável por adicionar a seção de FAQ nas páginas.
 * @package Alpina V4
 * @version 4.0
 */
trait MS_Section_FAQ
{
  use Alp_Renderable;

  /**
   * Encadeia os metaboxes do banner antes da seção de FAQ.
   * @param Alp_Metabox $metaboxes Objeto de metaboxes entrando.
   * @return Alp_Metabox Objeto de metaboxes saindo.
   */
  public function chain_metaboxes_banner_pre_faq(Alp_Metabox $metaboxes): Alp_Metabox
  {
    return $metaboxes
      ->add_metabox_box('banner_faq', 'Banner da Seção de FAQ')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_field_text('Texto do Botão', 'cta_texto', 4)
      ->add_metabox_field_text('Link do Botão', 'cta_link', 4)
      ->add_metabox_field_select_target('Onde abrir o link?', 'cta_target', 4);
  }

  /**
   * Encadeia os metaboxes da seção de FAQ.
   * @param Alp_Metabox $metaboxes Objeto de metaboxes entrando.
   * @param bool $posts Se haverá posts de FAQ ou se pegará as categorias.
   * @return Alp_Metabox Objeto de metaboxes saindo.
   */
  public function chain_metaboxes_section_faq(Alp_Metabox $metaboxes, $posts = false): Alp_Metabox
  {
    $metaboxes
      ->add_metabox_box('faq', 'Seção de FAQ')
      ->add_metabox_field_biu('Título', 'titulo', 6, ['std' => 'Ainda tem dúvidas?'])
      ->add_metabox_field_biu('Texto', 'texto', 6, ['std' => 'Encontre as respostas em nosso FAQ.'])
      ->add_metabox_field_text('Texto do Botão', 'cta_texto', 4, ['std' => 'Acessar FAQ'])
      ->add_metabox_field_text('Link do Botão', 'cta_link', 4, ['std' => home_url('faq')])
      ->add_metabox_field_select_target('Onde abrir o link?', 'cta_target', 4);

    if ($posts) $metaboxes->add_metabox_field_cpt('Perguntas', 'perguntas', 'faq', 10);
    else $metaboxes->add_metabox_field_tax('Categorias a exibir', 'categorias', 'faq_cat', 10);

    return $metaboxes;
  }

  /**
   * Renderiza o banner antes da seção de FAQ.
   * @return string HTML renderizado.
   */
  public function render_banner_pre_faq(): string
  {
    if (!isset($this->template) || !$this->template) return '';

    /**
     * @var array{titulo:string,texto:string,cta_texto:string,cta_link:string,cta_target:string} $args
     */
    $args = $this->get_post_metas_values('banner_faq');
    return $this->html('frontend/views/avulsos/faq-pages/banner-pre-faq.php', $args);
  }

  /**
   * Renderiza a seção de FAQ (v1).
   * @return string HTML renderizado.
   */
  public function render_section_faq_v1(): string
  {
    if (!isset($this->template) || !$this->template) return '';

    /**
     * @var array{titulo:string,texto:string,faq:array{pergunta:string,resposta:string}[]} $args
     */
    $args = $this->get_post_metas_values('faq');

    $args['categorias'] = get_terms([
      'taxonomy' => 'faq_cat',
      'hide_empty' => true,
      'include' => $args['categorias']
    ]);

    return $this->html('frontend/views/avulsos/faq-pages/section-faq-pages-v1.php', $args);
  }

  /**
   * Renderiza a seção de FAQ (v2).
   * @return string HTML renderizado.
   */
  public function render_section_faq_v2(): string
  {
    if (!isset($this->template) || !$this->template) return '';

    $args = $this->get_post_metas_values('faq');

    if (empty($args['perguntas'])) $args['perguntas'] = [];
    if (!is_array($args['perguntas'])) $args['perguntas'] = [$args['perguntas']];

    $args['perguntas'] = array_map(function ($pergunta) {
      return [
        'titulo' => get_the_title($pergunta),
        'resposta' => apply_filters('the_content', get_the_content(null, null, $pergunta))
      ];
    }, $args['perguntas']);

    return $this->html('frontend/views/avulsos/faq-pages/section-faq-pages-v2.php', $args);
  }
}
