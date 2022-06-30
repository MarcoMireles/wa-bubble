<div id="wa-bubble" class="wa-bubble whatsapp-container <?php echo (isset(WA_Bubble_Settings::$options_style['wa_bubble_bubble_side'])) ? esc_attr(WA_Bubble_Settings::$options_style['wa_bubble_bubble_side']) : 'right';  ?>">
  <div class="wa-bubble whatsapp-popup-container">
    <div class="wa-bubble whatsapp-popup-box <?php echo (isset(WA_Bubble_Settings::$options_style['wa_bubble_bubble_side'])) ? esc_attr(WA_Bubble_Settings::$options_style['wa_bubble_bubble_side']) : 'right';  ?>">
      <div class="wa-bubble whatsapp-popup-header">
        <p class="popup-header">Whatsapp Chat</p>
        <p class="close-popup"><img src="<?php echo WA_BUBBLE_URL . 'assets/img/close.png'  ?>" alt=""></p>
      </div>
      <div class="wa-bubble whatsapp-popup-content">
        <p class="popup-message"><?php echo (isset(WA_Bubble_Settings::$options['wa_bubble_whatsapp_main_message_whatsapp'])) ? esc_attr(WA_Bubble_Settings::$options['wa_bubble_whatsapp_main_message_whatsapp']) : '';  ?></p>
        <textarea id="popup-text-message"
                  placeholder="<?php echo (isset(WA_Bubble_Settings::$options['wa_bubble_whatsapp_placeholder'])) ? esc_attr(WA_Bubble_Settings::$options['wa_bubble_whatsapp_placeholder']) : '';  ?>"
        ><?php echo (isset(WA_Bubble_Settings::$options['wa_bubble_whatsapp_default_message'])) ? esc_attr(WA_Bubble_Settings::$options['wa_bubble_whatsapp_default_message']) : '';  ?></textarea>
      </div>
      <div class="wa-bubble whatsapp-popup-footer">
        <a
          href="https://api.whatsapp.com/send/?phone=<?php echo (isset(WA_Bubble_Settings::$options['wa_bubble_whatsapp_number'])) ? esc_attr(WA_Bubble_Settings::$options['wa_bubble_whatsapp_number']) : '8122008029';  ?>&text="
          class="popup-submit-button" target="_blank"><?php echo (isset(WA_Bubble_Settings::$options['wa_bubble_whatsapp_submit_button_text_whatsapp'])) ? esc_attr(WA_Bubble_Settings::$options['wa_bubble_whatsapp_submit_button_text_whatsapp']) : 'Send';  ?></a>
      </div>
    </div>
  </div>
  <div class="wa-bubble whatsapp-container-icon ">
    <div class="wa-bubble whatsapp-icon ">
      <img class="<?php echo (isset(WA_Bubble_Settings::$options_style['wa_bubble_bubble_size'])) ? esc_attr(WA_Bubble_Settings::$options_style['wa_bubble_bubble_size']) : 'medium';  ?>" src="<?php echo WA_BUBBLE_URL . 'assets/img/whatsapp-icon.png'  ?>" alt="whatsapp">
    </div>
  </div>
</div>