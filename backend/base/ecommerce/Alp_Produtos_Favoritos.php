<?php
class Alp_Produtos_Favoritos
{
  /**
   * Lista os produtos favoritos do usuário atual.
   */
  public static function listar_favoritos(): array
  {
    $usuario = Alp_Usuario::get_usuario();
    if (!$usuario) return [];

    $lista = get_user_meta($usuario->ID, 'produtos_favoritos', true);

    if (!$lista) return [];
    return $lista;
  }

  public static function is_listado($id)
  {
    return in_array($id, self::listar_favoritos());
  }

  /**
   * Define um produto como favorito ou tira a favoritação deste produto.
   * Responde a um AJAX.
   */
  public static function set_favorito()
  {
    $usuario = Alp_Usuario::get_usuario();
    if (!$usuario) die;

    $favorito_id = $_POST['favorito_id'];
    $lista_favoritos = self::listar_favoritos();

    if (in_array($favorito_id, $lista_favoritos)) {
      $arr_key = array_search($favorito_id, $lista_favoritos);
      unset($lista_favoritos[$arr_key]);
      $is_favorito = false;
    } else {
      array_push($lista_favoritos, $favorito_id);
      $is_favorito = true;
    }

    update_user_meta($usuario->ID, 'produtos_favoritos', $lista_favoritos);

    echo json_encode(array('is_favorito' => $is_favorito));

    die();
  }

  /**
   * Imprime o script JS para manipular o botão de coração.
   */
  public static function js_ajax_handle()
  {
?>
    <script defer>
      (function($) {

        function setFavorite(id_favorito) {
          const favorite_field = $(`[data-favorito=${id_favorito}]`);

          $.ajax({
            url: "<?= admin_url('admin-ajax.php') ?>",
            data: {
              'action': 'set_favorito',
              'favorito_id': id_favorito,
            },
            dataType: 'JSON',
            type: 'POST',
            cache: false,

            success: function(data) {
              favorite_field.toggleClass("on");
            }
          });

        };

        $('.favorito[data-favorito]').on('click', function() {
          var id_favorito = parseInt($(this).data('favorito'));
          setFavorite(id_favorito);
        });

      })(jQuery);
    </script>
<?php
  }
}

/**
 * AJAX
 */
add_action('wp_ajax_set_favorito', ['Alp_Produtos_Favoritos', 'set_favorito']);
add_action('wp_ajax_nopriv_set_favorito', ['Alp_Produtos_Favoritos', 'set_favorito']);

add_action('wp_footer', ['Alp_Produtos_Favoritos', 'js_ajax_handle']);
