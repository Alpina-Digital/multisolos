<div class="form-contato grid gap-y-md gap-x-sm">

  <div class="hide">
    [select* instalacao first_as_label "Carregando..."]
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
    <label for="consumo" class="form-contato__label">Informe seu consumo mensal</label>
    [number* consumo class:form-contato__input min:0 max:99999 "0"]
  </div>

  <div class="col-12 flex flex-column gap-xxs">
    <label for="distribuidora" class="form-contato__label">Selecione sua distribuidora</label>
    [select* distribuidora class:form-contato__select first_as_label "Carregando..."]
  </div>

  <div class="flex gap-xs items-start">
    <div class="block-contato-form__radio">
      <label for="cliente" class="form-contato__label">Sabe o valor da sua tarifa?</label>
      [radio sabe_valor "Sim" "Não"]
    </div>
    [group tarifa clear_on_hide]
    [number* tarifa class:form-contato__input min:0 max:99999 placeholder "Insira o valor da tarifa"]
    [/group]
  </div>

  <p class="color-white opacity-80%">OBS: as tarifas de energia normalmente não excedem o valor de R$2,00 por kWh</p>


  [hidden nome]
  [hidden email]
  [hidden telefone]

  <button type="submit" class="btn btn--accent">Ver resultado</button>

</div>