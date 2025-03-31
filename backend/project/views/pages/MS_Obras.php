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

            ->render();
    }

    public function render(): void
    {
        $avulsos = new MS_Avulsos();
        $this
            ->add_render($this->render_banner_topo())
            ->add_render($this->render_section_obras_entregues())
            ->add_render($avulsos->render_section_nossos_servicos())
            ->echo_render();
    }


    /**
     * Renderiza a seção de informações do Serviço.
     * @return string HTML renderizado.
     */
    public function render_section_obras_entregues(): string
    {
        $query = new WP_Query([
            'post_type' => 'obras_entregues',
            'posts_per_page' => 3,
        ]);

        if (!$query->have_posts()) return '';

        $itens = [];

        while ($query->have_posts()) {
            $query->the_post();
            $itens[] = [
                'titulo' => get_the_title(get_the_ID()),
                'slogan' => get_post_meta(get_the_ID(), 'obras_entregues_slogan', true),
                'texto' => get_post_meta(get_the_ID(), 'obras_entregues_texto', true),
                'depoimento_nome' => get_post_meta(get_the_ID(), 'obras_entregues_depoimento_nome', true),
                'depoimento_texto' => get_post_meta(get_the_ID(), 'obras_entregues_depoimento_texto', true),
                'depoimento_responsavel' => get_post_meta(get_the_ID(), 'obras_entregues_depoimento_responsavel', true),
                'depoimento_imagem' => wp_get_attachment_image_url(get_post_meta(get_the_ID(), 'obras_entregues_depoimento_foto', true), ''),
        
            ];
        }
        wp_reset_postdata();

        $args = compact('itens');

        return $this->html('frontend/views/pages/obras/section-obras-entregues', $args);
    }

    /**
     * Renderiza um card de obra.
     * @param int $id ID da obra.
     * @return string HTML renderizado.
     */
    public function render_item_obras_entregues(int $id): string
    {
        $titulo = get_the_title($id);
        $slogan = get_post_meta($id, 'obras_entregues_slogan', true);
        $texto = get_post_meta($id, 'obras_entregues_texto', true);
        $depoimento_nome = get_post_meta($id, 'obras_entregues_depoimento_nome', true);
        $depoimento_texto = get_post_meta($id, 'obras_entregues_depoimento_texto', true);
        $depoimento_responsavel = get_post_meta($id, 'obras_entregues_depoimento_responsavel', true);
        $depoimento_imagem = wp_get_attachment_image_url(get_post_meta($id, 'obras_entregues_depoimento_foto', true), '');

        $args = compact('titulo', 'slogan', 'texto', 'depoimento_nome', 'depoimento_texto', 'depoimento_responsavel', 'depoimento_imagem');

        return $this->html('frontend/views/pages/obras/item-obras-entregues', $args);
    }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new MS_Obras(), 'setup']);
