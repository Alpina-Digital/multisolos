<?php

/**
 * Classe destinada a utilitários de loja em geral.
 */
class Alp_Loja
{
  protected static $carrinho;
  protected static $carrinho_itens;

  /**
   * Inicia a classe.
   */
  public static function init(): void
  {
    self::$carrinho = WC()->cart;
    if (self::$carrinho) self::$carrinho_itens = self::$carrinho->get_cart();
    else self::$carrinho_itens = false;
  }


  public static function conteudo_carrinho_lateral(): string
  {
    $ver_carrinho = self::get_url_carrinho();
    $finalizar_compra = self::get_url_checkout();

    $itens = self::conteudo_bloco_itens_carrinho_lateral();
    $objetivo_frete = self::conteudo_objetivo_frete();

    $args = compact('itens', 'ver_carrinho', 'finalizar_compra', 'objetivo_frete');

    ob_start();
    get_template_part('template-parts/base/carrinho-lateral/aside-carrinho-lateral', NULL, $args);
    return ob_get_clean();
  }

  public static function conteudo_objetivo_frete(): string
  {
    ob_start();
    get_template_part('template-parts/componente/objetivo-frete-gratis', NULL);
    return ob_get_clean();
  }

  /**
   * Carrega o conteúdo dos itens do carrinho lateral. Esse conteúdo também será carregado via AJAX.
   */
  public static function conteudo_bloco_itens_carrinho_lateral(): string
  {
    $conteudo = '';
    foreach (self::$carrinho_itens as $key => $item) {
      $conteudo .= self::conteudo_item_carrinho_lateral($key, $item);
    }

    $args = compact('conteudo');

    ob_start();
    get_template_part('template-parts/base/carrinho-lateral/block-itens-carrinho-lateral', NULL, $args);
    return ob_get_clean();
  }


  public static function conteudo_item_carrinho_lateral($key, $item): string
  {
    $produto = new Health_Produto($item['product_id']);
    if ($item['variation_id']) $produto_var = new Health_Produto($item['variation_id']);
    else $produto_var = $produto;

    $titulo = $produto_var->get_titulo();
    $subtitulo = $produto->get_selo_card();

    $preco = $produto_var->get_preco();
    $imagem = $produto_var->get_imagem_destaque('medium');
    $quantidade = $item['quantity'];

    $args = compact('titulo', 'subtitulo', 'preco', 'imagem', 'quantidade', 'key');

    ob_start();
    get_template_part('template-parts/base/carrinho-lateral/item-carrinho-lateral', NULL, $args);
    return ob_get_clean();
  }

  /**
   * Retorna os IDs dos produtos em destaque da loja.
   * @return array<int,int> Array com os IDs dos posts em destaque.
   */
  public static function get_produtos_em_destaque(): array
  {
    $tax_query = [
      [
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',
        'operator' => 'IN',
      ]
    ];

    $query = new WP_Query([
      'post_type' => 'product',
      'tax_query' => $tax_query,
      'posts_per_page' => -1,
      'fields' => 'ids',
      'orderby' => 'rand'
    ]);

    $produtos = $query->get_posts();
    if (!$produtos) return self::get_produtos_aleatorios();
    return $produtos;
  }

  /**
   * Retorna aleatoriamente produtos da loja.
   * @param int $quantidade Quantidade de produtos a retornar.
   * @param array<int|string,int> $excluir IDs dos produtos a excluir.
   * @return array<int,int> IDs dos produtos.
   */
  public static function get_produtos_aleatorios($quantidade = 10, $excluir = []): array
  {
    $tax_query = [
      [
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'     => ['exclude-from-catalog', 'exclude-from-search'],
        'operator' => 'NOT IN',
      ]
    ];

    $query = new WP_Query([
      'post_type' => 'product',
      'posts_per_page' => $quantidade,
      'fields' => 'ids',
      'orderby' => 'rand',
      'post__not_in' => $excluir,
      'tax_query' => $tax_query
    ]);
    return $query->get_posts();
  }

  /**
   * Retorna a quantidade de itens únicos no carrinho.
   * @return int Número de itens.
   */
  public static function get_quantidade_no_carrinho(): int
  {
    if (!self::$carrinho) return 0;

    $itens = self::$carrinho_itens;
    $itens = array_map(function ($item) {
      return $item['product_id'] . "_" . $item['variation_id'];
    }, $itens);

    return count(array_unique($itens));
  }

  /**
   * Retorna a quantidade de itens únicos no carrinho.
   * @return array<int,array<string,int>>|false Lista de produtos e suas quantidades no carrinho ou false se não existir.
   */
  public static function get_produtos_no_carrinho(): array
  {
    $itens = self::$carrinho_itens;
    if (!$itens) return [];
  }

  /**
   * Retorna a URL da loja.
   */
  public static function get_url_loja(): string
  {
    $link = get_permalink(wc_get_page_id('shop'));
    return esc_url($link);
  }

  /**
   * Retorna a URL do carrinho.
   */
  public static function get_url_carrinho(): string
  {
    $link = wc_get_cart_url();
    return esc_url($link);
  }

  /**
   * Retorna a URL do checkout.
   */
  public static function get_url_checkout(): string
  {
    $link = wc_get_checkout_url();
    return esc_url($link);
  }

  /**
   * Recebe a URL da página de Minha Conta.
   * @return string URL.
   */
  public static function get_url_minha_conta(): string
  {
    $id = wc_get_page_id('myaccount');

    if ($id) return get_permalink($id);
    return '';
  }

  /**
   * Verifica se a página atual é de carrinho ou checkout.
   * @return bool
   */
  public static function is_carrinho_ou_checkout($only = false): string
  {
    if ($only) {
      if (is_wc_endpoint_url('order-pay') || is_wc_endpoint_url('order-received')) return false;
    }

    return
      is_cart() ||
      is_checkout() ||
      is_wc_endpoint_url('order-pay') ||
      is_wc_endpoint_url('order-received');
  }

  public static function conteudo_header_steps(): string
  {
    if (!self::is_carrinho_ou_checkout()) return '';

    $steps = [];

    if (is_cart()) $atual = 1;
    elseif (is_wc_endpoint_url('order-received') || is_wc_endpoint_url('order-pay')) $atual = 3;
    elseif (is_checkout()) $atual = 2;
    else $atual = 0;

    for ($i = 1; $i <= 3; $i++) {
      $numero = $i;
      if ($i === $atual) $class = "step--current";
      elseif ($i < $atual) $class = "step--completed";
      else $class = "";

      $label = match ($i) {
        1 => "Carrinho",
        2 => "Pagamento",
        3 => "Confirmação",
      };

      if ($atual === 2 && $i === 1) $link = self::get_url_carrinho();
      else $link = false;

      if ($i >= $atual) $link = false;

      $separator = $i < 3;

      $steps[] = (object) compact("numero", "class", "label", "link", "separator");
    }

    $args = compact("steps");

    ob_start();
    get_template_part('template-parts/base/header/block-steps', NULL, $args);
    return ob_get_clean();
  }

  public static function ajax_carrega_barra_frete(): void
  {
    self::init();
    echo self::conteudo_objetivo_frete();
    wp_die();
  }

  public static function ajax_carrinho_lateral(): void
  {
    self::init();
    echo self::conteudo_bloco_itens_carrinho_lateral();
    wp_die();
  }

  public static function ajax_quantidade_itens_no_carrinho(): void
  {
    wp_send_json_success(['quantidade' => self::get_quantidade_no_carrinho()]);
    wp_die();
  }

  public static function ajax_remover_item_carrinho_lateral(): void
  {
    $key = $_POST['key'] ?? '';

    self::init();
    self::$carrinho->remove_cart_item($key);
    wp_send_json_success();
    wp_die();
  }

  public static function ajax_adicionar_ao_carrinho(): void
  {
    $product_id = $_POST['product_id'] ?? 0;
    $variation_id = $_POST['variation_id'] ?? 0;
    $quantity = $_POST['quantity'] ?? 1;

    self::init();

    if ($variation_id) self::$carrinho->add_to_cart($product_id, $quantity, $variation_id);
    else self::$carrinho->add_to_cart($product_id, $quantity);

    wp_send_json_success(['produto' => $product_id, 'variacao' => $variation_id, 'quantidade' => $quantity]);
    wp_die();
  }
}

add_action('wp_loaded', ['Alp_Loja', 'init']);

add_action('wp_ajax_adicionar_ao_carrinho', ['Alp_Loja', 'ajax_adicionar_ao_carrinho']);
add_action('wp_ajax_nopriv_adicionar_ao_carrinho', ['Alp_Loja', 'ajax_adicionar_ao_carrinho']);

add_action('wp_ajax_carrega_barra_frete', ['Alp_Loja', 'ajax_carrega_barra_frete']);
add_action('wp_ajax_nopriv_carrega_barra_frete', ['Alp_Loja', 'ajax_carrega_barra_frete']);

add_action('wp_ajax_carrinho_lateral_conteudo', ['Alp_Loja', 'ajax_carrinho_lateral']);
add_action('wp_ajax_nopriv_carrinho_lateral_conteudo', ['Alp_Loja', 'ajax_carrinho_lateral']);

add_action('wp_ajax_quantidade_itens_no_carrinho', ['Alp_Loja', 'ajax_quantidade_itens_no_carrinho']);
add_action('wp_ajax_nopriv_quantidade_itens_no_carrinho', ['Alp_Loja', 'ajax_quantidade_itens_no_carrinho']);

add_action('wp_ajax_remover_item_carrinho_lateral', ['Alp_Loja', 'ajax_remover_item_carrinho_lateral']);
add_action('wp_ajax_nopriv_remover_item_carrinho_lateral', ['Alp_Loja', 'ajax_remover_item_carrinho_lateral']);
