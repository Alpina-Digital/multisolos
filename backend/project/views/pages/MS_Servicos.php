<?php

/**
 * Classe responsável pela página Serviços.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Servicos extends Alp_Page
{
    use MS_Banner_Topo;

    /**
     * Faz o setup da estrutura da página no backend.
     * @hooked action 'after_setup_theme'
     */
    public function setup(): void
    {
        $this->template = new Alp_Page_Template('template-servicos.php', 'servicos');
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

            ->render();
    }

    public function render(): void
    {

        $this
            ->add_render($this->render_banner_topo())
            ->echo_render();
    }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new MS_Servicos(), 'setup']);
