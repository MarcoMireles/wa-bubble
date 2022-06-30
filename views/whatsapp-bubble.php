<div id="wa-bubble" class="wa-bubble whatsapp-container <?php echo (isset(WA_Bubble_Settings::$options_style['wa_bubble_bubble_side'])) ? esc_attr(WA_Bubble_Settings::$options_style['wa_bubble_bubble_side']) : 'right';  ?>">
  <div class="wa-bubble whatsapp-popup-container">
    <div class="wa-bubble whatsapp-popup-box">
      <div class="wa-bubble whatsapp-popup-header">
        <p class="popup-header">Whatsapp</p>
        <p class="close-popup">X</p>
      </div>
      <div class="wa-bubble whatsapp-popup-content">
        <p class="popup-message">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        <textarea id="" cols="30" rows="10"></textarea>
      </div>
      <div class="wa-bubble whatsapp-popup-footer">
        <a href="#" class="popup-submit-button" target="_blank">Submit</a>
      </div>
    </div>
  </div>
  <div class="wa-bubble whatsapp-container-icon ">
    <div class="wa-bubble whatsapp-icon ">
      <img class="<?php echo (isset(WA_Bubble_Settings::$options_style['wa_bubble_bubble_size'])) ? esc_attr(WA_Bubble_Settings::$options_style['wa_bubble_bubble_size']) : 'medium';  ?>" src="<?php echo WA_BUBBLE_URL . 'assets/img/whatsapp-icon.png'  ?>" alt="whatsapp">
    </div>
  </div>
</div>