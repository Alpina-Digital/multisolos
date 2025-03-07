<?php

/**
 * Reproduz uma seção de projetos em outras páginas.
 * @package Alpina V4
 * @version 4.0
 */
trait SV_Section_Projetos
{
  use Alp_Renderable;

  /**
   * Encadeia as metaboxes do banner de energia solar como investimento.
   * @param Alp_Metabox $metaboxes Objeto de metaboxes entrando.
   * @return Alp_Metabox Objeto saindo.
   */
  public function chain_metaboxes_section_projetos(Alp_Metabox $metaboxes): Alp_Metabox
  {
    return $metaboxes
      ->add_metabox_box('projetos', 'Seção de Projetos')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_heading('Categoria')
      ->add_metabox_field_tax('Categoria a ser utilizada', 'categoria', 'projeto_cat', 1)
      ->add_metabox_heading('Projetos fixos')
      ->add_metabox_field_cpt('Esquerda', 'esquerda', 'projeto', 1, 3)
      ->add_metabox_field_cpt('Central 1', 'central_1', 'projeto', 1, 3)
      ->add_metabox_field_cpt('Central 2', 'central_2', 'projeto', 1, 3)
      ->add_metabox_field_cpt('Direita', 'direita', 'projeto', 1, 3)
      ->add_metabox_content('A prioridade é do projeto fixo. Se não houver, serão exibidos projetos da categoria selecionada.');
  }

  /**
   * Renderiza a seção de Nossos Projetos.
   * @param int $video ID do vídeo.
   * @param int[] $projetos IDs dos demais projetos.
   * @return string HTML da seção.
   */
  public function render_section_nossos_projetos(): string
  {
    if (!isset($this->template) || !$this->template) return '';
    $args = $this->get_post_metas_values('projetos');

    if (!empty($args['categoria'])) {
      $posts = new WP_Query([
        'post_type' => 'projeto',
        'posts_per_page' => 4,
        'tax_query' => [
          [
            'taxonomy' => 'projeto_cat',
            'field' => 'term_id',
            'terms' => $args['categoria'],
          ],
        ],
      ]);
    } else {
      $posts = new WP_Query([
        'post_type' => 'projeto',
        'posts_per_page' => 4,
      ]);
    }

    foreach (['esquerda', 'central_1', 'central_2', 'direita'] as $local) {
      if (!empty($args[$local])) {
        $args[$local] = (int) $args[$local];
        continue;
      }

      if (!$posts->have_posts()) {
        $args[$local] = 0;
        continue;
      }

      $posts->the_post();
      $args[$local] = get_the_ID();
    }

    $card_video = $this->render_card_projeto($args["esquerda"], 'card-projeto--video');
    $cards_centro = $this->render_card_projeto($args["central_1"], 'card-projeto--central') . $this->render_card_projeto($args["central_2"], 'card-projeto--central');
    $card_ponta = $this->render_card_projeto($args["direita"], 'card-projeto--ponta');

    // $titulo = 'Nossos projetos';
    // $texto = 'Confira alguns dos projetos de infraestrutura de energia solar que já entregamos e as marcas que confiaram em nós.';

    $link_projetos = home_url('projetos');

    $args = array_merge($args, compact('card_video', 'cards_centro', 'card_ponta', 'link_projetos'));

    return $this->html('frontend/views/avulsos/section-nossos-projetos', $args);
  }

  /**
   * Renderiza um card de projeto.
   * @param int $id ID do projeto.
   * @param string $css_classes Classes CSS adicionais.
   * 
   * @return string HTML renderizado.
   */
  public function render_card_projeto(int $id, $css_classes = ''): string
  {
    $args = (new SV_Projeto($id))->get_post_metas_values();

    $args = array_merge($args, compact('css_classes'));
    return $this->html('frontend/views/cards/card-projeto', $args);
  }

  /**
   * Renderiza um card de projeto.
   * @param int $id ID do projeto.
   * @param string $css_classes Classes CSS adicionais.
   * 
   * @return string HTML renderizado.
   */
  public function render_card_projeto_v2(int $id, $css_classes = ''): string
  {
    $args = (new SV_Projeto($id))->get_post_metas_values('', ['metafields' => ['imagem' => 'img']]);

    $args = array_merge($args, compact('css_classes'));
    return $this->html('frontend/views/cards/card-projeto-v2', $args);
  }
}
