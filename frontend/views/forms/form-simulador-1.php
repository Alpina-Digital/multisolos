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

  <label class="flex items-center gap-xs">
    <div class="custom-checkbox">
      [acceptance aceite-termos class:custom-checkbox__input]
      <div class="custom-checkbox__control" aria-hidden="true"></div>
    </div>
    <p class="color-white opacity-80%">Li e concordo com os termos da <a href="politica-de-privacidade" target="_blank" class="color-white text-underline">Política
        de
        Privacidade.</a></p>
  </label>

  <button type="submit" class="btn btn--accent">Avançar</button>

</div>