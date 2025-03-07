(function ($) {

  const phone = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  };

  const phone_options = {
    onKeyPress: function (val, e, field, options) {
      field.mask(phone.apply({}, arguments), options);
    }
  };

  $('.phone-mask').mask(phone, phone_options);
  $('.cpf-mask').mask('000.000.000-00');
  $('.data-mask').mask('00/00/0000');
  $('.ano-mask').mask('0000', {
    reverse: true
  });

  $('.money-mask').mask('#.##0,00', { reverse: true });

})(jQuery);