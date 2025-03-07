<div class="form-contato grid gap-y-md gap-x-sm">

  <div class="col-12 flex flex-column gap-xxs">
    <label for="nome" class="form-contato__label">Nome</label>
    [text* nome class:form-contato__input]
  </div>

  <div class="col-12 col-6@sm flex flex-column gap-xxs">
    <label for="email" class="form-contato__label">E-mail</label>
    [email* email class:form-contato__input]
  </div>

  <div class="col-12 col-6@sm flex flex-column gap-xxs">
    <label for="telefone" class="form-contato__label">Telefone</label>
    [text* telefone class:form-contato__input class:phone-mask]
  </div>

  <div class="col-12 col-6@sm flex flex-column gap-xxs">
    <label for="estado" class="form-contato__label">Estado</label>
    [select* estado class:form-contato__select first_as_label "Carregando..."]
  </div>

  <div class="col-12 col-6@sm flex flex-column gap-xxs">
    <label for="cidade" class="form-contato__label">Cidade</label>
    [select* cidade class:form-contato__select first_as_label "Carregando..."]
  </div>

  <div class="col-12 flex flex-column gap-xxs">
    <label for="mensagem" class="form-contato__label">Mensagem</label>
    [textarea* mensagem class:form-contato__textarea]
  </div>

  <div class="hide">
    [select* solucao class:form-contato__solucao]
  </div>

  [group autoproducao]
  <h3 class="form-contato__group-title">Autoprodução</h3>
  [/group]

  [group bot]
  <h3 class="form-contato__group-title">Economia Sem Investimento - BOT</h3>
  [/group]

  [group empresas]
  <h3 class="form-contato__group-title">Empresas e Indústria</h3>
  [/group]

  [group agro]
  <h3 class="form-contato__group-title">Agronegócio</h3>
  [/group]

  [group residencias]
  <h3 class="form-contato__group-title">Residências</h3>
  [/group]

  [group epc]
  <h3 class="form-contato__group-title">EPC</h3>
  [/group]

  [group usina]
  <h3 class="form-contato__group-title">Usina de Investimento</h3>
  [/group]

  [group sistema]
  <h3 class="form-contato__group-title">Sistema de Armazenamento</h3>
  [/group]

  [group grid]
  <h3 class="form-contato__group-title">Grid Zero</h3>
  [/group]

  [group bot]
  <div class="col-12 flex flex-column gap-xxs">
    <label for="valor-luz" class="form-contato__label">Você é atendido por:</label>
    [select* valor-luz class:form-contato__select "Distribuidora de energia (mercado cativo)" "Mercado Livre"]
  </div>
  [/group]

  [group conta-luz]
  <div class="col-12 grid gap-y-md gap-x-sm">

    <div class="col-12 flex flex-column gap-xxs">
      <label for="valor-luz" class="form-contato__label">Valor de conta de luz</label>
      [select* valor-luz class:form-contato__select "Até R$349,00" "De R$350,00 a R$499,00" "De R$500,00 a R$746,00" "De R$750,00 a R$999,00" "De R$1.000,00 a R$1.999,00" "De R$2.000,00 a R$4.999,00" "De R$5.000,00 a R$9.999,00" "Acima de R$10.000,00"]
    </div>

    <div class="form-contato__upload col-12 flex flex-column gap-xxs">
      <div class="form-contato__label">Anexar a última conta de energia</div>
      <label for="conta-luz" class="flex gap-xs">
        <div class="form-contato__input">Selecione o arquivo (png, jpg, pdf)</div>
        <div class="btn btn--primary">Anexar</div>
      </label>
      [file* conta-luz id:conta-luz class:form-contato__file limit:5mb filetypes:png|jpg|pdf]
    </div>

  </div>
  [/group]

  [group empresa-cargo]
  <div class="col-12 grid gap-y-md gap-x-sm">

    <div class="col-12 col-6@sm flex flex-column gap-xxs">
      <label for="empresa" class="form-contato__label">Empresa (opcional)</label>
      [text empresa class:form-contato__input]
    </div>

    <div class="col-12 col-6@sm flex flex-column gap-xxs">
      <label for="cargo" class="form-contato__label">Cargo (opcional)</label>
      [text cargo class:form-contato__input]
    </div>

  </div>
  [/group]

  [group epc]
  <div class="col-12 grid gap-y-md gap-x-sm">

    <div class="col-12 col-6@sm flex flex-column gap-xxs">
      <label for="empresa" class="form-contato__label">Nome da Empresa</label>
      [text* empresa class:form-contato__input]
    </div>

    <div class="col-12 col-6@sm flex flex-column gap-xxs">
      <label for="cargo" class="form-contato__label">Cargo</label>
      [text* cargo class:form-contato__input]
    </div>

    <div class="col-12 col-6@sm flex flex-column gap-xxs">
      <label for="cargo" class="form-contato__label">Potência de conexão de rede</label>
      [text* potencia class:form-contato__input]
    </div>

    <div class="col-12 col-6@sm flex flex-column gap-xxs">
      <label for="cargo" class="form-contato__label"> Tipo de estrutura (fixa, tracker)</label>
      [select* estrutura class:form-contato__select "Fixa" "Tracker"]
    </div>

  </div>
  [/group]

  [group documento-solicitacao]
  <div class="form-contato__upload col-12 flex flex-column gap-xxs">
    <div class="form-contato__label">Anexar documento complementar da solicitação (opcional)</div>
    <label for="documento-solicitacao" class="flex gap-xs">
      <div class="form-contato__input">Selecione o arquivo (png, jpg, pdf)</div>
      <div class="btn btn--primary">Anexar</div>
    </label>
    [file documento-solicitacao id:documento-solicitacao class:form-contato__file limit:5mb filetypes:png|jpg|pdf]
  </div>
  [/group]

  <label class="flex items-start gap-xs">
    <div class="custom-checkbox">
      [acceptance aceite-termos class:custom-checkbox__input]
      <div class="custom-checkbox__control" aria-hidden="true"></div>
    </div>
    <p class="color-white opacity-80%">Li e concordo com os termos da <a href="politica-de-privacidade" target="_blank" class="color-white text-underline">Política
        de
        Privacidade.</a></p>
  </label>

  [hidden cidade_estado]

  <button type="submit" class="btn btn--accent">Solicitar orçamento</button>

</div>