<div class="form-contato grid gap-y-md gap-x-sm">

  <div class="col-12 flex flex-column gap-xxs">
    <label for="nome" class="form-contato__label">Nome</label>
    [text* nome class:form-contato__input class:form-control]
  </div>

  <div class="col-12 col-6@sm flex flex-column gap-xxs">
    <label for="email" class="form-contato__label">E-mail</label>
    [email* email class:form-control class:form-contato__input]
  </div>

  <div class="col-12 col-6@sm flex flex-column gap-xxs">
    <label for="telefone" class="form-contato__label">Telefone</label>
    [text* telefone class:form-contato__input class:form-control class:phone-mask]
  </div>

  <div class="col-12 flex flex-column gap-xxs">
    <label for="assunto" class="form-contato__label">Assunto</label>
    [select* assunto class:form-contato__select "Comercial" "Elogio" "Financeiro" "Marketing" "Reclamação" "Sugestão" "Suporte" "Outros"]
  </div>

  [group outro-assunto clear_on_hide]
  <div class="col-12 flex flex-column gap-xxs">
    <label for="nome" class="form-contato__label">Qual o assunto?</label>
    [text* outro-assunto class:form-contato__input class:form-control]
  </div>
  [/group]

  <div class="col-12 flex flex-column gap-xxs">
    <label for="mensagem" class="form-contato__label">Mensagem</label>
    [textarea* mensagem class:form-contato__textarea class:form-control]
  </div>

  <label class="flex items-center gap-xs">
    <div class="custom-checkbox">
      [acceptance aceite-termos class:custom-checkbox__input]
      <div class="custom-checkbox__control" aria-hidden="true"></div>
    </div>
    <p class="color-white opacity-80%">Li e concordo com os termos da <a href="politica-de-privacidade" target="_blank" class="color-white text-underline">Política de
        Privacidade.</a></p>
  </label>

  <button type="submit" class="btn btn--accent">Enviar</button>

</div>