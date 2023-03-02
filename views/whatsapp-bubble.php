
<?php
if (WA_Bubble_Settings::$options['wa_bubble_whatsapp_number'] != '' || !empty(WA_Bubble_Settings::$options['wa_bubble_whatsapp_number'])){
  if (WA_Bubble_Settings::$page_conditions['wa_bubble_page_conditions_active'] =='Yes'){
    $action = WA_Bubble_Settings::$page_conditions['wa_bubble_page_show_or_hide'];

    if(WA_Bubble_Settings::$page_conditions['wa_bubble_select_page_show_or_hide'] != ''){
      $pagesID = json_decode(WA_Bubble_Settings::$page_conditions['wa_bubble_select_page_show_or_hide'], true);
    }else{
      $pagesID = 'all';
    }


    if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
      $shop  = wc_get_page_id( 'shop' );
      var_dump($shop);

      var_dump(get_the_ID());
      var_dump(WA_Bubble_Settings::$page_conditions['wa_bubble_woocoomerce_shop_page']);
    }
    if ( is_woocommerce() && is_post_type_archive( 'product' ) ) {
      // El archivo actual es un archive de productos de WooCommerce
      // Puedes agregar aquí el código que deseas ejecutar en esta página
    }



    $page_id = get_the_ID();
    if ($pagesID == 'all') {
      include 'templates/bubble.php';
    } else {
      $show_bubble = false;

      if (is_shop() && WA_Bubble_Settings::$page_conditions['wa_bubble_woocoomerce_shop_page'] == 'on') {
        $show_bubble = true;
      } else if (is_product() && WA_Bubble_Settings::$page_conditions['wa_bubble_woocoomerce_product_page'] == 'on') {
        $show_bubble = true;
      } else if (is_product_category() && WA_Bubble_Settings::$page_conditions['wa_bubble_woocoomerce_shop_page'] == 'on') {
        $show_bubble = true;
      } else if (is_cart() && WA_Bubble_Settings::$page_conditions['wa_bubble_woocoomerce_cart_page'] == 'on') {
        $show_bubble = true;
      } else if (is_checkout() && WA_Bubble_Settings::$page_conditions['wa_bubble_woocoomerce_checkout_page'] == 'on') {
        $show_bubble = true;
      } else if (is_account_page() && WA_Bubble_Settings::$page_conditions['wa_bubble_woocoomerce_my_account_page'] == 'on') {
        $show_bubble = true;
      } else {
        $show_bubble = in_array($page_id, $pagesID);
      }

      if ($action == 'Show') {
        if ($show_bubble) {
          include 'templates/bubble.php';
        } else {
          echo 'show ' . $page_id;
        }
      } else {
        if (!$show_bubble) {
          include 'templates/bubble.php';
        } else {
          echo 'hide ' . $page_id;
        }
      }
    }

  }else{
    include 'templates/bubble.php';
  }
}
?>
