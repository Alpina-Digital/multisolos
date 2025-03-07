<?php

/**
 * Classe destinada à criação de filtros para exibição na página da loja.
 * @see Alp_Produtos_Filtrados::montar_query()
 */
class Alp_Filtros
{

  private static float $mais_caro = 0.0;
  private static float $mais_barato = 0.0;

  /**
   * Adicione os filtros de ordenação que você irá utilizar.
   */
  private static array $filtros_ordenacao = [
    'nomes-asc' => 'Nome (A-Z)',
    'nomes-desc' => 'Nome (Z-A)',
    'menor-valor' => 'Preço (0-9)',
    'maior-valor' => 'Preço (9-0)',
    'mais-recentes' => 'Mais Recentes',
  ];

  /**
   * Array dos filtros que estão sendo aplicados. Será setado no init.
   */
  private static array $filtros_aplicados = [];

  /**
   * Taxonomias que serão utilizadas como filtro. Os termos dessas taxonomias serão setados automaticamente no init, não precisa declará-los aqui.
   * 
   * Adicione as taxonomias que você precisará usar aqui no mesmo formato. (Outras serão pegas dos atributos).
   * @var array<int,array{nome:string,taxonomia:string}> Onde nome é como será exibido no filtro e taxonomia é a slug da taxonomia.
   */
  private static array $filtros_taxonomias = [
    ['nome' => "Objetivos", 'taxonomia' => 'product_objetivo'],
    ['nome' => "Categorias", 'taxonomia' => 'product_cat']
  ];

  /**
   * Inicia os trabalhos da classe.
   * @return void Chama self::default_filtros_taxonomias()
   */
  public static function init()
  {
    self::default_filtros_taxonomias();
    self::set_precos_min_max();
    self::set_filtros_ordenacao();
    self::set_filtros_aplicados();
  }

  /**
   * Estabelece um array padrão com todas as taxonomias de produto.
   * 
   * Inicia com 'product_cat' e depois procura por todos os atributos de produto que estejam marcados para serem usados como filtro.
   * 
   * @param bool $hide_empty Se irá esconder termos que não tenham produtos associados a ele. Será passado adiante.
   * @return void Chama a função para estabelecer os termos de cada taxonomia.
   */
  public static function default_filtros_taxonomias($hide_empty = true): void
  {
    $taxonomias = self::$filtros_taxonomias;
    $atributos = wc_get_attribute_taxonomies();

    foreach ($atributos as $atributo) {
      $val = get_option("wc_attribute_filter-{$atributo->attribute_id}", 0);
      if (!$val) continue;
      $taxonomias[] = ['nome' => $atributo->attribute_label, 'taxonomia' => "pa_{$atributo->attribute_name}"];
    }

    self::set_filtros_terms($taxonomias, $hide_empty);
  }

  /**
   * Retorna os filtros para as taxonomias.
   * @return array Filtros.
   */
  public static function get_filtros_taxonomias(): array
  {
    return self::$filtros_taxonomias;
  }

  /**
   * Reorganiza os filtros de ordenação para usar com o seletor.
   */
  private static function set_filtros_ordenacao(): void
  {
    $filtros = [];

    if (!empty($_REQUEST['ordenar'])) $selecionado = $_REQUEST['ordenar'];
    else $selecionado = 'mais-recentes';

    foreach (self::$filtros_ordenacao as $key => $texto) {
      $filtro = new stdClass();
      $filtro->texto = $texto;
      $filtro->value = $key;
      $filtro->selected = $selecionado === $key ? 'selected' : '';

      $filtros[] = $filtro;
    }

    self::$filtros_ordenacao = $filtros;
  }

  /**
   * Retorna os filtros para ordenação.
   * @return array Filtros.
   */
  public static function get_filtros_ordenacao(): array
  {
    return self::$filtros_ordenacao;
  }

  /**
   * Reorganiza os filtros de ordenação para usar com o seletor.
   */
  private static function set_filtros_aplicados(): void
  {
    $filtros = [];

    foreach ($_REQUEST as $key => $valor) {
      $taxonomia = get_taxonomy($key);
      if (!$taxonomia && $key !== 'pesquisar') continue;

      if (!is_array($valor)) {
        $filtros[] = ['param' => $key, 'valor' => $valor];
        continue;
      }

      foreach ($valor as $termo) {
        $filtros[] = ['param' => $key, 'valor' => $termo];
      }
    }

    usort($filtros, function ($a, $b) {
      if ($a['param'] === 'pesquisar') return -1;
      if ($b['param'] === 'pesquisar') return 1;
      return preg_replace("%^(product_|pa_)%", "", $a['param']) <=> preg_replace("%^(product_|pa_)%", "", $b['param']);
    });
    self::$filtros_aplicados = $filtros;
  }

  /**
   * Retorna os filtros que estão aplicados.
   * @return array Filtros.
   */
  public static function get_filtros_aplicados(): array
  {
    return self::$filtros_aplicados;
  }

  /**
   * Setter para a propriedade self::$filtros_taxonomias.
   * @param array $taxonomias Array com as taxonomias organizado previamente.
   * @param bool $hide_empty Se true, remove taxonomias que não possuam nenhum termo com produtos cadastrados.
   * @return void A função atribui self::$filtros_taxonomias com o array organizado.
   */
  public static function set_filtros_taxonomias($taxonomias = [], $hide_empty = true)
  {

    if ($hide_empty) $taxonomias = array_filter($taxonomias, function ($tax) {
      return count($tax['termos']);
    });

    self::$filtros_taxonomias = $taxonomias;
  }

  /**
   * Retorna o preço do produto mais barato da loja.
   * @return float Preço do produto. Arredondado para baixo se round for true.
   */
  public static function get_mais_barato($round = true): float
  {
    $valor = self::$mais_barato;
    if (!$round) return $valor;
    return floor($valor);
  }

  /**
   * Retorna o preço do produto mais caro da loja.
   * @return float Preço do produto. Arredondado para cima se round for true.
   */
  public static function get_mais_caro($round = true): float
  {
    $valor = self::$mais_caro;
    if (!$round) return $valor;
    return ceil($valor);
  }

  /**
   * Cria uma key ['termos'] dentro de cada índice do array de taxonomias para colocar os termos de cada taxonomia.
   * @param array $taxonomias Array com as taxonomias organizado previamente.
   * @param bool $hide_empty Se true, remove termos que não possuam produtos cadastrados.
   * 
   * Essa função também excluirá a categoria 'uncategorized' caso a taxonomia seja 'product_cat'.
   * 
   * @return void A função chama self::set_filtros_taxonomias para recadastrar as taxonomias, agora com seus termos.
   */
  private static function set_filtros_terms($taxonomias, $hide_empty = true)
  {
    foreach ($taxonomias as $t => $tax) {
      $terms = get_terms([
        'taxonomy'   => $tax['taxonomia'],
        'hide_empty' => $hide_empty,
        'exclude' => $tax['taxonomia'] == 'product_cat' ? get_option('default_product_cat') : ''
      ]);

      $taxonomias[$t]['termos'] = $terms;
    }

    self::set_filtros_taxonomias($taxonomias, $hide_empty);
  }

  /**
   * Descobre qual o preço do produto mais barato e do mais caro e seta nas propriedades da classe.
   */
  private static function set_precos_min_max(): void
  {
    global $wpdb;

    $query = "SELECT MIN(meta_value + 0) as min_price, MAX(meta_value + 0) as max_price FROM {$wpdb->prefix}postmeta INNER JOIN {$wpdb->prefix}posts ON {$wpdb->prefix}postmeta.post_id = {$wpdb->prefix}posts.ID WHERE {$wpdb->prefix}posts.post_type = 'product' AND {$wpdb->prefix}posts.post_status = 'publish' AND {$wpdb->prefix}postmeta.meta_key = '_price'";

    $row = $wpdb->get_row($query);
    self::$mais_barato = empty($row->min_price) ? 0 : $row->min_price;
    self::$mais_caro = empty($row->max_price) ? 0 : $row->max_price;
  }

  /**
   * Adiciona campo de marcar como filtro na tela de adição de atributos de produto. 
   * @hooked action 'woocommerce_after_add_attribute_fields'
   * @return void
   */
  function pa_adicionar_como_filtro(): void
  {
?>
    <div class="form-field">
      <label for="attribute_filter"><input name="attribute_filter" id="attribute_filter" type="checkbox"> Ativar como filtro?</label>
      <p class="description">Ative isto se você quiser que este atributo seja usado como filtro em sua loja.</p>
    </div>
  <?php
  }

  /**
   * Adiciona campo de marcar como filtro na tela de edição de atributos de produto.
   * @hooked action 'woocommerce_after_edit_attribute_fields'
   * @return void
   */
  function pa_editar_como_filtro(): void
  {
    $id = isset($_GET['edit']) ? absint($_GET['edit']) : 0;
    $value = $id ? intval(get_option("wc_attribute_filter-{$id}")) : 0;
  ?>
    <tr class="form-field form-required">
      <th scope="row" valign="top">
        <label for="attribute_filter"> Ativar como filtro?</label>
      </th>
      <td>
        <input name="attribute_filter" id="attribute_filter" type="checkbox" <?= $value ? 'checked' : ''; ?>>
        <p class="description">Ative isto se você quiser que este atributo seja usado como filtro em sua loja.</p>
      </td>
    </tr>
<?php
  }

  /**
   * Salva a opção de usar o atributo como filtro.
   * @param int $id ID do termo.
   * @hooked action 'woocommerce_attribute_added'
   * @hooked action 'woocommerce_attribute_updated'
   * @return void
   */
  function pa_salvar_como_filtro(int $id): void
  {
    if (!is_admin() && $_GET['post_type'] !== 'product' && $_GET['page'] !== 'product_attributes') return;

    if (isset($_POST['attribute_filter'])) {
      update_option("wc_attribute_filter-{$id}", 1);
    } else {
      update_option("wc_attribute_filter-{$id}", 0);
    }
  }

  /**
   * Quando o atributo é deletado, apaga a opção do DB.
   * @param int $id
   * @hooked action 'woocommerce_attribute_deleted'
   * @return void
   */
  public static function deletar_como_filtro(int $id): void
  {
    delete_option("wc_attribute_filter-{$id}");
  }
}

/**
 * Amarra a execução do init de Alp_Filtros apenas para o init quando as taxonomias já estão carregadas.
 */
add_action('init', ['Alp_Filtros', 'init']);

add_action('woocommerce_after_add_attribute_fields', 'pa_adicionar_como_filtro');
add_action('woocommerce_after_edit_attribute_fields', 'pa_editar_como_filtro');
add_action('woocommerce_attribute_added', 'pa_salvar_como_filtro');
add_action('woocommerce_attribute_updated', 'pa_salvar_como_filtro');

add_action('woocommerce_attribute_deleted', 'deletar_como_filtro');
