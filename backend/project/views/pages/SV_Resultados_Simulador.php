<?php

/**
 * Classe responsável pela página Simulador de Investimento.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class SV_Resultados_Simulador extends Alp_Page
{
  use SV_Apresentacao;

  /**
   * @var array JSON com os preços por KWP de acordo com a quantidade total.
   */
  private array $json_kwp;

  /**
   * @var array JSON com as tarifas de energia das companhias.
   */
  private array $json_tarifas;

  /**
   * @var array JSON com as irradiações solares dos estados.
   */
  private array $json_irradiacoes;

  /**
   * @var string Tipo da instalação: Residencial, Empresas, Indústrias ou Agronegócio.
   */
  private string $tipo_instalacao;

  /**
   * @var string Nome da distribuidora.
   */
  private string $distribuidora;

  /**
   * @var int Armazena a irradiação solar média do estado.
   */
  private int $irradiacao;

  /**
   * @var float Armazena o preço da tarifa de energia.
   */
  private float $tarifa;

  /**
   * @var float Armazena o valor mensal de energia.
   */
  private float $conta_mensal;

  /**
   * @var float Armazena o kWh do consumo mensal.
   */
  private float $consumo_mensal;

  /**
   * @var float Armazena a conta mínima de energia.
   */
  private float $conta_minima;

  /**
   * @var float Armazena o preço do KWP.
   */
  private float $preco_kwp;

  /**
   * @var float Feedback da potência necessária do sistema.
   */
  private float $potencia_sistema;

  /**
   * @var float Feedback da quantidade de área necessária para instalar o sistema.
   */
  private float $area_telhado;

  /**
   * @var float Feedback da produção estimada do sistema.
   */
  private float $producao_estimada;

  /**
   * @var float Feedback da estimativa de investimento.
   */
  private float $estimativa_investimento;

  /**
   * @var float Feedback da economia mensal com o sistema.
   */
  private float $economia_mensal;

  /**
   * @var string Feedback do payback/retorno do investimento.
   */
  private string $payback_retorno;

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   * @return void
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-resultados-simulador.php', 'simulador');
    $this->create_metaboxes();
  }

  /**
   * Cria os metaboxes da página.
   * @return void
   */
  public function create_metaboxes(): void
  {
    $this->template->create_metaboxes()
      ->chain_from_callable([$this, 'chain_metaboxes_apresentacao_azul'], subtitulo: false)
      //OPÇÕES DE FINANCIAMENTO
      ->add_metabox_box('financiamento', 'Opções de Financiamento')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_group('Itens', 'itens')
      ->add_metabox_field_text('Subtítulo', 'subtitulo', 4)
      ->add_metabox_field_text('Valor', 'valor', 4)
      ->add_metabox_field_biu('Texto', 'texto', 4)
      ->close_metabox_group()
      ->add_metabox_heading('Box com botão')
      ->add_metabox_field_biu('Texto', 'texto_cta', 3)
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 3)
      ->add_metabox_field_text('Link no botão', 'cta_link', 3)
      ->add_metabox_field_select_target('Onde abrir o link', 'cta_target', 3)
      //SISTEMA SOLAR EM NÚMEROS
      ->add_metabox_box('sistema', 'Sistema Solar em Números')
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 4)
      ->add_metabox_field_text('Link no botão', 'cta_link', 4)
      ->add_metabox_field_select_target('Onde abrir o link', 'cta_target', 4)
      ->render();
  }

  /**
   * Renderiza a página Simulador.
   * @return void
   */
  public function render(): void
  {
    $this->init();

    $this
      ->add_render($this->render_section_apresentacao_azul())
      ->add_render($this->render_section_superior_resultados())
      ->add_render($this->render_section_sistema_solar())
      ->add_render($this->render_section_opcoes_financiamento())
      ->echo_render();
  }

  /**
   * Inicia todas as atribuições e cálculos.
   * @return void
   */
  public function init(): void
  {
    $this->set_json();

    $this->set_tipo_instalacao();
    $this->set_distribuidora();
    $this->set_irradiacao();
    $this->set_conta_mensal();
    $this->set_tarifa();

    $this->calcular_conta_minima();
    $this->calcular_consumo_mensal();
    $this->calcular_economia_mensal();
    $this->calcular_potencia_sistema();
    $this->calcular_area_telhado();
    $this->calcular_producao_estimada();
    $this->calcular_estimativa_investimento();
    $this->calcular_payback_retorno();
  }

  /**
   * Seta a distribuidora de energia.
   * @return void
   */
  private function set_distribuidora(): void
  {
    $this->distribuidora = addslashes($_REQUEST['distribuidora'] ?? 'LIGHT');

    $distribuidoras = array_column($this->json_tarifas, 'distribuidora');

    if (!in_array($this->distribuidora, $distribuidoras)) {
      $this->distribuidora = 'LIGHT';
    }
  }

  /**
   * Seta a irradiação solar média do estado.
   * @return void
   */
  private function set_irradiacao(): void
  {
    $estado = intval($_REQUEST['estado'] ?? 27);
    $estado = Alp_IBGE::get_estado($estado, true);

    $this->irradiacao = $this->json_irradiacoes[$estado] ?? 125;
  }

  /**
   * Seta o tipo de instalação.
   * @return void
   */
  private function set_tipo_instalacao(): void
  {
    $this->tipo_instalacao = match ($_REQUEST['instalacao'] ?? '') {
      'Residencial' => 'residencial',
      'Empresas' => 'empresa',
      'Indústrias' => 'industria',
      'Agronegócio' => 'agronegocio',
      default => 'residencial'
    };
  }

  /**
   * Seta o valor do consumo mensal.
   * @return void
   */
  private function set_conta_mensal(): void
  {
    $consumo = preg_replace('%[^0-9,]%', '', $_REQUEST['consumo'] ?? 0);
    $consumo = preg_replace('%[,]%', '.', $consumo);

    $this->conta_mensal = floatval(round($consumo, 2));
  }

  /**
   * Seta o valor da tarifa de energia.
   * @return void
   */
  private function set_tarifa(): void
  {
    if (!empty($_REQUEST['tarifa'])) {
      $tarifa = preg_replace('%[^0-9,]%', '', $_REQUEST['tarifa']);
      $tarifa = preg_replace('%[,]%', '.', $tarifa);
      $this->tarifa = floatval(round($tarifa, 2));

      if ($tarifa > 0) return;
    }

    $distribuidoras = array_column($this->json_tarifas, 'distribuidora');
    $indice = array_search($this->distribuidora, $distribuidoras);

    if ($indice === false) {
      $this->tarifa = 0.5;
      return;
    }

    $this->tarifa = $this->json_tarifas[$indice][$this->tipo_instalacao] ?? 0.5;
  }

  /**
   * Seta os arquivos JSON usados nos cálculos.
   * @return void
   */
  private function set_json(): void
  {
    $this->json_irradiacoes = json_decode(file_get_contents(__DIR__ . '/../../json/irradiacoes.json'), true);
    $this->json_kwp = json_decode(file_get_contents(__DIR__ . '/../../json/kwp.json'), true);
    $this->json_tarifas = json_decode(file_get_contents(__DIR__ . '/../../json/tarifas.json'), true);
  }

  /**
   * Calcula a conta mensal de energia.
   * @return void
   */
  private function calcular_consumo_mensal(): void
  {
    $this->consumo_mensal = $this->conta_mensal / $this->tarifa;
  }

  /**
   * Calcula a potência necessária do sistema.
   * @return void
   */
  private function calcular_potencia_sistema(): void
  {
    if ($this->tipo_instalacao === 'industria') {
      $this->potencia_sistema = round($this->consumo_mensal / $this->irradiacao, 2);
    } else {
      $consumo = $this->consumo_mensal + ($this->consumo_mensal * 1.6 + (20 / 100));
      $this->potencia_sistema = $consumo / $this->irradiacao;
    }
  }

  /**
   * Calcula a área necessária para instalar o sistema.
   * @return void
   */
  private function calcular_area_telhado(): void
  {
    $this->area_telhado = $this->potencia_sistema * 6;
  }

  /**
   * Calcula a produção estimada do sistema.
   * @return void
   */
  private function calcular_producao_estimada(): void
  {
    $this->producao_estimada = $this->potencia_sistema * $this->irradiacao;
  }

  /**
   * Calcula a conta mínima de energia.
   * @return void
   */
  private function calcular_conta_minima(): void
  {
    $multiplicador = $this->conta_mensal > 300 ? 100 : 50;
    $this->conta_minima = $this->tarifa * $multiplicador;
  }

  /**
   * Calcula a economia mensal com o sistema.
   * @return void
   */
  private function calcular_economia_mensal(): void
  {
    $this->economia_mensal = $this->conta_mensal - $this->conta_minima;
    if ($this->economia_mensal < 0) $this->economia_mensal = 0;
  }

  /**
   * Calcula a estimativa de investimento.
   * @return void
   */
  private function calcular_estimativa_investimento(): void
  {
    $potencia = ceil($this->potencia_sistema);
    if ($potencia > 999) $potencia = 999;

    $precos = array_keys($this->json_kwp);
    $precos = array_filter($precos, fn($preco) => $preco >= $potencia);
    $preco = reset($precos);

    $this->estimativa_investimento = $this->json_kwp[$preco] * round($this->potencia_sistema, 2);
  }

  /**
   * Calcula o payback/retorno do investimento em anos e meses.
   * O cálculo leva em consideração a degradação do sistema, que é de 0,6% ao ano.
   * @return void
   */
  private function calcular_payback_retorno(): void
  {
    $degradacao = (0.6 / 100) / 12;
    $degradacao_acumulada = 0;
    $economia_acumulada = 0;
    $payback_meses = 0;

    for ($i = 0; $i < 1200; $i++) {
      $economia_acumulada += $this->economia_mensal - ($this->economia_mensal * $degradacao_acumulada);
      if ($this->estimativa_investimento <= $economia_acumulada) break;

      $degradacao_acumulada += $degradacao;
      $payback_meses++;
    }

    if ($payback_meses === 1200 || $payback_meses < 1) {
      $this->payback_retorno = '-';
      return;
    }

    $anos = floor($payback_meses / 12);
    $meses = $payback_meses % 12;

    if ($anos < 1) $anos = '';
    else $anos = $anos > 1 ? "{$anos} anos" : "{$anos} ano";

    if ($meses < 1) $meses = '';
    else $meses = $meses > 1 ? " e {$meses} meses" : " e {$meses} mês";

    $this->payback_retorno = $anos . $meses;
  }

  /**
   * Renderiza a seção superior dos resultados.
   * @return string HTML renderizado.
   */
  public function render_section_superior_resultados(): string
  {
    $itens = [
      [
        'titulo' => 'Estimativa de investimento',
        'icone' => get_svg_content('resultados/investimento.svg'),
        'valor' => 'R$ ' . number_format_i18n($this->estimativa_investimento ?? 0, 2)
      ],
      [
        'titulo' => 'Economia mensal',
        'icone' => get_svg_content('resultados/economia.svg'),
        'valor' => 'R$ ' . number_format_i18n($this->economia_mensal, 2)
      ],
      [
        'titulo' => 'Payback/Retorno',
        'icone' => get_svg_content('resultados/retorno.svg'),
        'valor' => $this->payback_retorno,
      ]
    ];

    $args = compact('itens');
    return $this->html('frontend/views/pages/resultados/section-superior-resultados.php', $args);
  }

  /**
   * Renderiza a seção de opções de financiamento.
   * @return string HTML renderizado.
   */
  public function render_section_opcoes_financiamento(): string
  {
    $args = $this->get_post_metas_values('financiamento');

    if (empty($args['itens'])) $args['itens'] = [];

    $itens = [
      [
        'titulo' => 'Sem juros',
        'valor' => 'Em até 4X',
        'texto' => ''
      ],
      [
        'titulo' => 'Sem entrada',
        'valor' => '20%',
        'texto' => 'Só na instalação + Financiamento em 36X'
      ],
      [
        'titulo' => 'Pague com economia',
        'valor' => '40%',
        'texto' => 'De entrada + 36 parcelas com valor próximo da sua economia'
      ]
    ];

    // $args = array_merge($args);
    return $this->html('frontend/views/pages/resultados/section-opcoes-financiamento.php', $args);
  }

  /**
   * Renderiza a seção de sistema solar.
   * @return string HTML renderizado.
   */
  public function render_section_sistema_solar(): string
  {
    $args = $this->get_post_metas_values('sistema');

    $args['itens'] = [
      [
        'titulo' => 'Potência do sistema',
        'icone' => get_svg_content('resultados/potencia.svg'),
        'valor' => number_format_i18n($this->potencia_sistema, 2)  . ' kWp',
      ],
      [
        'titulo' => 'Área do telhado',
        'icone' => get_svg_content('resultados/area.svg'),
        'valor' => number_format_i18n($this->area_telhado, 2) . ' m²',
      ],
      [
        'titulo' => 'Produção estimada',
        'icone' => get_svg_content('resultados/producao.svg'),
        'valor' => number_format_i18n($this->producao_estimada, 2) . ' kWh',
      ]
    ];

    return $this->html('frontend/views/pages/resultados/section-sistema-solar.php', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new SV_Resultados_Simulador(), 'setup']);
