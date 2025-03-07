<?php

/**
 * Classe que calcula o valor e a quantidade de parcelas com base em um preço total e outros parâmetros personalizáveis.
 */
class Alp_Parcelas
{
  /**
   * @var float $preco Preço do produto a ser parcelado.
   */
  private float $preco = 0.0;

  /**
   * Valor mínimo do produto para poder parcelar.
   */
  private float $min_a_parcelar = 0;

  /**
   * @var array<int,float> Array com chave de número da parcela e valor de porcentagem de juros.
   */
  private array $juros = [];

  /**
   * 
   */
  private array $valores_parcelas = [];

  private ?int $parcelas_totais = NULL;
  private ?int $parcelas_sem_juros = NULL;

  private ?float $menor_valor_sem_juros = NULL;
  private ?float $menor_valor_com_juros = NULL;

  /**
   * Construtor da classe que inicia o cálculo.
   * @param float $preco O valor total que será parcelado.
   */
  public function __construct(float $preco)
  {
    $this->preco = $preco;

    $asaas = $this->checar_Asaas();
    if ($asaas) $this->atribuir_valores_do_asaas($asaas);
    else $this->atribuir_valores_default();

    $this->calcular_parcelas();
  }

  /**
   * Retorna o máximo da parcelas em que se pode dividir, mesmo considerando juros.
   * @return int Número de parcelas.
   */
  public function get_parcelas_totais(): int
  {
    if (!empty($this->parcelas_totais)) return $this->parcelas_totais;
    return $this->parcelas_totais = max(array_keys($this->juros));
  }

  /**
   * Retorna o máximo da parcelas em que se pode dividir sem cair em juros.
   * @return int Número de parcelas.
   */
  public function get_parcelas_sem_juros(): int
  {
    if (!empty($this->parcelas_sem_juros)) return $this->parcelas_sem_juros;
    $parcelas_sem_juros = max(array_keys(
      array_filter($this->juros, fn ($valor) => !$valor)
    ));

    if (!$parcelas_sem_juros) $parcelas_sem_juros = 1;
    return $this->parcelas_sem_juros = $parcelas_sem_juros;
  }

  /**
   * Retorna o menor valor que a pessoa pode pagar parcelado sem cair em juros.
   * @return float Valor.
   */
  public function get_menor_valor_sem_juros(): float
  {
    if (!empty($this->menor_valor_sem_juros)) return $this->menor_valor_sem_juros;
    $parcela = $this->get_parcelas_sem_juros();
    return $this->valores_parcelas[$parcela];
  }

  /**
   * Retorna o menor valor que a pessoa pode pagar parcelado, mesmo considerando juros.
   * @return float Valor.
   */
  public function get_menor_valor_com_juros(): float
  {
    if (!empty($this->menor_valor_com_juros)) return $this->menor_valor_com_juros;
    $parcela = $this->get_parcelas_totais();
    return $this->valores_parcelas[$parcela];
  }

  /**
   * Retorna um array com os valores de cada parcela.
   * @return array<int,float> Valores das parcelas.
   */
  public function get_valores_parcelas(): array
  {
    return $this->valores_parcelas;
  }

  /**
   * Retorna um array com as porcentagens de juros para cada parcela.
   * @return array<int,float> Valores dos juros.
   */
  public function get_juros(): array
  {
    return $this->juros;
  }

  /**
   * Verifica se o ASAAS está instalado e sendo utilizado.
   * @return array|false Array com as configurações do ASAAS, ou false se não estiver setado.
   */
  private function checar_Asaas(): array|false
  {
    if (!class_exists('WC_Payment_Gateways')) return false;

    $metodos_pagamento = WC_Payment_Gateways::instance()->get_available_payment_gateways();
    $metodos_pagamento = array_filter($metodos_pagamento, fn ($metodo) => $metodo->id === 'asaas-credit-card');
    if (!$metodos_pagamento) return false;

    $asaas = get_option('woocommerce_asaas-credit-card_settings');
    return $asaas;
  }

  /**
   * Configura os valores dos parâmetros da classe para os padrões configurados no ASAAS.
   * @param array $asaas Array com as configs do ASAAS
   * @return void
   */
  private function atribuir_valores_do_asaas(array $asaas): void
  {
    $this->juros = $asaas['interest_installment'];
    $this->min_a_parcelar = (float) $asaas['min_installment_value'];
  }

  /**
   * Atribui valores defaults se não tiver o gateway do ASAAS funcionando.
   * @return void
   */
  private function atribuir_valores_default(): void
  {
    $this->juros = array_fill(1, 12, 0);
  }

  /**
   * Faz o cálculo das parcelas para preencher o array.
   */
  private function calcular_parcelas(): void
  {
    foreach ($this->juros as $num => $juros) {
      $this->valores_parcelas[$num] = $this->calcular_valor_parcela($num);
    }

    $this->valores_parcelas = array_filter($this->valores_parcelas, fn ($valor) => $valor !== false);
  }

  /**
   * Calcula quanto será pago em cada parcela.
   */
  private function calcular_valor_parcela(int $num): float|false
  {
    if ($num < 0) return false;

    $juros = $this->juros[$num];
    $juros = 1 + ($juros / 100);

    $preco = $this->preco * $juros;

    $valor = round($preco / $num, 2);

    if ($valor < $this->min_a_parcelar && $num > 1) {
      unset($this->juros[$num]);
      return false;
    }
    return $valor;
  }
}
