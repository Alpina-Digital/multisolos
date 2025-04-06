<?php

/**
 * Classe responsável pela página teste.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Teste extends Alp_Page
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

            ->render();
    }

    public function render(): void
    {
        $avulsos = new MS_Avulsos();

        $this
            ->add_render($this->render_section_obras_entregues())
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

            // Recupera os IDs das imagens da galeria
            $galeria_ids = get_post_meta(get_the_ID(), 'obras_entregues_galeria', false);

            $galeria_urls = [];

            if (!empty($galeria_ids) && is_array($galeria_ids)) {
                foreach ($galeria_ids as $id) {
                    $url = wp_get_attachment_image_url($id, 'full');
                    if ($url) {
                        $galeria_urls[] = $url;
                    }
                }
            }

            $itens[] = [
                'titulo' => get_the_title(get_the_ID()),
                'slogan' => get_post_meta(get_the_ID(), 'obras_entregues_slogan', true),
                'texto' => get_post_meta(get_the_ID(), 'obras_entregues_texto', true),
                'depoimento_nome' => get_post_meta(get_the_ID(), 'obras_entregues_depoimento_nome', true),
                'depoimento_texto' => get_post_meta(get_the_ID(), 'obras_entregues_depoimento_texto', true),
                'depoimento_responsavel' => get_post_meta(get_the_ID(), 'obras_entregues_depoimento_responsavel', true),
                'depoimento_imagem' => wp_get_attachment_image_url(get_post_meta(get_the_ID(), 'obras_entregues_depoimento_foto', true), ''),
                'galeria' => $galeria_urls, // agora com as imagens da galeria corretamente
            ];
        }

        wp_reset_postdata();

        $swiper_class = 'galeria-obras-entregues';
        $args = compact('itens', 'swiper_class');

        return $this->html('frontend/views/pages/obras/section-obras-entregues', $args);
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
add_action('after_setup_theme', [new MS_Teste(), 'setup']);
