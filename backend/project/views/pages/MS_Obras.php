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
            'posts_per_page' => -1,
        ]);


        if (!$query->have_posts()) return false;

        $obras = [];

        while ($query->have_posts()) {
            $query->the_post();

            $id = get_the_ID();
            $obras[] = [
                'titulo'      => get_the_title($id),
                'slogan_obra'  => get_post_meta($id, 'obras_entregues_slogan_obra', true),
                'texto_obra'  => get_post_meta($id, 'obras_entregues_texto_obra', true),
                'nome_depoimento'  => get_post_meta($id, 'obras_entregues_nome_depoimento', true),
                'texto_depoimento'  => get_post_meta($id, 'obras_entregues_texto_depoimento', true),
                'responsavel_depoimento'  => get_post_meta($id, 'obras_entregues_responsavel_depoimento', true),
                'foto_depoimento'  => wp_get_attachment_image_url(get_post_meta($id, 'obras_entregues_foto_depoimento', true),'full'),
                // 'link'        => get_permalink($id),
            ];
        }

        $args = compact('obras');


        // if ($query->have_posts()) {
        //     while ($query->have_posts()) {
        //         $query->the_post();
        //         $meta = (new MS_Obras_Entregues(get_the_ID()))->get_post_metas_values();
        //         $obras[] = array_merge($meta, ['titulo' => get_the_title()]);
        //     }
        // }

        // $args['obras'] = $obras;


        return $this->html('frontend/views/pages/obras/section-obras-entregues', $args);
    }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new MS_Obras(), 'setup']);
