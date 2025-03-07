<?php

/**
 * Classe responsável pela página de Soluções de O&M.
 * @package Alpina V4
 * @version 4.0
 */
class SV_Solucoes_Operacao_Manutencao extends Alp_Page
{
  use SV_Banner_Topo, SV_Apresentacao;

  /**
   * Faz o setup da estrutura da página no backend.
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-solucoes-operacao-e-manutencao.php', 'oem');
    $this->create_metaboxes();
  }

  /**
   * Cria as metaboxes do template.
   */
  public function create_metaboxes(): void
  {
    $this->template->create_metaboxes()
      //BANNER
      ->chain_from_callable([$this, 'chain_metaboxes_banner_topo'], logo: true)
      //APRESENTAÇÃO
      ->chain_from_callable([$this, 'chain_metaboxes_apresentacao_v2'])
      //SEÇÂO CONHEÇA
      ->add_metabox_box('conheca', 'Seção Conheça')
      ->add_metabox_field_image('Logo', 'logo', 1, 2)
      ->add_metabox_field_text('Título', 'titulo', 4)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_field_image('Ícone Lateral', 'icone', 1, 3)
      ->add_metabox_field_image('Enfeites', 'enfeites', 1, 3)
      //SEÇÂO SERVIÇOS DE O&M
      ->add_metabox_box('servicos', 'Seção Serviços de O&M')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_blank(6)
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 4)
      ->add_metabox_field_text('Link no botão', 'cta_link', 4)
      ->add_metabox_field_select_target('Onde abrir o link', 'cta_target', 4)
      //BLOCO SERVIÇOS PERSONALIZADOS DE O&M
      ->add_metabox_box('servicos_personalizados', 'Bloco Serviços Personalizados de O&M')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_group('Itens', 'itens', 'Item {#} - {titulo}')
      ->add_metabox_field_text('Título', 'titulo', 12)
      ->close_metabox_group()
      //BLOCO COMISSIONAMENTO A QUENTE
      ->add_metabox_box('comissionamento_quente', 'Bloco Comissionamento a Quente')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      //BLOCO COMISSIONAMENTO A FRIO
      ->add_metabox_box('comissionamento_frio', 'Bloco Comissionamento a Frio')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      //BLOCO SPOT
      ->add_metabox_box('spot', 'Bloco Spot')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_group('Itens', 'itens', 'Item {#} - {titulo}')
      ->add_metabox_field_text('Título', 'titulo', 12)
      ->close_metabox_group()
      //BANNER INFERIOR
      ->add_metabox_box('banner_inferior', 'Banner Inferior')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_field_image('Imagem', 'imagem', 1, 3)
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 3)
      ->add_metabox_field_text('Link no botão', 'cta_link', 3)
      ->add_metabox_field_select_target('Onde abrir o link', 'cta_target', 3)
      ->render();
  }

  /**
   * Renderiza a página.
   * @return void
   */
  public function render(): void
  {
    $avulsos = new SV_Avulsos();
    $this
      ->add_render($this->render_banner_topo())
      ->add_render($this->render_section_apresentacao_v2())
      ->add_render($avulsos->render_wrapper_branco_por_cima(
        fn() => $this->render_section_apresentacao_solve(),
        fn() => $this->render_section_servicos_solve(),
        fn() => $this->render_section_banner_solve(),
      ))
      ->echo_render();
  }

  /**
   * Renderiza a seção de apresentação da Solução.
   * @return string HTML renderizado.
   */
  public function render_section_apresentacao_solve(): string
  {
    $args = $this->get_post_metas_values('conheca', ['metafields' => ['logo' => 'svg', 'enfeites' => 'svg', 'icone' => 'svg']]);
    return $this->html('frontend/views/pages/oem/section-apresentacao-solve.php', $args);
  }

  /**
   * Renderiza a seção de serviços da Solução.
   * @return string HTML renderizado.
   */
  public function render_section_servicos_solve(): string
  {
    $args = $this->get_post_metas_values('servicos');

    $personalizados = $this->render_block_servico('servicos_personalizados');
    $comissionamentos = $this->render_block_servico('comissionamento_quente');
    $comissionamentos .= $this->render_block_servico('comissionamento_frio');
    $spot = $this->render_block_servico('spot');

    $args = array_merge($args, compact('personalizados', 'comissionamentos', 'spot'));

    return $this->html('frontend/views/pages/oem/section-servicos-solve.php', $args);
  }

  /**
   * Renderiza um bloco de serviço.
   * @param mixed $id ID do bloco para metaboxes.
   * @return string HTML renderizado.
   */
  public function render_block_servico($id): string
  {
    $args = $this->get_post_metas_values($id);

    $args['class'] = match ($id) {
      'servicos_personalizados' => 'block-servico-solve--personalizados',
      'comissionamento_quente' => 'block-servico-solve--quente',
      'comissionamento_frio' => 'block-servico-solve--frio',
      'spot' => 'block-servico-solve--spot',
      default => ''
    };

    if (empty($args['itens'])) $args['itens'] = [];

    return $this->html('frontend/views/pages/oem/block-servico-solve.php', $args);
  }

  /**
   * Renderiza o banner inferior da Solução.
   * @return string HTML renderizado.
   */
  public function render_section_banner_solve(): string
  {
    $args = $this->get_post_metas_values('banner_inferior', ['metafields' => ['imagem' => 'src']]);
    return $this->html('frontend/views/pages/oem/section-banner-solve.php', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new SV_Solucoes_Operacao_Manutencao(), 'setup']);
