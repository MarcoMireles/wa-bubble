
<?php
if (WA_Bubble_Settings::$options['wa_bubble_whatsapp_number'] != '' || !empty(WA_Bubble_Settings::$options['wa_bubble_whatsapp_number'])){
  if (WA_Bubble_Settings::$page_conditions['wa_bubble_page_conditions_active'] =='Yes'){
    $action = WA_Bubble_Settings::$page_conditions['wa_bubble_page_show_or_hide'];
    $wooCommerce = false;
    if(is_plugin_active( 'woocommerce/woocommerce.php' )){
      $wooCommerce=true;
      $shopPage = WA_Bubble_Settings::$page_conditions['wa_bubble_woocoomerce_shop_page'];
      $productPage = WA_Bubble_Settings::$page_conditions['wa_bubble_woocoomerce_product_page'];
      $cartPage = WA_Bubble_Settings::$page_conditions['wa_bubble_woocoomerce_cart_page'];
      $checkoutPage = WA_Bubble_Settings::$page_conditions['wa_bubble_woocoomerce_checkout_page'];
      $accountPage = WA_Bubble_Settings::$page_conditions['wa_bubble_woocoomerce_my_account_page'];
    }

    $the_pages =WA_Bubble_Settings::$page_conditions['wa_bubble_select_page_show_or_hide'];
    $pagesID  = json_decode($the_pages, true);
    $itemsPagesID =count($pagesID);
    $page_id = get_the_ID();
    if ($wooCommerce && (is_shop() || is_product() || is_product_category() || is_cart() || is_checkout() || is_account_page())){
      if(is_shop() && $shopPage =='on'){
        $starPage = true;
      }else if(is_product() && $productPage =='on'){
        $starPage = true;
      }else if(is_product_category() && $shopPage =='on'){
        $starPage = true;
      }else if(is_cart() && $cartPage =='on'){
        $starPage = true;
      }else if(is_checkout() && $checkoutPage =='on'){
        $starPage = true;
      }else if(is_account_page() && $accountPage =='on'){
        $starPage = true;
      }else{
        $starPage = false;
      }
    }else{
      if ($itemsPagesID>0){
        $starPage =false;
        if(in_array($page_id,$pagesID)){
          $starPage = true;
        }
      }else{
        $starPage = true;
        if ($action == 'Hide'){
          $starPage = false;
        }

      }
    }


    if($action == 'Show' && $starPage ) {
      include 'templates/bubble.php';
    }
    if($action == 'Hide' && !$starPage ) {
      include 'templates/bubble.php';
    }



  }// Close - Page conditions active
  else{
    include 'templates/bubble.php';
  }// Close - Page conditions desactive
}
?>
