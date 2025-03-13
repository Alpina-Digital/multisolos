<?php

/**
 * Classe responsável pela página de Quem Somos.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Quem_Somos extends Alp_Page
{
  use MS_Section_Projetos;

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-quem-somos.php', 'quem_somos');
    $this->create_metaboxes();
  }

  /**
   * Cria as metaboxes do template.
   */
  public function create_metaboxes(): void
  {
    $this->template->create_metaboxes()
      //BANNER
      ->add_metabox_box('banner', 'Banner no Topo')
      ->add_metabox_field_biu('Subtítulo', 'subtitulo', 3)
      ->add_metabox_field_biu('Título', 'titulo', 3)
      ->add_metabox_field_biu('Texto', 'texto', 3)
      ->add_metabox_field_image('Imagem de Fundo', 'imagem', 1, 3)
      //SEÇÃO COM DESTAQUES
      ->add_metabox_box('destaques', 'Seção de Destaques')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_group('Itens', 'itens', 'Item {#} - {titulo}')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->close_metabox_group()
      //SEÇÃO DNA
      ->add_metabox_box('dna', 'Seção DNA')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Missão', 'missao', 6)
      ->add_metabox_field_biu('Visão', 'visao', 6)
      ->add_metabox_field_biu_list('Valores', 'valores', 6)
      //SEÇÃO NOS DIFERENCIA
      ->add_metabox_box('nos_diferencia', 'Seção O que nos Diferencia')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_group('Cards', 'cards', 'Card {#} - {titulo}')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto Superior', 'texto_superior', 12)
      ->add_metabox_group('Itens', 'itens', 'Item {#} - {texto}')
      ->add_metabox_field_text('Texto', 'texto', 6)
      ->close_metabox_group()
      ->add_metabox_field_biu('Texto Inferior', 'texto_inferior', 12)
      ->close_metabox_group()
      //SEÇÃO ONDE ESTAMOS
      ->add_metabox_box('onde_estamos', 'Seção Onde Estamos')
      ->add_metabox_field_biu('Título', 'titulo', 5)
      ->add_metabox_field_biu('Texto', 'texto', 5)
      ->add_metabox_field_image('Mapa Lateral', 'imagem', 1, 2)
      //SEÇÃO DE SERVIÇOS DE PONTA
      ->add_metabox_box('servicos_ponta', 'Seção de Serviços de Ponta')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_blank(6)
      ->add_metabox_group('Itens', 'itens', 'Item {#} - {titulo}')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_image('Ícone', 'icone', 1, 6)
      ->close_metabox_group()
      //SEÇÃO DE BIG NUMBERS
      ->add_metabox_box('big_numbers', 'Seção de Big Numbers')
      ->add_metabox_group('Itens', 'itens', 'Item {#} - {numero} {legenda}')
      ->add_metabox_field_text('Parte Numérica', 'numero', 4)
      ->add_metabox_field_text('Legenda', 'legenda', 4)
      ->add_metabox_field_image('Ícone', 'icone', 1, 4)
      ->close_metabox_group()
      //SEÇÃO DE PARCEIROS
      ->add_metabox_box('parceiros', 'Seção de Parceiros')
      ->add_metabox_field_text('Título da Seção', 'titulo', 6)
      ->add_metabox_content('As logos dos parceiros devem ser cadastradas em <strong>Parceiros</strong> no menu lateral.')
      //SEÇÃO DE PROJETOS
      ->chain_from_callable([$this, 'chain_metaboxes_section_projetos'])
      //SEÇÃO DE RECONHECIMENTOS
      ->add_metabox_box('reconhecimentos', 'Seção de Reconhecimentos')
      ->add_metabox_field_text('Título da Seção', 'titulo', 6)
      ->add_metabox_content('Os reconhecimentos devem ser cadastrados em <strong>Reconhecimentos</strong> no menu lateral.')
      //SEÇÃO DE ASSOCIAÇÕES
      ->add_metabox_box('associacoes', 'Seção de Associações')
      ->add_metabox_field_text('Título da Seção', 'titulo', 6)
      ->add_metabox_content('As associações devem ser cadastrados em <strong>Associações</strong> no menu lateral.')

      ->render();
  }

  public function render(): void
  {
    $avulsos = new MS_Avulsos();

    $this->add_render($this->render_banner_topo())
      ->add_render($this->render_wrapper_nos_destacamos_dna())
      ->add_render($avulsos->render_wrapper_branco_por_cima(
        fn() => $this->render_section_nos_diferencia()
      ))
      ->add_render($this->render_wrapper_onde_estamos_servicos_ponta())
      ->add_render($avulsos->render_wrapper_branco_por_cima(
        fn() => $this->render_section_big_numbers(),
        fn() => $avulsos->render_section_quem_ja_confiou(),
        fn() => $this->render_section_nossos_projetos(),
        fn() => $avulsos->render_section_reconhecimentos()
      ))
      ->add_render($this->render_section_associacoes())
      ->add_render($avulsos->render_section_blog())
      ->add_render($avulsos->render_section_newsletter())
      // ->add_render($this->render_servicos())
      // ->add_render($this->render_big_numbers())
      // ->add_render($this->render_parceiros())
      // ->add_render($this->render_projetos())
      // ->add_render($this->render_reconhecimentos())
      ->echo_render();
  }

  use MS_Banner_Topo;

  /**
   * Renderiza o wrapper que envolve as seções Nos Destacamos e DNA.
   * @return string HTML do wrapper.
   */
  private function render_wrapper_nos_destacamos_dna(): string
  {
    $conteudo = '';
    $conteudo .= $this->render_section_nos_destacamos();
    $conteudo .= $this->render_section_dna();

    return $this->html('frontend/views/pages/quem-somos/wrapper-nos-destacamos-dna', compact('conteudo'));
  }

  /**
   * Renderiza a seção de Nos Destacamos.
   * Esta seção não deve ser renderizada diretamente, mas sim dentro do wrapper.
   * @see MS_Quem_Somos::render_wrapper_nos_destacamos_dna()
   * @return string HTML da seção.
   */
  private function render_section_nos_destacamos(): string
  {
    /**
     * @var array{titulo:string,itens:array<int,array{titulo?:string,texto?:string}>} $args Metaboxes da seção.
     */
    $args = $this->get_post_metas_values('destaques');
    $args['itens'] = array_map(fn($item) => $this->render_item_nos_destacamos($item), $args['itens']);
    $args['itens'] = implode(PHP_EOL, $args['itens']);

    return $this->html('frontend/views/pages/quem-somos/section-nos-destacamos', $args);
  }

  /**
   * Renderiza um item da seção Nos Destacamos.
   * @param array $item Array com os valores do item.
   * 
   * @return string HTML do item.
   * Deve ser renderizado dentro da seção.
   * @see MS_Quem_Somos::render_section_nos_destacamos()
   */
  private function render_item_nos_destacamos(array $item): string
  {
    return $this->html('frontend/views/pages/quem-somos/item-nos-destacamos', $item);
  }

  /**
   * Renderiza a seção de DNA.
   * Esta seção não deve ser renderizada diretamente, mas sim dentro do wrapper.
   * @see MS_Quem_Somos::render_wrapper_nos_destacamos_dna()
   * @return string HTML da seção.
   */
  private function render_section_dna(): string
  {
    /**
     * @var array{titulo:string,missao:string,visao:string,valores:string} $args Metaboxes da seção.
     */
    $args = $this->get_post_metas_values('dna');

    return $this->html('frontend/views/pages/quem-somos/section-dna', $args);
  }

  /**
   * Renderiza a seção O que nos Diferencia.
   * Esta seção deve ser envelopada no wrapper branco por cima.
   * @see MS_Avulsos::render_wrapper_branco_por_cima()
   * @return string HTML da seção.
   */
  private function render_section_nos_diferencia(): string
  {
    /**
     * @var array{titulo:string,cards:array<int,array>} $args  Metaboxes da seção.
     */
    $args = $this->get_post_metas_values('nos_diferencia');
    foreach ($args['cards'] as $key => $card) {
      $args['cards'][$key] = $this->render_card_nos_diferencia($card);
    }
    $args['cards'] = implode(PHP_EOL, $args['cards']);
    $args['swiper_class'] = 'nos-diferencia';
    return $this->html('frontend/views/pages/quem-somos/section-nos-diferencia', $args);
  }

  /**
   * Renderiza um card de Nos Diferencia.
   * @param array{titulo?:string,texto_superior?:string,texto_inferior?:string,itens?:array<int,{texto:string}>} $card Card de diferencial.
   * 
   * @return string HTML do card.
   */
  private function render_card_nos_diferencia(array $card): string
  {
    if (empty($card['itens']) || !is_array($card['itens'])) $card['itens'] = [];
    $card['itens'] = array_map(fn($item) => $item['texto'] ?? '', $card['itens']);
    return $this->html('frontend/views/cards/card-nos-diferencia', $card);
  }

  /**
   * Renderiza o wrapper que envolve as seções Onde Estamos e Serviços de Ponta a Ponta.
   * @return string HTML do wrapper.
   */
  private function render_wrapper_onde_estamos_servicos_ponta(): string
  {
    $conteudo = '';
    $conteudo .= $this->render_section_onde_estamos();
    $conteudo .= $this->render_section_servicos_ponta();
    return $this->html('frontend/views/pages/quem-somos/wrapper-onde-estamos-servicos-ponta', compact('conteudo'));
  }

  /**
   * Renderiza a seção Onde Estamos.
   * Esta seção não deve ser renderizada diretaemnte, mas sim dentro do wrapper.
   * @see MS_Quem_Somos::render_wrapper_onde_estamos_servicos_ponta()
   * @return string HTML da seção.
   */
  private function render_section_onde_estamos(): string
  {
    /**
     * @var array{titulo:string,texto:string,imagem:array} $args Metaboxes da seção.
     */
    $args = $this->get_post_metas_values('onde_estamos');
    return $this->html('frontend/views/pages/quem-somos/section-onde-estamos', $args);
  }

  /**
   * Renderiza a seção Serviços de Ponta a Ponta.
   * Esta seção não deve ser renderizada diretamente, mas sim dentro do wrapper.
   * @see MS_Quem_Somos::render_wrapper_onde_estamos_servicos_ponta()
   * @return string HTML da seção.
   */
  private function render_section_servicos_ponta(): string
  {
    /**
     * @var array{titulo:string,itens:array<int,array<int,{titulo?:string,icone?:array<int,string>}>>} $args Metaboxes da seção.
     */
    $args = $this->get_post_metas_values('servicos_ponta');
    $args['itens'] = array_map(fn($item) => (object) $item, $args['itens']);

    return $this->html('frontend/views/pages/quem-somos/section-servico-ponta', $args);
  }

  /**
   * Renderiza a seção de Big Numbers.
   * Esta seção não deve ser renderizada diretamente, mas sim dentro do wrapper.
   * @see MS_Avulsos::render_wrapper_branco_por_cima()
   * @return string HTML da seção.
   */
  private function render_section_big_numbers(): string
  {
    /**
     * @var array{itens:<int,{numero:string,legenda:string,icone:string}>} $args
     */
    $args = $this->get_post_metas_values('big_numbers');
    $args['itens'] = array_map(fn($item) => (object) $item, $args['itens']);

    return $this->html('frontend/views/pages/quem-somos/section-big-numbers', $args);
  }

  /**
   * Renderiza a seção de Associações.
   * @return string HTML da seção.
   */
  private function render_section_associacoes(): string
  {
    $itens = [];
    $query = new WP_Query([
      'post_type' => 'associacao',
      'posts_per_page' => -1,
    ]);

    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
        $associacao = new MS_Associacao(get_the_ID());
        $itens[] = array_merge($associacao->get_post_metas_values(), ['nome' => get_the_title()]);
      }
    }

    $args = compact('itens');

    return $this->html('frontend/views/pages/quem-somos/section-associacoes', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new MS_Quem_Somos(), 'setup']);
