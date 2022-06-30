<?php
if (!class_exists('WA_Bubble_Whatsapp_Bubble')){
  class WA_Bubble_Whatsapp_Bubble{
    public function __construct(){
      add_action( 'wp_footer', array($this,'display_whatsapp_bubble') );
    }

    public function display_whatsapp_bubble(){
      echo 'Hello';
    }
  }
}