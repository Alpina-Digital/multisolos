<?php

/**
 * Classe responsável por partes avulsas do site.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Avulsos
{
  use Alp_Renderable;

  /**
   * Renderiza um wrapper branco por cima das outras seções da página.
   * @param callable ...$renders Funções de renderização das seções.
   * @return string HTML renderizado.
   */
  public function render_wrapper_branco_por_cima(callable ...$renders): string
  {
    return $this->render_wrapper_por_cima('branco', ...$renders);
  }

  /**
   * Renderiza um wrapper cinza por cima das outras seções da página.
   * @param callable ...$renders Funções de renderização das seções.
   * @return string HTML renderizado.
   */
  public function render_wrapper_cinza_por_cima(callable ...$renders): string
  {
    return $this->render_wrapper_por_cima('cinza', ...$renders);
  }

  /**
   * Renderiza um wrapper por cima das outras seções da página.
   * @param string $cor Cor do wrapper.
   * @param callable ...$renders Funções de renderização das seções.
   * @return string HTML renderizado.
   */
  private function render_wrapper_por_cima(string $cor, callable ...$renders): string
  {
    $conteudo = '';
    foreach ($renders as $render) {
      $conteudo .= $render();
    }

    $args = compact('conteudo', 'cor');

    return $this->html('frontend/views/avulsos/wrapper-por-cima', $args);
  }

  /**
   * Renderiza um card de feature.
   * @param array $card Informações do card.
   * @return string HTML do card.
   */
  public function render_card_feature(array $card, string $classes = ''): string
  {
    $args = array_merge($card, compact('classes'));
    return $this->html("frontend/views/cards/card-feature.php", $args);
  }

  /**
   * Renderiza a seção de Quem Já Confiou.
   * @return string HTML renderizado.
   */
  public function render_section_quem_ja_confiou(): string
  {
    $posts = new WP_Query([
      'post_type' => 'parceiro',
      'posts_per_page' => -1,
    ]);

    if (!$posts->have_posts()) return false;

    $itens = [];

    while ($posts->have_posts()) {
      $posts->the_post();

      $imagem = get_post_meta(get_the_ID(), 'parceiro_logo', true);
      if ($imagem) $imagem = wp_get_attachment_image($imagem, 'large', false, ['alt' =>  get_the_title()]);

      $itens[] = $imagem;
    }

    return $this->html('frontend/views/avulsos/section-quem-ja-confiou', compact('itens'));
  }


  /**
   * Renderiza a seção de informações do Serviço.
   * @return string HTML renderizado.
   */
  public function render_section_nossos_servicos($titulo_secao, $subtitulo_secao, $pages_id): string
  {
    $pages_id = array_map('intval', explode(',', $pages_id));
    $query = new WP_Query([
      'post_type'      => 'page',
      'post__in'       => $pages_id,
      'orderby'        => 'post__in',
      'posts_per_page' => 6,
    ]);

    if (!$query->have_posts()) return false;

    $cards = '';

    $indice = 0; // para adicionar o 0 (zero) na frente de cada número. exemplo: 01, 02, 03...
    while ($query->have_posts()) {
      $indice++;
      $query->the_post();
      $cards .= $this->render_card_nossos_servicos(get_the_ID(), $indice);
    }

    $swiper_class = 'nossos-servicos';
    $args = compact('cards', 'titulo_secao', 'subtitulo_secao', 'swiper_class');

    return $this->html('frontend/views/avulsos/section-nossos-servicos', $args);
  }

  /**
   * Renderiza um card de servico.
   * @param int $id ID do servico.
   * @return string HTML renderizado.
   */
  public function render_card_nossos_servicos(int $id, int $indice = 0): string
  {

    $titulo = get_the_title($id);
    $texto_card = esc_html(get_post_meta($id, 'servico_texto_card', true));
    $imagem = wp_get_attachment_image_url(get_post_meta($id, 'servico_imagem_card', true), '');
    $link = get_permalink($id);
    $indice = sprintf('%02d', $indice); //adiciona o 0 na frente do numero

    $args = compact('titulo', 'texto_card', 'imagem', 'link', 'indice');

    return $this->html('frontend/views/cards/card-servico', $args);
  }

  /**
   * Renderiza a seção de informações do Serviço.
   * @return string HTML renderizado.
   * A v1 é o estilo carrossel (a exemplo da home)
   */
  public function render_section_obras_entregues_v1(): string
  {
    $query = new WP_Query([
      'post_type' => 'obras_entregues',
      'posts_per_page' => -1,
    ]);

    if (!$query->have_posts()) return false;

    $cards = '';

    while ($query->have_posts()) {
      $query->the_post();
      $cards .= $this->render_card_obra_entregue_v1(get_the_ID());
    }

    $swiper_class = 'obras-entregues-v1';
    $args = compact('cards', 'swiper_class');

    return $this->html('frontend/views/avulsos/section-obras-entregues-v1', $args);
  }

  /**
   * Renderiza um card de obra.
   * @param int $id ID do obra.
   * @return string HTML renderizado.
   */
  public function render_card_obra_entregue_v1(int $id): string
  {

    $titulo = get_the_title($id);
    $imagem = wp_get_attachment_image_url(get_post_meta($id, 'obras_entregues_imagem_destacada', true), '');
    $link = get_permalink($id);

    $args = compact('titulo', 'imagem', 'link');

    return $this->html('frontend/views/cards/card-obra-entregue-v1', $args);
  }

  /**
   * Renderiza a seção de informações do Serviço.
   * @return string HTML renderizado.
   * A v1 é o estilo carrossel (a exemplo da home)
   */
  public function render_section_obras_entregues_v2(): string
  {
    $query = new WP_Query([
      'post_type' => 'obras_entregues',
      'posts_per_page' => -1,
    ]);

    if (!$query->have_posts()) return false;

    $cards = '';

    while ($query->have_posts()) {
      $query->the_post();
      $cards .= $this->render_card_obra_entregue_v2(get_the_ID());
    }

    $swiper_class = 'obras-entregues-v2';
    $args = compact('cards', 'swiper_class');

    return $this->html('frontend/views/avulsos/section-obras-entregues-v2', $args);
  }

  /**
   * Renderiza um card de obra.
   * @param int $id ID do obra.
   * @return string HTML renderizado.
   */
  public function render_card_obra_entregue_v2(int $id): string
  {

    $titulo = get_the_title($id);
    $imagem = wp_get_attachment_image_url(get_post_meta($id, 'obras_entregues_imagem_destacada', true), '');
    $link = get_permalink($id);
    $slogan = get_post_meta($id, 'obras_entregues_slogan', true);
    $texto = get_post_meta($id, 'obras_entregues_texto', true);
    $depoimento_texto = get_post_meta($id, 'obras_entregues_depoimento_texto', true);
    $depoimento_responsavel = get_post_meta($id, 'obras_entregues_depoimento_responsavel', true);
    $depoimento_foto = wp_get_attachment_image_url(get_post_meta($id, 'obras_entregues_depoimento_foto', true), '');
    $galeria = get_post_meta($id, 'obras_entregues_galeria');
    $swiper_class = 'obra-'.$id;

    $args = compact('titulo', 'imagem', 'link', 'slogan', 'texto', 'depoimento_texto', 'depoimento_responsavel', 'depoimento_foto', 'galeria', 'swiper_class');

    return $this->html('frontend/views/cards/card-obra-entregue-v2', $args);
  }

  /**
   * Renderiza a seção de informações do Serviço.
   * @return string HTML renderizado.
   */
  public function render_section_equipamentos(): string
  {
    $query = new WP_Query([
      'post_type' => 'equipamentos',
      'posts_per_page' => -1,
    ]);

    if (!$query->have_posts()) return false;

    $cards = '';

    while ($query->have_posts()) {
      $query->the_post();
      $cards .= $this->render_card_equipamento(get_the_ID());
    }

    $swiper_class = 'equipamentos';
    $args = compact('cards', 'swiper_class');

    return $this->html('frontend/views/avulsos/section-equipamentos', $args);
  }

  /**
   * Renderiza um card de obra.
   * @param int $id ID do obra.
   * @return string HTML renderizado.
   */
  public function render_card_equipamento(int $id): string
  {

    $titulo = get_the_title($id);
    $imagem = wp_get_attachment_image_url(get_post_meta($id, 'equipamentos_imagem_destacada', true), '');
    $texto = get_post_meta($id, 'equipamentos_texto', true);

    $args = compact('titulo', 'imagem', 'texto');

    return $this->html('frontend/views/cards/card-equipamento', $args);
  }

  /**
   * @param bool $white
   * @param string $class
   * 
   * @return string
   */
  public function render_section_depoimentos($white = false, $class = ''): string
  {
    $depoimentos = new WP_Query([
      'post_type' => 'depoimento',
      'posts_per_page' => -1,
    ]);

    if (!$depoimentos->have_posts()) return '';

    $args['cards'] = '';

    while ($depoimentos->have_posts()) {
      $depoimentos->the_post();
      $args['cards'] .= $this->render_card_depoimento(get_the_ID(), $white);
    }

    $args['titulo'] = 'O que dizem sobre nós';
    $args['class'] = $class;
    $args['swiper_class'] = 'depoimentos';
    $args['white'] = $white;

    return $this->html('frontend/views/avulsos/section-depoimentos', $args);
  }

  /**
   * Renderiza um card de depoimento.
   * @param int $id ID do post.
   * @param bool $white Se o card tem fundo branco. Por padrão é cinza.
   * @return string HTML renderizado.
   */
  private function render_card_depoimento(int $id, $white = false): string
  {
    $args = (new MS_Depoimento($id))->get_post_metas_values();
    $args['class'] = $white ? 'card-depoimento--branco' : '';

    return $this->html('frontend/views/cards/card-depoimento', $args);
  }

  /**
   * Renderiza a seção de Reconhecimentos.
   * @return string HTML renderizado.
   */
  public function render_section_reconhecimentos($dark = false): string
  {
    $posts = new WP_Query([
      'post_type' => 'reconhecimento',
      'posts_per_page' => -1,
    ]);

    if (!$posts->have_posts()) return false;

    $itens = [];

    while ($posts->have_posts()) {
      $posts->the_post();

      $imagem = get_post_meta(get_the_ID(), 'reconhecimento_imagem', true);
      if ($imagem) $imagem = wp_get_attachment_image($imagem, 'full', false, ['alt' =>  get_the_title()]);

      $itens[] = (object) [
        'imagem' => $imagem,
        'texto' => get_the_title()
      ];
    }

    $args = compact('dark', 'itens');
    return $this->html('frontend/views/avulsos/section-reconhecimentos', $args);
  }

  /**
   * Renderiza a seção de serviços especializados.
   * @return string HTML renderizado.
   */
  public function render_section_servicos_especializados(): string
  {
    $args = $solucoes->get_post_metas_values('especializados', ['metafields' => ['imagem' => 'src']]);

    if (!is_array($args['cards'])) $args['cards'] = [$args['cards']];

    foreach ($args['cards'] as &$card) {
      if (!is_array($card)) continue;
      $card = $this->render_card_servico_personalizado($card);
    }

    $args['cards'] = implode('', $args['cards']);

    return $this->html('frontend/views/avulsos/section-servicos-especializados', $args);
  }

  /**
   * Renderiza um card de serviço especializado.
   * @param array $card Array com os dados do card.
   * 
   * @return string HTML renderizado.
   */
  private function render_card_servico_personalizado(array $card): string
  {
    $card['cta_link'] = get_permalink($card['cta_link']);
    return $this->html('frontend/views/cards/card-servico-especializado', $card);
  }

  /**
   * Renderiza a seção de Soluções.
   * @return string HTML renderizado.
   */
  public function render_section_solucoes($class = 'padding-top-lg padding-top-0@md padding-bottom-xl padding-bottom-xxxl@md'): string
  {
    $solucoes = new MS_Solucoes(false);

    $autoimage = [
      'metafields' => ['icone' => 'svg', 'imagem' => 'src'],
      'svg_class' => 'section-solucoes__icone flex-shrink-0',
      'svg_config' => [true, [], 'stroke']
    ];

    $args = $solucoes->get_post_metas_values('tipos', $autoimage);

    if (!is_array($args['tipos'])) $args['tipos'] = [$args['tipos']];
    $args['tipos'] = array_map(function ($tipo) {
      if (!empty($tipo['cta_link'])) $tipo['cta_link'] = get_permalink($tipo['cta_link']);
      return (object) $tipo;
    }, $args['tipos']);
    $args['class'] = $class;

    return $this->html('frontend/views/avulsos/section-solucoes', $args);
  }

  /**
   * Renderiza a seção de Blog.
   * @return string HTML renderizado.
   */
  public function render_section_blog(): string
  {
    $cards = '';

    $ultimas = Alp_Blog::get_ultimas(3);
    if (!$ultimas->have_posts()) return '';

    while ($ultimas->have_posts()) {
      $ultimas->the_post();
      $cards .= $this->render_card_blog(get_the_ID(), 'swiper-slide');
    }

    $swiper_class = 'blog-cards';

    $args = compact('cards', 'swiper_class');

    return $this->html('frontend/views/avulsos/section-blog', $args);
  }

  /**
   * Renderiza a seção de Big Numbers + Associações.
   * @return string HTML renderizado.
   */
  public function render_section_big_numbers_associacoes(): string
  {
    $sobre = new MS_Quem_Somos(false);
    $args = $sobre->get_post_metas_values('big_numbers', ['metafields' => ['icone' => 'svg']]);

    if (empty($args['itens'])) $args['itens'] = [];
    if (!is_array($args['itens'])) $args['itens'] = [$args['itens']];

    $associacoes = [];
    $query = new WP_Query([
      'post_type' => 'associacao',
      'posts_per_page' => -1,
    ]);

    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
        $meta = (new MS_Associacao(get_the_ID()))->get_post_metas_values();
        $associacoes[] = array_merge($meta, ['nome' => get_the_title()]);
      }
    }

    $args['associacoes'] = $associacoes;

    return $this->html('frontend/views/avulsos/section-big-numbers-associacoes.php', $args);
  }

  /**
   * Renderiza um card de blog.
   * @param int $id ID do post.
   * @param string $classes Classes CSS adicionais.
   * @return string HTML renderizado.
   */
  public function render_card_blog(int $id, string $classes = 'col-12 col-4@md'): string
  {
    $titulo = get_the_title($id);
    $categoria = get_the_category($id)[0]->name;
    $resumo = get_the_excerpt($id);
    $imagem = get_the_post_thumbnail_url($id);
    $link = get_the_permalink($id);

    $args = compact('titulo', 'categoria', 'resumo', 'imagem', 'link', 'classes');

    return $this->html('frontend/views/cards/card-blog', $args);
  }

  /**
   * Renderiza a seção de Newsletter.
   * @return string HTML renderizado.
   */
  public function render_section_newsletter(): string
  {
    return $this->html('frontend/views/avulsos/section-newsletter', $args = []);
  }

  /**
   * Renderiza um bloco decorativo no formato de um glow azul.
   * @param int $top Quantos pixels de distância do topo.
   * @param string $direcao Direção do glow. Pode ser 'esquerda' ou 'direita'.
   * 
   * @return string HTML renderizado.
   */
  public function render_block_glow_azul(int $top, string $direcao = 'esquerda'): string
  {
    if ($direcao !== 'esquerda' && $direcao !== 'direita') {
      $direcao = 'esquerda';
    }

    $args = compact('top', 'direcao');
    return $this->html('frontend/views/avulsos/block-glow-azul', $args);
  }

  /**
   * Não há renderização para essa classe, já que não há página em si.
   */
  public function render(): void {}
}
