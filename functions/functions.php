<?php
if (!function_exists('wa_bubble_options')){

  function wa_bubble_options(){

    $bottomPosition = isset(WA_Bubble_Settings::$options_style['wa_bubble_whatsapp_bottom_position']) ? sanitize_text_field(WA_Bubble_Settings::$options_style['wa_bubble_whatsapp_bottom_position']) : 20;

    $sidePosition = isset(WA_Bubble_Settings::$options_style['wa_bubble_whatsapp_side_position']) ? sanitize_text_field(WA_Bubble_Settings::$options_style['wa_bubble_whatsapp_side_position']) : 20;

    $bubbleSide = isset(WA_Bubble_Settings::$options_style['wa_bubble_bubble_side']) ? sanitize_text_field(WA_Bubble_Settings::$options_style['wa_bubble_bubble_side']) : 20;

    $autoOpenOption = isset(WA_Bubble_Settings::$options['wa_bubble_bubble_autoshow']) ? sanitize_text_field(WA_Bubble_Settings::$options['wa_bubble_bubble_autoshow']) : 'no';

    $autoOpenTimeOption = isset(WA_Bubble_Settings::$options['wa_bubble_whatsapp_open_time']) ? sanitize_text_field(WA_Bubble_Settings::$options['wa_bubble_whatsapp_open_time']) : '3500';

    $timesAutoOpenTimeOption = isset(WA_Bubble_Settings::$options['wa_bubble_whatsapp_times_open']) ? sanitize_text_field(WA_Bubble_Settings::$options['wa_bubble_whatsapp_times_open']) : '2';

    wp_enqueue_script( 'wa-bubble-main-js', WA_BUBBLE_URL . 'vendor/js/frontend.js', array( 'jquery' ), WA_BUBBLE_VERSION, true );

    wp_localize_script('wa-bubble-main-js','WA_BUBBLE_OPTIONS', array(
      'bottomPosition' => $bottomPosition,
      'sidePosition' =>$sidePosition,
      'bubbleSide' => $bubbleSide,
      'autoOpenOption' => $autoOpenOption,
      'timeOpenOption' => $autoOpenTimeOption,
      'timesAutoOpenOption' => $timesAutoOpenTimeOption,
    ) );
  }

}
