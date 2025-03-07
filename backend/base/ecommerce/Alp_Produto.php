<?php
require_once __DIR__ . "/../interfaces/IAlp_Produto.php";

/**
 * Classe destinada à exibição formatada de dados de um produto individual. Tem como base o uso de um WC_Product.
 */
class Alp_Produto implements IAlp_Produto
{
  protected string $prefix = "produto_";
  protected WC_Product|null|false $wc_product;
  protected int $produto_id;
  protected Alp_Parcelas $parcelas;
  protected string $moeda;

  /**
   * Constrói um produto baseado no ID do post.
   * @param $id ID do produto.
   */
  public function __construct(int $id)
  {
    if (!$id) return false;
    $this->produto_id = $id;

    $wc_product = wc_get_product($id);
    if (!$wc_product) return false;

    $this->wc_product = $wc_product;
    $this->moeda = get_woocommerce_currency_symbol();

    $this->parcelas = new Alp_Parcelas((float) $wc_product->get_price());
  }

  /**
   * Recebe o preço atual numa string já formatada no formato brasileiro.
   * @return string String formatada, ex: R$ 1.311,32.
   */
  public function get_preco(): string
  {
    $preco_atual = $this->get_preco_desconto_pix();
    return $this->formatar_valor($preco_atual);
  }

  /**
   * Recebe o preço atual (em float) checando se há desconto para PIX.
   * @return float Preço atual
   */
  public function get_preco_desconto_pix(): float
  {
    $preco_atual = (float) $this->wc_product->get_price();

    $descontos = unserialize(get_option('woo_payment_discounts_setting'));
    $desconto_pix = $descontos['asaas-pix'] ?? false;

    if ($desconto_pix) {
      if ($desconto_pix['type'] === 'percentage') {
        $porcentagem = 1 - ($desconto_pix['amount'] / 100);
        $preco_atual *= $porcentagem;
      } else {
        $preco_atual -= $desconto_pix['amount'];
      }
    }

    return $preco_atual;
  }

  /**
   * Recebe o preço original numa string já formatada no formato brasileiro.
   * @return string String formatada, ex: R$ 1.670,45.
   */
  public function get_preco_original(): string
  {
    if ($this->wc_product->is_type('variable')) return $this->get_menor_preco_original();

    $preco_original = (float) $this->wc_product->get_regular_price();
    return $this->formatar_valor($preco_original);
  }

  private function get_menor_preco_original(): string
  {
    $variacoes = $this->wc_product->get_available_variations();
    $mais_barato = 0;

    foreach ($variacoes as $variation) {
      $variation_obj = new WC_Product_Variation($variation['variation_id']);
      $regular_price = $variation_obj->get_regular_price();

      if (empty($mais_barato) || $regular_price < $mais_barato) {
        $mais_barato = $regular_price;
      }
    }

    return $this->formatar_valor($mais_barato);
  }

  /**
   * Recebe uma string com a porcentagem off do preço ou null se não houver desconto.
   * @return string|null Nulo ou string com valor formatado, ex: '15% off'.
   */
  public function get_desconto(): ?string
  {
    $preco_atual = $preco_atual = $this->get_preco_desconto_pix();
    $preco_original = floatval($this->wc_product->get_regular_price());

    if ($preco_atual >= $preco_original) return NULL;

    $desconto = (($preco_original - $preco_atual) / $preco_original) * 100;
    $desconto = number_format_i18n($desconto, 0);

    return "{$desconto}% off";
  }

  public function get_melhor_desconto(): ?string
  {
    if (!$this->wc_product->is_type('variable')) return $this->get_desconto();

    $variacoes = $this->wc_product->get_available_variations();
    $descontos = [];

    foreach ($variacoes as $variacao) {
      $produto = new Health_Produto($variacao['variation_id']);
      $descontos[] = $produto->get_desconto();
    }

    $descontos = array_map(function ($desconto) {
      if (!preg_match("%\d+%", $desconto)) return 0;
      return (int) preg_replace("%^.*?(\d+).*$%", "$1", $desconto);
    }, $descontos);

    $melhor_desconto = max($descontos);

    if (!$melhor_desconto) return NULL;

    return "até {$melhor_desconto}% off";
  }

  /**
   * Retorna o título de um produto.
   * Primeiro procura por um campo meta produto_titulo, se não encontrar ou estiver em branco lança o valor de get_the_title().
   * @return string Título.
   */
  public function get_titulo(): string
  {
    $titulo = get_post_meta($this->produto_id, 'produto_titulo', true);
    if ($titulo) return $titulo;
    return get_the_title($this->produto_id);
  }

  /**
   * Retorna o subtítulo de um produto.
   * O valor deve estar em um campo meta chamado produto_subtitulo.
   * @return string Subtítulo ou string vazia.
   */
  public function get_subtitulo(): string
  {
    $subtitulo = get_post_meta($this->produto_id, 'produto_subtitulo', true);
    if ($subtitulo) return $subtitulo;
    return $this->get_categoria_principal();
  }

  /**
   * Retorna o nome da categoria principal do produto como string.
   */
  public function get_categoria_principal(): string
  {
    $termos = get_the_terms($this->produto_id, 'product_cat');
    $termos = array_filter($termos, function ($termo) {
      if ($termo->term_id == get_option('default_product_cat')) return false;
      if ($termo->parent !== 0) return false;
      return true;
    });

    $requisitadas = $_REQUEST['product_cat'] ?? [];
    if (!is_array($requisitadas)) $requisitadas = [$requisitadas];

    usort($termos, function ($a, $b) use ($requisitadas) {
      if ($requisitadas) {
        if (in_array($a->slug, $requisitadas)) return -1;
        if (in_array($b->slug, $requisitadas)) return 1;
      }
      return $a->slug <=> $b->slug;
    });

    if (is_array($termos)) return reset($termos)->name ?? '';

    return '';
  }

  /**
   * Retorna o permalink para a single do produto.
   * @return string Link.
   */
  public function get_link(): string
  {
    return get_permalink($this->produto_id);
  }

  /**
   * Retorna o link de adicionar ao carrinho.
   */
  public function get_link_adicionar_carrinho(): string
  {
    return $this->wc_product->add_to_cart_url();
  }

  /**
   * Recebe a string que contém o valor do produto dividido no máximo de parcelas.
   */
  public function get_parcelas_texto(): ?string
  {
    $valor_parcela = $this->parcelas->get_menor_valor_sem_juros();
    $numero_parcelas = $this->parcelas->get_parcelas_sem_juros();

    if ($numero_parcelas < 2) return NULL;

    $valor_parcela = $this->formatar_valor($valor_parcela);

    return "ou {$valor_parcela} em {$numero_parcelas}x s/ juros";
  }

  /**
   * Recebe a descrição do produto.
   */
  public function get_descricao(): string
  {
    return $this->wc_product->get_description();
  }

  /**
   * Recebe a descrição resumida do produto.
   */
  public function get_resumo(): string
  {
    return $this->wc_product->get_short_description();
  }

  /**
   * Recebe os produtos relacionados.
   * @param bool $objeto Receber um WP_Query em vez de somente os IDs.
   * @param int $maximo Máximo de itens a receber.
   * @return array<int,int>|WP_Query Produtos relacionados.
   */
  public function get_relacionados(bool $objeto = false, int $maximo = -1): array|WP_Query
  {
    $cross = $this->wc_product->get_cross_sell_ids();
    $up = $this->wc_product->get_upsell_ids();

    $relacionados = array_merge($up, $cross);
    $relacionados = array_unique($relacionados);

    if (!count($relacionados) || count($relacionados) < $maximo) {
      $mais_relacionados = $this->get_produtos_mesma_categoria($maximo);
      $relacionados = array_merge($relacionados, $mais_relacionados);
    }

    if ($maximo > 0) $relacionados = array_slice($relacionados, 0, $maximo);

    if ($objeto) return $this->montar_query_relacionados($relacionados);
    return $relacionados;
  }

  /**
   * Recebe produtos que estejam na mesma categoria do atual.
   * @param int $maximo Quantidade máxima de produtos a receber.
   * @return array<int,int> Array com os IDs do produtos.
   */
  public function get_produtos_mesma_categoria(int $maximo = -1): array
  {
    $categorias = get_the_terms($this->produto_id, 'product_cat');
    if (!$categorias) return [];

    usort($categorias, function ($a, $b) {
      return $b->parent <=> $a->parent;
    });
    $categorias = array_map(fn ($cat) => $cat->term_id, $categorias);

    $produtos = new WP_Query([
      'post_type' => 'product',
      'fields' => 'ids',
      'post__not_in' => [$this->produto_id],
      'tax_query' => [
        [
          'taxonomy' => 'product_cat',
          'field'    => 'term_id',
          'terms'    => $categorias,
          'operator' => 'IN',
        ]
      ]
    ]);

    return $produtos->get_posts();
  }

  public function get_avaliacoes(): stdClass
  {
    $numero = $this->get_numero_avaliacoes(true);
    $numero_formatado = $this->get_numero_avaliacoes();
    $media = round($this->get_media_avaliacoes(), 1);
    $media_formatada = number_format_i18n($media, 1);
    $media_formatada = preg_replace("%,0+$%", "", $media_formatada);

    if ($numero < 1) {
      $media = 0;
      $media_formatada = 5;
    }

    return (object) compact('numero', 'numero_formatado', 'media', 'media_formatada');
  }

  /**
   * Retorna a quantidade de avaliacões.
   * @param bool $return_int Se deve retornar em inteiro ou número formatado.
   * @return int|string A quantidade em inteiro ou já formatado.
   */
  public function get_numero_avaliacoes($return_int = false): int|string
  {
    $avaliacoes = $this->wc_product->get_rating_count();
    if ($return_int) return $avaliacoes;

    switch ($avaliacoes) {
      case 0:
        return 'Sem avaliações';
      case 1:
        return 'Uma avaliação';
      default:
        return "{$avaliacoes} avaliações";
    }
  }

  /**
   * Retorna um array de valores booleanos das 5 estrelas. Se true, a estrela deve ser preenchida e se false, deve estar vazia.
   * @return array<int,bool> Array com estrelas.
   */
  public function get_estrelas_avaliacoes(): array
  {
    $media = $this->get_media_avaliacoes();
    $media = floor($media);
    $estrelas = [];
    for ($i = 0; $i < 5; $i++) {
      $estrelas[$i] = $i < $media;
    }
    return $estrelas;
  }

  /**
   * Retorna a média das avaliacões.
   * @return int|string A média das avaliações.
   */
  public function get_media_avaliacoes(): float
  {
    return $this->wc_product->get_average_rating();
  }

  /**
   * Retorna a imagem de destaque do produto.
   * @param string $tamanho Tamanho opcional da imagem.
   */
  public function get_imagem_destaque(string $tamanho = 'full'): string
  {
    $destaque = get_the_post_thumbnail_url($this->produto_id, $tamanho);
    if (!$destaque) return self::get_imagem_placeholder();
    return $destaque;
  }

  /**
   * Retorna a imagem de destaque do produto para hover.
   * @param string $tamanho Tamanho opcional da imagem.
   */
  public function get_imagem_destaque_hover(string $tamanho = 'full'): string
  {
    $destaque = get_post_meta($this->produto_id, 'produto_imagem_hover', true);
    if (!$destaque) return $this->get_imagem_galeria_ou_placeholder($tamanho);

    $destaque = wp_get_attachment_image_url($destaque, $tamanho);
    if (!$destaque) return $this->get_imagem_galeria_ou_placeholder($tamanho);

    return $destaque;
  }

  /**
   * 
   */
  private function get_imagem_galeria_ou_placeholder(string $tamanho = 'full'): string
  {
    $galeria = $this->get_galeria($tamanho, true);
    if ($galeria) return $galeria[0];
    return self::get_imagem_placeholder();
  }

  /**
   * Retorna as imagens da galeria do produto.
   * @param string $tamanho Tamanho opcional da imagem.
   * @param bool $ignorar_destaque Se a imagem de destaque deve ser ignorada. Por padrão, não será.
   */
  public function get_galeria(string $tamanho = 'large', bool $ignorar_destaque = false): array
  {
    $galeria = [];

    if (!$ignorar_destaque) {
      $destaque = get_the_post_thumbnail_url($this->produto_id, $tamanho);
      if ($destaque) $galeria[] = $destaque;
    }

    $imagens = $this->wc_product->get_gallery_image_ids();
    foreach ($imagens as $id) {
      $imagem = wp_get_attachment_image_url($id, $tamanho);
      if ($imagem) $galeria[] = $imagem;
    }

    return $galeria;
  }

  /**
   * Retorna o conteúdo de um campo meta aplicando o filtro the_content se single for verdadeiro. Ou chama uma função para lidar com valores múltiplos.
   * @param string $campo Campo meta a ser buscado.
   * @param string|null $prefixo Prefixo do campo meta, se houver. O padrão de um produto é começar com 'produto_'.
   * @param bool $single Se busca um único valor ou não.
   * @return string Conteúdo a ser impresso.
   */
  public function get_conteudo_meta(string $campo, ?string $prefixo = 'produto_', $single = true): string
  {
    if (!$single) return $this->get_conteudo_meta_multiplo($campo, $prefixo);
    $conteudo = get_post_meta($this->produto_id, $prefixo . $campo, true);
    return apply_filters('the_content', $conteudo);
  }

  /**
   * Retorna uma imagem de placeholder para casos onde não exista uma imagem.
   * @var array<int,string> $placeholder_list Coloque aqui os caminhos possíveis de placeholders.
   * @return string URL da imagem placeholder a ser utilizada (pode ser vazio).
   */
  public static function get_imagem_placeholder(): string
  {
    $placeholder_list = [
      '/assets/imgs/placeholders/placeholder.webp',
      '/assets/imgs/placeholders/placeholder.png',
      '/../../plugins/woocommerce/assets/images/placeholder.png'
    ];

    foreach ($placeholder_list as $placeholder) {
      if (file_exists(get_template_directory() . $placeholder)) return get_template_directory_uri() . $placeholder;
    }
    return '';
  }

  /**
   * Retorna as tags do produto.
   */
  public function get_tags($link = false): array
  {
    $tags = [];

    $tags_terms = wp_get_post_terms($this->produto_id, 'product_tag', [
      'orderby' => 'menu_order',
      'order' => 'ASC'
    ]);

    foreach ($tags_terms as $tag) {
      $nome = $tag->name;
      $icone = get_term_meta($tag->term_id, 'product_tag_icone', true);
      if ($icone) $icone = wp_get_attachment_url($icone);

      $tags[] = (object) compact('nome', 'icone');
    }

    return $tags;
  }

  /**
   * Retorna o objeto WC_Product
   */
  public function get_wc_product(): WC_Product
  {
    return $this->wc_product;
  }

  public  function get_id(): int
  {
    return $this->produto_id;
  }

  /**
   * Formata um valor usando uma moeda e número no formato brasileiro.
   * @param float $valor Um valor numérico.
   * @return string String formatada, ex: R$ 2.300,21.
   */
  protected function formatar_valor(float $valor): string
  {
    $valor = number_format_i18n($valor, 2);
    return $this->moeda . ' ' . $valor;
  }

  /**
   * Retorna um WP_Query para uma query de produtos relacionados.
   * @param array<int,int> $ids Array de IDs dos relacionados.
   * @return WP_Query Query com os produtos relacionados.
   */
  protected function montar_query_relacionados($ids): WP_Query
  {
    return new WP_Query([
      'post_type' => 'product',
      'posts__in' => $ids
    ]);
  }

  protected function get_conteudo_meta_multiplo(string $campo, string $prefixo = 'produto_'): string
  {
    return '';
  }
}
