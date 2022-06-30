<?php
if (!class_exists('WA_Bubble_Whatsapp_Bubble')){
  class WA_Bubble_Whatsapp_Bubble{
    public function __construct(){
      add_action( 'wp_footer', array($this,'display_whatsapp_bubble') );
    }

    public function display_whatsapp_bubble(){
      require (WA_BUBBLE_PATH . 'views/whatsapp-bubble.php');
      wp_enqueue_style('font-roboto');
      wp_enqueue_style('wa-bubble-main-css');
      wp_enqueue_script('wa-bubble-main-js');
    }
  }
}