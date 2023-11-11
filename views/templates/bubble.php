<div id="wa-bubble" class="wa-bubble whatsapp-container <?php echo (isset(WA_Bubble_Settings::$options_style['wa_bubble_bubble_side'])) ? esc_attr(WA_Bubble_Settings::$options_style['wa_bubble_bubble_side']) : 'right';  ?>">
  <div class="wa-bubble whatsapp-popup-container">
    <div class="wa-bubble whatsapp-popup-box <?php echo (isset(WA_Bubble_Settings::$options_style['wa_bubble_bubble_side'])) ? esc_attr(WA_Bubble_Settings::$options_style['wa_bubble_bubble_side']) : 'right';  ?>">
      <div class="wa-bubble whatsapp-popup-header">

        <?php
        $nameTitle = (isset(WA_Bubble_Settings::$options['wa_bubble_whatsapp_name_title_whatsapp'])) ? esc_attr(WA_Bubble_Settings::$options['wa_bubble_whatsapp_name_title_whatsapp']) : 'Whatsapp Chat';
        $description = (isset(WA_Bubble_Settings::$options['wa_bubble_whatsapp_description_whatsapp'])) ? esc_attr(WA_Bubble_Settings::$options['wa_bubble_whatsapp_description_whatsapp']) : 'Typically replies within a day';
        $agentImage = (isset(WA_Bubble_Settings::$options['wa_bubble_whatsapp_image_whatsapp'])) ? esc_attr(WA_Bubble_Settings::$options['wa_bubble_whatsapp_image_whatsapp']) : WA_BUBBLE_URL . 'assets/img/marcode.png';
        ?>
        <div class="wa-bubble whatsapp-popup-header-info">
          <div class="agent-image">
            <img height="50" width="50" src="<?php echo $agentImage;?>" alt="">
          </div>
          <p class="popup-header">
            <?php echo $nameTitle; ?>
            <span class="popup-header-description">
              <?php echo $description; ?>
            </span>
          </p>

        </div>
        <p class="close-popup"><img src="<?php echo WA_BUBBLE_URL . 'assets/img/close.png'  ?>" alt=""></p>
      </div>
      <div class="wa-bubble whatsapp-popup-content">

        <div class="wa-bubble whatsapp-animation-content">
          <div class="animation-before">
            <div class="stage">
              <div class="dot-flashing"></div>
            </div>
          </div>
          <div class="wa-bubble whatsapp-content-description">
            <?php
            if(WA_Bubble_Settings::$options['wa_bubble_bubble_dyw_name_agent'] == 'Yes'){
              ?>
              <p class="name-agent"><?php echo (isset(WA_Bubble_Settings::$options['wa_bubble_name_to_display'])) ? esc_attr(WA_Bubble_Settings::$options['wa_bubble_name_to_display']) : 'MarCode';  ?></p>
              <?php
            }
            ?>
            <p class="popup-message"><?php echo (isset(WA_Bubble_Settings::$options['wa_bubble_whatsapp_main_message_whatsapp'])) ? esc_attr(WA_Bubble_Settings::$options['wa_bubble_whatsapp_main_message_whatsapp']) : 'Receive information about our services:';  ?></p>
            <?php
            if(WA_Bubble_Settings::$options['wa_bubble_bubble_dyw_show_time'] == 'Yes'){
              echo '<p class="show-the-time"></p>';
            }
            ?>
          </div>
        </div>

        <div class="wa-bubble whatsapp-enter-text">
            <textarea id="popup-text-message"
                      placeholder="<?php echo (isset(WA_Bubble_Settings::$options['wa_bubble_whatsapp_placeholder'])) ? esc_attr(WA_Bubble_Settings::$options['wa_bubble_whatsapp_placeholder']) : 'I want more information about your services';  ?>"
            ><?php echo (isset(WA_Bubble_Settings::$options['wa_bubble_whatsapp_default_message'])) ? esc_attr(WA_Bubble_Settings::$options['wa_bubble_whatsapp_default_message']) : '';  ?></textarea>
        </div>
      </div>
      <?php
      $sizeButton = (isset(WA_Bubble_Settings::$options_style['wa_bubble_send_button_size'])) ? esc_attr(WA_Bubble_Settings::$options_style['wa_bubble_send_button_size']) : 'inline';
      $imageWpp = WA_BUBBLE_URL . 'assets/img/whatsapp-blanco.svg';
      ?>
      <div class="wa-bubble whatsapp-popup-footer">
        <a href=""
           data-send="https://api.whatsapp.com/send/?phone=<?php echo (isset(WA_Bubble_Settings::$options['wa_bubble_whatsapp_number'])) ? esc_attr(WA_Bubble_Settings::$options['wa_bubble_whatsapp_number']) : '525555555555';  ?>&text="
           class="popup-submit-button <?php echo strtolower($sizeButton);?>" target="_blank"> <img width="20" src="<?php echo $imageWpp;?>"><?php echo (isset(WA_Bubble_Settings::$options['wa_bubble_whatsapp_submit_button_text_whatsapp'])) ? esc_attr(WA_Bubble_Settings::$options['wa_bubble_whatsapp_submit_button_text_whatsapp']) : 'Send';  ?></a>
      </div>
    </div>
  </div>
  <div class="wa-bubble whatsapp-container-icon ">
    <?php

    $animation = strtolower(WA_Bubble_Settings::$options_style['wa_bubble_animation']);
    $animated ='';
    switch ($animation) {
      case "morph":
        $animated = 'animation-morph';
        break;
      case "pulse":
        $animated = 'animation-pulse';
        break;
      default:
        $animated ='';
        break;
    }
    ?>
    <div class="wa-bubble whatsapp-icon <?php echo $animated; ?> <?php echo (isset(WA_Bubble_Settings::$options_style['wa_bubble_bubble_size'])) ? esc_attr(WA_Bubble_Settings::$options_style['wa_bubble_bubble_size']) : 'medium';  ?>">
      <img class="<?php echo (isset(WA_Bubble_Settings::$options_style['wa_bubble_bubble_size'])) ? esc_attr(WA_Bubble_Settings::$options_style['wa_bubble_bubble_size']) : 'medium';  ?>" src="<?php echo WA_BUBBLE_URL . 'assets/img/whatsapp-blanco.svg'  ?>" alt="whatsapp">
    </div>
  </div>
</div>



