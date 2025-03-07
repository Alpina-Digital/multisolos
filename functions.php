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
require_once get_template_directory() . "/backend/project/traits/SV_Banner_Topo.php";
require_once get_template_directory() . "/backend/project/traits/SV_Grid_Cards_Cinza.php";
require_once get_template_directory() . "/backend/project/traits/SV_Apresentacao.php";
require_once get_template_directory() . "/backend/project/traits/SV_Banner_Energia_Investimento.php";
require_once get_template_directory() . "/backend/project/traits/SV_Section_FAQ.php";
require_once get_template_directory() . "/backend/project/traits/SV_Tres_Passos.php";
require_once get_template_directory() . "/backend/project/traits/SV_Card_Azul_Solucao.php";
require_once get_template_directory() . "/backend/project/traits/SV_Etapas_Projeto.php";
require_once get_template_directory() . "/backend/project/traits/SV_Subsecoes_Multiplos_Accordions.php";
require_once get_template_directory() . "/backend/project/traits/SV_Section_Projetos.php";

#ENTITIES
require_once get_template_directory() . "/backend/project/entities/SV_Parceiro.php";
require_once get_template_directory() . "/backend/project/entities/SV_Associacao.php";
require_once get_template_directory() . "/backend/project/entities/SV_Reconhecimento.php";
require_once get_template_directory() . "/backend/project/entities/SV_Projeto.php";
require_once get_template_directory() . "/backend/project/entities/SV_Depoimento.php";
require_once get_template_directory() . "/backend/project/entities/SV_Material.php";

#VIEWS
require_once get_template_directory() . "/backend/project/views/SV_Header.php";
require_once get_template_directory() . "/backend/project/views/SV_Footer.php";
require_once get_template_directory() . "/backend/project/views/SV_Avulsos.php";
require_once get_template_directory() . "/backend/project/views/singles/SV_Post.php";

require_once get_template_directory() . "/backend/project/views/pages/SV_Home.php";
require_once get_template_directory() . "/backend/project/views/pages/SV_Como_Funciona.php";
require_once get_template_directory() . "/backend/project/views/pages/SV_Quem_Somos.php";
require_once get_template_directory() . "/backend/project/views/pages/SV_FAQ.php";
require_once get_template_directory() . "/backend/project/views/pages/SV_Projetos.php";
require_once get_template_directory() . "/backend/project/views/pages/SV_Blog.php";
require_once get_template_directory() . "/backend/project/views/pages/SV_Materiais.php";
require_once get_template_directory() . "/backend/project/views/pages/SV_Simulador.php";
require_once get_template_directory() . "/backend/project/views/pages/SV_Resultados_Simulador.php";
require_once get_template_directory() . "/backend/project/views/pages/SV_Orcamento.php";
require_once get_template_directory() . "/backend/project/views/pages/SV_Contato.php";

require_once get_template_directory() . "/backend/project/views/pages/solucoes/SV_Solucoes.php";
require_once get_template_directory() . "/backend/project/views/pages/solucoes/SV_Solucoes_Residencias.php";
require_once get_template_directory() . "/backend/project/views/pages/solucoes/SV_Solucoes_Agronegocio.php";
require_once get_template_directory() . "/backend/project/views/pages/solucoes/SV_Solucoes_Empresas.php";
require_once get_template_directory() . "/backend/project/views/pages/solucoes/SV_Solucoes_Autoproducao.php";
require_once get_template_directory() . "/backend/project/views/pages/solucoes/SV_Solucoes_Mobilidade.php";
require_once get_template_directory() . "/backend/project/views/pages/solucoes/SV_Solucoes_Operacao_Manutencao.php";
require_once get_template_directory() . "/backend/project/views/pages/solucoes/SV_Solucoes_Sistema_Armazenamento.php";
require_once get_template_directory() . "/backend/project/views/pages/solucoes/SV_Solucoes_GridZero.php";
require_once get_template_directory() . "/backend/project/views/pages/solucoes/SV_Solucoes_ESI.php";
require_once get_template_directory() . "/backend/project/views/pages/solucoes/SV_Solucoes_EPC.php";
require_once get_template_directory() . "/backend/project/views/pages/solucoes/SV_Solucoes_Geracao_Centralizada.php";
