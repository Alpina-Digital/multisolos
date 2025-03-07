<?php

/**
 * Classe destinada à exibição de produtos após a aplicação de filtros.
 * @see Alp_Produtos_Filtrados::montar_query()
 */
class Alp_Produtos_Filtrados
{
  private static $args = [];

  /**
   * Função que retorna o WP_Query montado. Reorganize os passos tal qual for necessário para este E-Commerce.
   * @return \WP_Query WP_Query pronto para usar.
   */
  public static function montar_query(): WP_Query
  {
    self::query_defaults();
    self::pesquisa();
    self::paginacao(12);
    self::ordenacao('mais-recentes');
    self::produtos_com_desconto();
    self::produtos_favoritos();
    self::filtrar_taxonomias();
    self::visibilidade();
    self::range_precos();

    self::$args = apply_filters('alp_produtos_filtrados', self::$args);

    $wp_query = new WP_Query(self::$args);

    return $wp_query;
  }

  /**
   * Seta os argumentos iniciais para a query dos produtos filtrados.
   * @return void Atribui as chaves a self::$args.
   */
  protected static function query_defaults(): void
  {
    self::$args = array(
      'post_type' => 'product',
      'status' => 'publish',
      'orderby'  => 'menu_order',
      'order'    => 'ASC',
      'nopaging' => false,
    );
  }

  /**
   * Resolve os argumentos de paginação: Número da página e produtos por página.
   * @param $post_per_page Opcional, passa o número de produtos por página.
   * @return void Atribui as keys ['paged'] e ['posts_per_page'] a self::$args.
   */
  protected static function paginacao($posts_per_page = 12): void
  {
    $paged = isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1;
    $posts_per_page = isset($_REQUEST['posts_per_page']) ? $_REQUEST['posts_per_page'] : $posts_per_page;

    $args = [
      'paged' => $paged,
      'posts_per_page' => $posts_per_page
    ];

    self::merge_args($args);
  }

  /**
   * Resolve os argumentos de ordenação: orderby, order (e meta_key se for necessário).
   * As opções padrões do select são 'menor-valor', 'maior-valor', 'mais-recentes', 'mais-vendidos' ou em branco para não ordenar. Ajuste de acordo com seu projeto.
   * @return void Atribui as keys a self::$args.
   */
  protected static function ordenacao($default = ''): void
  {
    $valor_atual = $_REQUEST['ordenar'] ?? $default;
    $ordenacao = [];

    if ($valor_atual === 'menor-valor') {
      $ordenacao = [
        'orderby' => 'meta_value_num',
        'meta_key' => '_price',
        'order' => 'ASC',
      ];
    } elseif ($valor_atual === 'maior-valor') {
      $ordenacao = [
        'orderby' => 'meta_value_num',
        'meta_key' => '_price',
        'order' => 'DESC',
      ];
    } elseif ($valor_atual == 'mais-recentes') {
      $ordenacao = [
        'orderby' => 'date',
        'order' => 'DESC',
      ];
      $args['orderby'] = '';
      $args['order'] = '';
    } elseif ($valor_atual == 'mais-vendidos') {
      $ordenacao = [
        'orderby' => 'meta_value_num',
        'meta_key' => 'total_sales',
        'order' => 'DESC',
      ];
    } elseif ($valor_atual == 'nomes-asc') {
      $ordenacao = [
        'orderby' => 'title',
        'order' => 'ASC',
      ];
    } elseif ($valor_atual == 'nomes-desc') {
      $ordenacao = [
        'orderby' => 'title',
        'order' => 'DESC',
      ];
    }

    self::merge_args($ordenacao);
  }

  /**
   * Resolve o argumento de pesquisa.
   * @return void Atribui a keys ['s'] a self::$args.
   */
  protected static function pesquisa(): void
  {
    if (!isset($_REQUEST['s']) && !isset($_REQUEST['pesquisar'])) return;

    if (isset($_REQUEST['s'])) $pesquisa = ['s' => $_REQUEST['s']];
    else $pesquisa = ['s' => $_REQUEST['pesquisar']];

    self::merge_args($pesquisa);
  }

  /**
   * Filtra os produtos de acordo com os termos de taxonomias que eles pertencem.
   * @return void Atribui uma key ['tax_query'] a self::$args.
   */
  protected static function filtrar_taxonomias(): void
  {
    $tax_query = ['relation' => "AND"];
    $taxonomias = get_taxonomies();

    foreach ($taxonomias as $tax) {
      if (!isset($_REQUEST[$tax])) continue;

      $termos = $_REQUEST[$tax];

      $tax_query[] = [
        'taxonomy' => $tax,
        'field' => 'slug',
        'terms' => $termos
      ];
    }

    self::merge_meta_or_tax_query($tax_query, 'tax');
  }

  protected static function arquivo_tax(): void
  {
    $tax_query = ['relation' => "AND"];
    $queried = get_queried_object();

    $tax_query[] = [
      'taxonomy' => $queried->taxonomy,
      'field' => 'slug',
      'terms' => $queried->slug
    ];

    self::merge_meta_or_tax_query($tax_query, 'tax');
  }

  /**
   * Filtrar por preço mínimo e preço máximo.
   * @return void  Atribui uma key ['meta_query'] a self::$args.
   */
  protected static function range_precos(): void
  {
    $meta_query = ['relation' => "AND"];
    $min_valor = isset($_REQUEST['valor-minimo']) ? $_REQUEST['valor-minimo'] : NULL;
    $max_valor = isset($_REQUEST['valor-maximo']) ? $_REQUEST['valor-maximo'] : NULL;

    if (!$min_valor && !$max_valor) return;

    if ($min_valor && $max_valor) {
      $compare = 'BETWEEN';
      $value = [$min_valor, $max_valor];
    } elseif ($min_valor) {
      $compare = '>=';
      $value = $min_valor;
    } else {
      $compare = '<=';
      $value = $max_valor;
    }

    $meta_query[] = [
      'key'     => '_price',
      'value'   => $value,
      'compare' => $compare,
      'type'    => 'NUMERIC'
    ];

    self::merge_meta_or_tax_query($meta_query, 'meta');
  }

  /**
   * Mostra todos os produtos que não estiverem marcados como ocultos para exibição no catálogo
   */
  protected static function visibilidade(): void
  {
    $tax_query[] = [
      'taxonomy'  => 'product_visibility',
      'terms'     => ['exclude-from-catalog', 'exclude-from-search'],
      'field'     => 'slug',
      'operator'  => 'NOT IN',
    ];

    self::merge_meta_or_tax_query($tax_query, 'tax');
  }

  /**
   * Pega somente os IDs de produtos que estejam com desconto e usa para o post__in.
   * Caso já exista a key de post__in em $args, filtra desses IDs quais são os de produtos com desconto.
   * @return void Atribui a self::$args a key ['post__in'].
   */
  protected static function produtos_com_desconto(): void
  {
    if (!isset($_REQUEST['desconto'])) return;

    $descontos = wc_get_product_ids_on_sale();
    $post_in = isset(self::$args['post__in']) ? self::$args['post__in'] : NULL;

    if ($post_in) {
      $descontos = array_filter($descontos, function ($desconto) use ($post_in) {
        return in_array($desconto, $post_in);
      });
    }

    if (empty($descontos)) $descontos = [0];

    self::merge_args(['post__in' => $descontos]);
  }

  /**
   * Pega somente os IDs de produtos que estejam em promoção e usa para o post__in.
   * Caso já exista a key de post__in em $args, filtra desses IDs quais são os de produtos com desconto.
   * @return void Atribui a self::$args a key ['post__in'].
   */
  protected static function produtos_favoritos(): void
  {
    if (!class_exists('Alp_Produtos_Favoritos')) return;

    if (!isset($_REQUEST['favoritos'])) return;

    $favoritos = Alp_Produtos_Favoritos::listar_favoritos();
    $post_in = isset(self::$args['post__in']) ? self::$args['post__in'] : NULL;

    if ($post_in) {
      $favoritos = array_filter($favoritos, function ($favorito) use ($post_in) {
        return in_array($favorito, $post_in);
      });
    }

    if (empty($favoritos)) $favoritos = [0];

    self::merge_args(['post__in' => $favoritos]);
  }

  /**
   * Faz o array_merge array de $args com novos argumentos e atribui a self::$args.
   * @param array $new_args O array com novos argumentos.
   * @return void Atribui a self::$args.
   */
  private static function merge_args(array $new_args): void
  {
    self::$args = array_merge(self::$args, $new_args);
  }

  /**
   * Faz o array_merge array de $args com novos argumentos e atribui a self::$args.
   * @param array $query Query correspondente a um meta_query ou tax_query.
   * @param 'meta'|'tax' $type Se a query é sobre um 'meta' ou 'tax' query.
   * @param bool $merge_args Se deve fazer já a junção com os outros args.
   * @return void Atribui a self::$args.
   */
  private static function merge_meta_or_tax_query(array $query, string $type, bool $merge_args = true): ?array
  {
    if (!in_array($type, ['meta', 'tax'])) return NULL;

    if (isset(self::$args["{$type}_query"])) {
      $query = [
        'relation' => 'AND',
        self::$args["{$type}_query"],
        $query
      ];
    }

    if (!$merge_args) return $query;
    return self::merge_args(["{$type}_query" => $query]);
  }
}
