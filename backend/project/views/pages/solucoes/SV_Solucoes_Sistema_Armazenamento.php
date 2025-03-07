<?php

/**
 * Classe responsável pela página de Soluções para Sistema de Armazenamento.
 * @package Alpina V4
 */
class SV_Solucoes_Sistema_Armazenamento extends Alp_Page
{
  use
    SV_Banner_Topo,
    SV_Apresentacao,
    SV_Grid_Cards_Cinza,
    SV_Tres_Passos,
    SV_Section_FAQ,
    SV_Banner_Energia_Investimento,
    SV_Card_Azul_Solucao,
    SV_Section_Projetos;

  /**
   * Estrutura das Abas da Página
   */
  private array $abas = [
    'aba_1' => [
      'name' => 'Aba 1',
      'blocks' => [
        ['type' => 'banner', 'id' => 'banner', 'name' => 'Banner'],
        ['type' => 'checks', 'id' => 'aplicacoes', 'name' => 'Bloco de Aplicações'],
        ['type' => 'accordions', 'id' => 'accordions', 'name' => 'Bloco com Accordions'],
        ['type' => 'cta', 'id' => 'block_cta', 'name' => 'Bloco com botão'],
      ],
    ],
    'aba_2' => [
      'name' => 'Aba 2',
      'blocks' => [
        ['type' => 'banner', 'id' => 'banner', 'name' => 'Banner'],
        ['type' => 'checks', 'id' => 'aplicacoes', 'name' => 'Bloco de Aplicações'],
        ['type' => 'accordions', 'id' => 'accordions', 'name' => 'Bloco com Accordions'],
        ['type' => 'cta', 'id' => 'block_cta', 'name' => 'Bloco com botão'],
      ],
    ],
    'aba_3' => [
      'name' => 'Aba 3',
      'blocks' => [
        ['type' => 'banner', 'id' => 'banner', 'name' => 'Banner'],
        ['type' => 'checks', 'id' => 'vantagens', 'name' => 'Bloco de Vantagens'],
        ['type' => 'card_azul', 'id' => 'como_funciona', 'name' => 'Bloco de Como Funciona'],
        ['type' => 'cta', 'id' => 'block_cta', 'name' => 'Bloco com botão']
      ],
    ],
    'aba_4' => [
      'name' => 'Aba 4',
      'blocks' => [
        ['type' => 'banner', 'id' => 'banner', 'name' => 'Banner'],
        ['type' => 'checks', 'id' => 'aplicacoes', 'name' => 'Bloco de Aplicações'],
        ['type' => 'accordions', 'id' => 'accordions', 'name' => 'Bloco com Accordions'],
        ['type' => 'cta', 'id' => 'block_cta', 'name' => 'Bloco com botão']
      ],
    ],
    'aba_5' => [
      'name' => 'Aba 5',
      'blocks' => [
        ['type' => 'banner', 'id' => 'banner', 'name' => 'Banner'],
        ['type' => 'checks', 'id' => 'aplicacoes', 'name' => 'Bloco de Aplicações'],
        ['type' => 'texto_lateral', 'id' => 'vantagens', 'name' => 'Bloco de Vantagens'],
        // ['type' => 'card_azul', 'id' => 'como_funciona', 'name' => 'Como Funciona'],
        // ['type' => 'texto_lateral', 'id' => 'tecnologia', 'name' => 'Bloco de Tecnologia'],
        ['type' => 'cta', 'id' => 'block_cta', 'name' => 'Bloco com botão']
      ],
    ],
  ];

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-solucoes-sistema-de-armazenamento.php', 'sistema_armazenamento');
    $this->create_metaboxes();
  }

  /**
   * Cria os metaboxes para a página.
   */
  public function create_metaboxes(): void
  {
    $this->template->create_metaboxes()

      //BANNER
      ->chain_from_callable([$this, 'chain_metaboxes_banner_topo'])
      //APRESENTAÇÃO
      ->chain_from_callable([$this, 'chain_metaboxes_apresentacao_v2'])
      //ABAS
      ->chain_from_callable([$this, 'chain_metaboxes_abas'])
      // BANNER INVESTIMENTO
      ->chain_from_callable([$this, 'chain_metaboxes_banner_energia_investimento'])
      //SEÇÂO PROJETOS
      ->chain_from_callable([$this, 'chain_metaboxes_section_projetos'])
      //BANNER PRÉ-FAQ
      ->chain_from_callable([$this, 'chain_metaboxes_banner_pre_faq'])
      //SECTION FAQ
      ->chain_from_callable([$this, 'chain_metaboxes_section_faq'], true)
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
      ->add_render($this->render_section_tabs_armazenamento())
      ->add_render($this->render_banner_energia_investimento())
      ->add_render($avulsos->render_section_big_numbers_associacoes())
      ->add_render($avulsos->render_wrapper_branco_por_cima(
        fn() => $this->render_section_nossos_projetos(),
        fn() => $avulsos->render_section_quem_ja_confiou(),
        fn() => $avulsos->render_section_depoimentos(),
        fn() => $avulsos->render_section_reconhecimentos()
      ))
      ->add_render($this->render_banner_pre_faq())
      ->add_render($this->render_section_faq_v2())
      ->add_render($avulsos->render_section_blog())
      ->add_render($avulsos->render_section_newsletter())
      ->echo_render();
  }

  /**
   * Renderiza as abas da página.
   * @return string HTML renderizado.
   */
  public function render_section_tabs_armazenamento(): string
  {
    $tabs = [];

    for ($i = 1; $i <= count($this->abas); $i++) {
      $tabs[] = strip_tags(get_post_meta(get_the_ID(), "{$this->template->prefix}_aba_{$i}_titulo", true));
    }

    $tabs_conteudo = '';

    foreach ($tabs as $i => $tab) {
      $tabs_conteudo .= $this->render_item_tab_armazenamento($i);
    }

    $args = compact('tabs', 'tabs_conteudo');

    return $this->html('frontend/views/pages/armazenamento/section-tabs-armazenamento.php', $args);
  }

  /**
   * Renderiza um item de tab da página.
   * @param int $i Índice da tab. 
   * @return string HTML renderizado.
   */
  public function render_item_tab_armazenamento(int $i): string
  {
    $tab = array_values($this->abas)[$i];
    $conteudo = '';

    $args = $this->get_post_metas_values('aba_' . $i + 1, ['metafield' => ['banner_imagem' => 'src']]);

    foreach ($tab['blocks'] as $bloco) {
      $conteudo .= call_user_func([$this, 'render_block_' . $bloco['type']], $bloco['id'], $args);
    }

    $banner_imagem = $args['banner_imagem'];

    $args = array_merge($args, compact('i', 'conteudo', 'banner_imagem'));

    return $this->html('frontend/views/pages/armazenamento/item-tab-armazenamento.php', $args);
  }

  /**
   * Renderiza um bloco da página.
   * @param string $id ID do bloco.
   * @param array $args Argumentos do bloco.
   * @return string HTML renderizado.
   */
  public function render_block_banner(string $id, array $args): string
  {
    $args = $this->remove_ids($id, $args);
    return $this->html('frontend/views/pages/armazenamento/blocks/block-banner.php', $args);
  }

  /**
   * Renderiza um bloco de checks da página.
   * @param string $id ID do bloco.
   * @param array $args Argumentos do bloco.
   * @return string HTML renderizado.
   */
  public function render_block_checks(string $id, array $args): string
  {
    $args = $this->remove_ids($id, $args);
    if (empty($args['itens'])) $args['itens'] = [];

    $args['check_icone'] = get_svg_content('icon-check-reverse.svg', 'flex-shrink-0');

    return $this->html('frontend/views/pages/armazenamento/blocks/block-checks.php', $args);
  }

  /**
   * Renderiza um bloco de accordions da página.
   * @param string $id ID do bloco.
   * @param array $args Argumentos do bloco.
   * @return string HTML renderizado.
   */
  public function render_block_accordions(string $id, array $args): string
  {
    $args = $this->remove_ids($id, $args);
    return $this->html('frontend/views/pages/armazenamento/blocks/block-accordions.php', $args);
  }


  /**
   * Renderiza um bloco de CTA da página.
   * @param string $id ID do bloco.
   * @param array $args Argumentos do bloco.
   * @return string HTML renderizado.
   */
  public function render_block_cta(string $id, array $args): string
  {
    $args = $this->remove_ids($id, $args);
    return $this->html('frontend/views/pages/armazenamento/blocks/block-cta.php', $args);
  }

  /**
   * Renderiza um bloco de card azul da página.
   * @param string $id ID do bloco.
   * @param array $args Argumentos do bloco.
   * @return string HTML renderizado.
   */
  public function render_block_card_azul(string $id, array $args): string
  {
    $args = $this->remove_ids($id, $args);
    if (empty($args['cards'])) $args['cards'] = [];

    foreach ($args['cards'] as $i => &$card) {
      $card = $this->render_card_azul($card, num: $i + 1);
    }

    $args['cards'] = implode('', $args['cards']);

    return $this->html('frontend/views/pages/armazenamento/blocks/block-card-azul.php', $args);
  }

  /**
   * Renderiza um bloco de texto lateral da página.
   * @param string $id ID do bloco.
   * @param array $args Argumentos do bloco.
   * @return string HTML renderizado.
   */
  public function render_block_texto_lateral(string $id, array $args): string
  {
    $args = $this->remove_ids($id, $args);
    return $this->html('frontend/views/pages/armazenamento/blocks/block-texto-lateral.php', $args);
  }

  /**
   * Encadeia os metaboxes para as abas da página.
   * @param Alp_Metabox $metaboxes Metaboxes entrando.
   * @return Alp_Metabox Metaboxes saindo.
   */
  public function chain_metaboxes_abas(Alp_Metabox $metaboxes): Alp_Metabox
  {
    foreach ($this->abas as $subprefix => $aba) {
      $metaboxes
        ->add_metabox_box($subprefix, $aba['name'])
        ->add_metabox_field_text('Título da Aba', 'titulo', 6);

      foreach ($aba['blocks'] as $bloco) {
        $metaboxes->chain_from_callable([$this, 'chain_metaboxes_block_' . $bloco['type']], id: $bloco['id'], heading: $bloco['name']);
      }
    }

    return $metaboxes;
  }

  /**
   * Encadeia os metaboxes para o bloco de Banner.
   * @param Alp_Metabox $metaboxes Objeto de metaboxes entrando.
   * @param string $id ID do bloco, pode ser usado como prefix.
   * @param string $heading Heading do bloco.
   * @return Alp_Metabox Objeto de metaboxes saindo.
   */
  public function chain_metaboxes_block_banner(Alp_Metabox $metaboxes, string $id, string $heading): Alp_Metabox
  {
    $metaboxes
      ->add_metabox_heading($heading)
      ->add_metabox_field_text('Subtítulo', $id . '_subtitulo', 4)
      ->add_metabox_field_image('Imagem de Fundo', $id . '_imagem', 1, 2)
      ->add_metabox_field_blank(6)
      ->add_metabox_field_biu('Título', $id . '_titulo', 6)
      ->add_metabox_field_biu('Texto', $id . '_texto', 6)
      ->add_metabox_field_text('Texto no botão', $id . '_cta_texto', 4)
      ->add_metabox_field_text('Link no botão', $id . '_cta_link', 4)
      ->add_metabox_field_select_target('Onde abrir o link', $id . '_cta_target', 4);

    return $metaboxes;
  }

  /**
   * Encadeia os metaboxes para o bloco de checks.
   * @param Alp_Metabox $metaboxes Objeto de metaboxes entrando.
   * @param string $id ID do bloco, pode ser usado como prefix.
   * @param string $heading Heading do bloco.
   * @return Alp_Metabox Objeto de metaboxes saindo.
   */
  public function chain_metaboxes_block_checks(Alp_Metabox $metaboxes, string $id, string $heading): Alp_Metabox
  {
    $metaboxes
      ->add_metabox_heading($heading)
      ->add_metabox_field_biu('Título lateral', $id . '_titulo', 6)
      ->add_metabox_group('Itens', $id . '_itens', 'Item {#} - {texto}')
      ->add_metabox_field_text('Texto', 'texto', 6)
      ->close_metabox_group();

    return $metaboxes;
  }

  /**
   * Encadeia os metaboxes para o bloco de Accordions.
   * @param Alp_Metabox $metaboxes Objeto de metaboxes entrando.
   * @param string $id ID do bloco, usado como prefix.
   * @param string $heading Heading do bloco.
   * @return Alp_Metabox Objeto de metaboxes saindo.
   */
  public function chain_metaboxes_block_accordions(Alp_Metabox $metaboxes, string $id, string $heading): Alp_Metabox
  {
    $metaboxes
      ->add_metabox_heading($heading)
      ->add_metabox_field_image('Imagem Lateral', $id . '_imagem', 1, 2)
      ->add_metabox_group('Accordions', $id . '_accordions', 'Accordion {#} - {titulo}')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->close_metabox_group();
    $metaboxes
      ->add_metabox_field_text('Botão na imagem (opcional)', $id . '_cta_texto', 4)
      ->add_metabox_field_text('Link', $id . '_cta_link', 4)
      ->add_metabox_field_select_target('Onde abrir o link?', $id . '_cta_target', 4);
    return $metaboxes;
  }

  /**
   * Encadeia os metaboxes para o bloco de CTA.
   * @param Alp_Metabox $metaboxes Objeto de metaboxes entrando.
   * @param string $id ID do bloco, usado como prefix.
   * @param string $heading Heading do bloco.
   * @return Alp_Metabox Objeto de metaboxes saindo.
   */
  public function chain_metaboxes_block_cta(Alp_Metabox $metaboxes, string $id, string $heading): Alp_Metabox
  {
    $metaboxes
      ->add_metabox_heading($heading)
      ->add_metabox_field_biu('Texto', $id . '_texto', 6)
      ->add_metabox_field_blank(6)
      ->add_metabox_field_text('Texto no Botão (CTA)', $id . '_cta_texto', 4)
      ->add_metabox_field_text('Link no Botão (CTA)', $id . '_cta_link', 4)
      ->add_metabox_field_select_target('Onde abrir o link?', $id . '_cta_target', 4);

    return $metaboxes;
  }

  /**
   * Encadeia os metaboxes para o bloco de texto lateral.
   * @param Alp_Metabox $metaboxes Objeto de metaboxes entrando.
   * @param string $id ID do bloco, usado como prefix.
   * @param string $heading Heading do bloco.
   * @return Alp_Metabox Objeto de metaboxes saindo.
   */
  public function chain_metaboxes_block_texto_lateral(Alp_Metabox $metaboxes, string $id, string $heading): Alp_Metabox
  {
    $metaboxes
      ->add_metabox_heading($heading)
      ->add_metabox_field_biu('Título', $id . '_titulo', 6)
      ->add_metabox_field_biu('Texto', $id . '_texto', 6);

    return $metaboxes;
  }

  /**
   * Encadeia os metaboxes para o bloco de card azul.
   * @param Alp_Metabox $metaboxes Objeto de metaboxes entrando.
   * @param string $id ID do bloco, usado como prefix.
   * @param string $heading Heading do bloco.
   * @return Alp_Metabox Objeto de metaboxes saindo.
   */
  public function chain_metaboxes_block_card_azul(Alp_Metabox $metaboxes, string $id, string $heading): Alp_Metabox
  {
    $metaboxes
      ->add_metabox_heading($heading)
      ->add_metabox_field_text('Subtítulo', $id . '_subtitulo', 6)
      ->add_metabox_field_biu('Título', $id . '_titulo', 6)
      ->add_metabox_group('Card', $id . '_cards', 'Card {#} - {titulo}')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->close_metabox_group();

    return $metaboxes;
  }

  /**
   * Remove os IDs dos argumentos para uma renderização mais limpa.
   * @param string $id ID do bloco.
   * @param array $args Argumentos.
   * @return array Argumentos sem ID.
   */
  private function remove_ids(string $id, array $args): array
  {
    $args = array_filter($args, function ($arg) use ($id) {
      return preg_match("%^{$id}_%", $arg);
    }, ARRAY_FILTER_USE_KEY);

    $keys = array_keys($args);
    $keys = array_map(fn($key) => preg_replace("%^{$id}_%", "", $key), $keys);

    return array_combine($keys, $args);
  }
}

add_action('after_setup_theme', [new SV_Solucoes_Sistema_Armazenamento(), 'setup']);
