<?php

/**
 * Declaração das Classes
 * @author Alpina
 * @package Alpina V4
 * @version 4.0
 */

if (!function_exists('is_plugin_active')) {
  require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

########## BASE ####################

#BASE/SETUP
require_once get_template_directory() . "/backend/base/setup/Alp_Scripts.php";
require_once get_template_directory() . "/backend/base/setup/Alp_Setup.php";
require_once get_template_directory() . "/backend/base/setup/Alp_Settings.php";
require_once get_template_directory() . "/backend/base/setup/Alp_Settings_Pages.php";
require_once get_template_directory() . "/backend/base/setup/Alp_User.php";

#BASE/UTILS
require_once get_template_directory() . "/backend/base/utils/cores.php";
require_once get_template_directory() . "/backend/base/utils/debug.php";
require_once get_template_directory() . "/backend/base/utils/media.php";
require_once get_template_directory() . "/backend/base/utils/misc.php";
require_once get_template_directory() . "/backend/base/utils/telefone.php";

#BASE/TRAITS
require_once get_template_directory() . "/backend/base/traits/Alp_Metabox_Fields.php";
require_once get_template_directory() . "/backend/base/traits/Alp_Metabox_Specifics.php";
require_once get_template_directory() . "/backend/base/traits/Alp_Renderable.php";
require_once get_template_directory() . "/backend/base/traits/Alp_Entitable.php";
require_once get_template_directory() . "/backend/base/traits/Alp_Banners_Home.php";

#BASE/INTERFACES
require_once get_template_directory() . "/backend/base/interfaces/IAlp_Produto.php";

#BASE/HELPERS
require_once get_template_directory() . "/backend/base/helpers/Alp_Metabox_AutoImage.php";

#BASE/FACTORIES
require_once get_template_directory() . "/backend/base/factories/Alp_Entity.php";
require_once get_template_directory() . "/backend/base/factories/Alp_Metabox.php";
require_once get_template_directory() . "/backend/base/factories/Alp_Page_Template.php";
require_once get_template_directory() . "/backend/base/factories/Alp_Page.php";

#BASE/ENTITIES
require_once get_template_directory() . "/backend/base/entities/Alp_Banner.php";
require_once get_template_directory() . "/backend/base/entities/Alp_Blog.php";
require_once get_template_directory() . "/backend/base/entities/Alp_FAQ.php";
require_once get_template_directory() . "/backend/base/entities/Alp_Tutorial.php";
require_once get_template_directory() . "/backend/project/entities/MS_Timeline.php";
require_once get_template_directory() . "/backend/project/entities/MS_Obras_Entregues.php";

#BASE/API
require_once get_template_directory() . "/backend/base/api/Alp_API.php";
require_once get_template_directory() . "/backend/base/api/Alp_IBGE.php";

// #BASE/ECOMMERCE
if (is_plugin_active('woocommerce/woocommerce.php')) {
  require_once get_template_directory() . "/backend/base/ecommerce/Alp_Filtros.php";
  require_once get_template_directory() . "/backend/base/ecommerce/Alp_Loja.php";
  require_once get_template_directory() . "/backend/base/ecommerce/Alp_Parcelas.php";
  require_once get_template_directory() . "/backend/base/ecommerce/Alp_Produto.php";
  require_once get_template_directory() . "/backend/base/ecommerce/Alp_Produtos_Favoritos.php";
}

#BASE/VIEWS
require_once get_template_directory() . "/backend/base/views/Alp_Breadcrumbs.php";
require_once get_template_directory() . "/backend/base/views/Alp_Menus.php";
require_once get_template_directory() . "/backend/base/views/Alp_Paginacao.php";

#BASE/WALKERS
require_once get_template_directory() . "/backend/base/walkers/Alp_Walker_Flexi.php";
require_once get_template_directory() . "/backend/base/walkers/Alp_Walker_Linear.php";
require_once get_template_directory() . "/backend/base/walkers/Alp_Walker_Mega.php";
require_once get_template_directory() . "/backend/base/walkers/Alp_Walker_Megamenu.php";

########## PROJECT ####################

#TRAITS
require_once get_template_directory() . "/backend/project/traits/MS_Banner_Topo.php";
require_once get_template_directory() . "/backend/project/traits/MS_Section_FAQ.php";
require_once get_template_directory() . "/backend/project/traits/MS_Apresentacao.php";
require_once get_template_directory() . "/backend/project/traits/MS_Carrossel.php";
require_once get_template_directory() . "/backend/project/traits/MS_Etapas_Projeto.php";
require_once get_template_directory() . "/backend/project/traits/MS_Section_Projetos.php";

#ENTITIES
require_once get_template_directory() . "/backend/project/entities/MS_Parceiro.php";
require_once get_template_directory() . "/backend/project/entities/MS_Depoimento.php";

#VIEWS
require_once get_template_directory() . "/backend/project/views/MS_Header.php";
require_once get_template_directory() . "/backend/project/views/MS_Footer.php";
require_once get_template_directory() . "/backend/project/views/MS_Avulsos.php";
require_once get_template_directory() . "/backend/project/views/singles/MS_Post.php";

require_once get_template_directory() . "/backend/project/views/pages/MS_Projetos.php";
require_once get_template_directory() . "/backend/project/views/pages/MS_Home.php";
require_once get_template_directory() . "/backend/project/views/pages/MS_Quem_Somos.php";
require_once get_template_directory() . "/backend/project/views/pages/MS_Blog.php";
require_once get_template_directory() . "/backend/project/views/pages/MS_Fale_Conosco.php";
require_once get_template_directory() . "/backend/project/views/pages/MS_Obras.php";
require_once get_template_directory() . "/backend/project/views/pages/MS_Servicos.php";
require_once get_template_directory() . "/backend/project/views/pages/MS_Servico.php";
