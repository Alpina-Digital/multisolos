<?php

/**
 * Classe responsável pela página Home.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Home extends Alp_Page
{
  use Alp_Banners_Home, SV_Section_Projetos;

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-home.php', 'home');
    $this->create_metaboxes();
  }

  /**
   * Cria as metaboxes do template.
   */
  public function create_metaboxes(): void
  {
    $this->template->create_metaboxes()
      //QUEM SOMOS NA HOME
      ->add_metabox_box('quem_somos', 'Seção de chamada para Quem Somos')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_group('Itens', 'itens', 'Item {#}', 2)
      ->add_metabox_field_image('Ícone', 'icone', 1, 2)
      ->add_metabox_field_biu('Título', 'titulo', 5)
      ->add_metabox_field_biu('Texto', 'texto', 5)
      ->close_metabox_group()
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 4)
      ->add_metabox_field_cpt('Selecione a Página', 'cta_link', 'page', 1, 4)
      ->add_metabox_field_image('Imagem Lateral', 'imagem', 1, 4)
      //SEÇÂO DE PROJETOS
      ->chain_from_callable([$this, 'chain_metaboxes_section_projetos'])

      ->render();
  }

  /**
   * Renderiza toda a Home.
   * @return void
   */
  public function render(): void
  {
    $avulsos = new SV_Avulsos();

    $this
      ->add_render($this->render_section_banners())
      // ->add_render($avulsos->render_section_servicos_especializados())
      // ->add_render($avulsos->render_section_solucoes())
      // ->add_render($avulsos->render_section_big_numbers_associacoes())
      // ->add_render($avulsos->render_block_glow_azul(837, 'esquerda'))
      // ->add_render($avulsos->render_block_glow_azul(2003, 'direita'))
      // ->add_render($avulsos->render_wrapper_branco_por_cima(
      //   fn() => $this->render_section_nossos_projetos(),
      //   fn() => $this->render_section_quem_somos_home(),
      //   fn() => $avulsos->render_section_quem_ja_confiou(),
      // ))
      // ->add_render($avulsos->render_wrapper_cinza_por_cima(
      //   fn() => $avulsos->render_section_depoimentos(true),
      //   fn() => $avulsos->render_section_reconhecimentos(true)
      // ))
      ->add_render($avulsos->render_section_blog())
      ->add_render($avulsos->render_section_newsletter())
      ->echo_render();
  }

  /**
   * Renderiza a seção Quem Somos na Home.
   * @return string HTML renderizado.
   */
  public function render_section_quem_somos_home(): string
  {
    /**
     * @var array{titulo:string,texto:string,cta_texto:string,cta_link:string,imagem:string,itens:array<array{icone:string,titulo:string,texto:string}>} $args
     */
    $args = $this->get_post_metas_values('quem_somos');
    if (empty($args['itens'])) $args['itens'] = [];
    if (!is_array($args['itens'])) $args['itens'] = [$args['itens']];

    $args['cta_link'] = get_permalink($args['cta_link']);

    return $this->html('frontend/views/pages/home/section-quem-somos-home.php', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new MS_Home(), 'setup']);
