<?php

/**
 * Classe responsável pela página Obras.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Obras extends Alp_Page
{
    use MS_Banner_Topo;

    /**
     * Faz o setup da estrutura da página no backend.
     * @hooked action 'after_setup_theme'
     */
    public function setup(): void
    {
        $this->template = new Alp_Page_Template('template-obras.php', 'obras');
        $this->create_metaboxes();
    }

    /**
     * Cria as metaboxes do template.
     */
    public function create_metaboxes(): void
    {
        $this->template->create_metaboxes()
            //BANNER
            ->chain_from_callable([$this, 'chain_metaboxes_banner_topo'])
            ->add_metabox_box('', 'Obras entregues')
            ->add_metabox_heading('As obras estão sendo gerenciadas pelo menu Obras entregues', '')

            //DADOS PARA O CARROSSEL DE SERVIÇOS
            ->add_metabox_box('carrossel_servicos', 'Carrossel de serviços')
            ->add_metabox_field_cpt('Selecione as páginas que aparecerão nos cards', 'pages_id_servicos', 'page', 99, 12)
            ->add_metabox_field_text('Título da seção', 'titulo_secao', 6)
            ->add_metabox_field_text('Subtitulo da seção', 'subtitulo_secao', 6)

            ->render();
    }

    public function render(): void
    {
        $avulsos = new MS_Avulsos();

        /**
         * @var $carrossel_servicos contem os parametros para o carrossel de serviços vindos da function carrossel_servicos()
         */

        $carrossel_servicos = $this->carrossel_servicos();

        $this
            ->add_render($this->render_banner_topo())
            ->add_render($avulsos->render_section_obras_entregues_v2())
            ->add_render($avulsos->render_section_nossos_servicos(
                $carrossel_servicos['titulo_secao'],
                $carrossel_servicos['subtitulo_secao'],
                $carrossel_servicos['pages_id']
            ))
            ->echo_render();
    }


    /**
     * Recupera os dados do carrosssel.
     * São passados os parametros no render_section_nossos_servicos
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
add_action('after_setup_theme', [new MS_Obras(), 'setup']);
