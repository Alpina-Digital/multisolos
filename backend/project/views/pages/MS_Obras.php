<?php

/**
 * Classe responsável pela página Obras.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Obras extends Alp_Page
{
    use MS_Banner_Topo, MS_Carrossel;

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

            //SEÇÃO DE SOLUÇÕES
            ->add_metabox_box('solucoes', 'Soluções')
            ->add_metabox_field_biu('Título da Seção', 'titulo', 12)
            ->add_metabox_group('Itens', 'itens', 'Item {#} - {titulo}', 12)
            ->add_metabox_field_text('Título', 'titulo', 4)
            ->add_metabox_field_biu('Texto', 'texto', 4)
            ->add_metabox_field_biu_list('Vantagens', 'vantagens', 4)
            ->add_metabox_field_image('Galeria', 'galeria', 12)
            ->close_metabox_group()
            ->add_metabox_field_text('Texto nos Botões', 'cta_texto', 4)
            ->add_metabox_field_text('Link nos Botões', 'cta_link', 4)
            ->add_metabox_field_select_target('Onde abrir o link?', 'cta_target', 4)

            //CARROSSEL
            ->chain_from_callable([$this, 'chain_metaboxes_section_carrossel'])

            ->render();
    }

    public function render(): void
    {

        $this
            ->add_render($this->render_banner_topo())
            ->add_render($this->render_section_solucoes())
            ->add_render($this->render_section_carrossel('obras'))
            ->echo_render();
    }

    /**
     * 
     * Retorna o conteúdo da seção superior da página de Serviços
     * @return string HTML da seção.
     */
    public function render_section_solucoes(): string
    {
        $args = $this->get_post_metas_values('solucoes', ['metafields' => ['galeria' => 'img'], 'img_class' => 'card-solucao__imagem']);

        foreach ($args['itens'] as $i => &$item) {
            $item = array_merge($item, [
                'cta_texto' => $args['cta_texto'],
                'cta_link' => $args['cta_link'],
                'cta_target' => $args['cta_target'],
            ]);
            $item = $this->render_card_solucao($item, $i);
        }

        $args['itens'] = implode('', $args['itens']);

        return $this->html('frontend/views/pages/obras/section-solucoes.php', $args);
    }

    public function render_card_solucao(array $item, int $id): string
    {
        $item['id'] = $id;
        if (!key_exists('galeria', $item)) $item['galeria'] = [];
        if (!is_array($item['galeria'])) $item['galeria'] = [$item['galeria']];

        return $this->html('frontend/views/cards/card-solucao.php', $item);
    }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new MS_Obras(), 'setup']);
