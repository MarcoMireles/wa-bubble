<div id="wa-bubble" class="wa-bubble whatsapp-container">
  <div class="wa-bubble whatsapp-container-icon <?php echo (isset(WA_Bubble_Settings::$options_style['wa_bubble_bubble_side'])) ? esc_attr(WA_Bubble_Settings::$options_style['wa_bubble_bubble_side']) : 'right';  ?>">
    <div class="wa-bubble whatsapp-icon ">
      <img class="<?php echo (isset(WA_Bubble_Settings::$options_style['wa_bubble_bubble_size'])) ? esc_attr(WA_Bubble_Settings::$options_style['wa_bubble_bubble_size']) : 'medium';  ?>" src="<?php echo WA_BUBBLE_URL . 'assets/img/whatsapp-icon.png'  ?>" alt="whatsapp">
    </div>
  </div>
</div>