(function ($) {
  function toggleStackCards() {
    if ($(window).width() < 1280) {
      $(".card-como-funciona").removeClass("stack-cards__item");
    } else {
      $(".card-como-funciona").addClass("stack-cards__item");
    }
  }

  $(window).on("resize", function () {
    toggleStackCards();
  });

  toggleStackCards();


})(jQuery);