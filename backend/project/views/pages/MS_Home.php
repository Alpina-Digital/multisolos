<?php

/**
 * Classe responsável pela página Home.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Home extends Alp_Page
{
  use Alp_Banners_Home;

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
      //CONHEÇA
      ->add_metabox_box('conheca', 'A Multisolos')
      ->add_metabox_field_text('Título da seção', 'titulo_secao', 12)
      ->add_metabox_field_text('Subtitulo da seção', 'subtitulo_secao', 12)
      ->add_metabox_heading('Caixinha 1', '')
      ->add_metabox_field_text('Numero', 'numero_box1', 3)
      ->add_metabox_field_text('Sinal', 'sinal_box1', 2)
      ->add_metabox_field_text('Texto', 'texto_box1', 7)
      ->add_metabox_heading('Caixinha 2', '')
      ->add_metabox_field_text('Numero', 'numero_box2', 3)
      ->add_metabox_field_text('Sinal', 'sinal_box2', 2)
      ->add_metabox_field_text('Texto', 'texto_box2', 7)
      ->add_metabox_heading('Seção texto', '')
      ->add_metabox_field_biu('Título', 'secao_texto_titulo', 4)
      ->add_metabox_field_biu('Texto', 'secao_texto_texto', 8)
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 4)
      ->add_metabox_field_cpt('Selecione a Página', 'cta_link', 'page', 1, 4)

      // DADOS PARA O CARROSSEL DE SERVIÇOS
      ->add_metabox_box('carrossel_servicos', 'Carrossel de serviços')
      ->add_metabox_field_cpt('Selecione as páginas que aparecerão nos cards', 'pages_id_servicos', 'page', 99, 12)
      ->add_metabox_field_text('Título da seção', 'titulo_secao', 6)
      ->add_metabox_field_text('Subtitulo da seção', 'subtitulo_secao', 6)


      ->render();
  }

  /**
   * Renderiza toda a Home.
   * @return void
   */
  public function render(): void
  {
    $avulsos = new MS_Avulsos();

    //parametros para o carrossel de serviços
    $carrossel_servicos = $this->carrossel_servicos();


    $this
      ->add_render($this->render_section_banners())
      ->add_render($avulsos->render_section_nossos_servicos(
        $carrossel_servicos['titulo_secao'],
        $carrossel_servicos['subtitulo_secao'],
        $carrossel_servicos['pages_id']
      ))
      ->add_render($this->render_section_conheca())
      ->add_render($avulsos->render_section_obras_entregues_v1())
      ->add_render($avulsos->render_section_quem_ja_confiou())
      ->add_render($avulsos->render_section_blog())
      ->add_render($avulsos->render_section_newsletter())
      ->echo_render();
  }



  /**
   * Renderiza a seção Conheça.
   * @return string HTML da seção.
   */
  private function render_section_conheca(): string
  {

    $args = $this->get_post_metas_values('conheca');

    return $this->html('frontend/views/pages/home/section-conheca', $args);
  }

  /**
   * Recupera os dados do carrosssel.
   */
  private function carrossel_servicos(): array
  {
    $carrossel_servicos = $this->get_post_metas_values('carrossel_servicos');

    $pages_id_array = $carrossel_servicos['pages_id_servicos'] ?? [];
    $pages_id = implode(',', $pages_id_array);

    $titulo_secao = $carrossel_servicos['titulo_secao'] ?? '';
    $subtitulo_secao = $carrossel_servicos['subtitulo_secao'] ?? '';

    return [
      'titulo_secao' => $titulo_secao,
      'subtitulo_secao' => $subtitulo_secao,
      'pages_id' => $pages_id
    ];
  }
}


/**
 * Hooks
 */
add_action('after_setup_theme', [new MS_Home(), 'setup']);
