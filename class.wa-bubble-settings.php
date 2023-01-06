<?php
if (!class_exists('WA_Bubble_Settings')){
  class WA_Bubble_Settings{

    public static $options;
    public static $options_style;

    public function __construct(){
      self::$options = get_option('wa_bubble_options');
      self::$options_style = get_option('wa_bubble_options_style');
      add_action('admin_init',array($this,'admin_init'));

//      var_dump(self::$options);
//      var_dump(self::$options_style);
    }

    public function admin_init(){
      register_setting(
        'wa_bubble_group',
        'wa_bubble_options',
        array($this,'wa_bubble_validate')
      );
      register_setting(
        'wa_bubble_group2',
        'wa_bubble_options_style',
        array($this,'wa_bubble_validate')
      );


      add_settings_section(
        'wa_bubble_main_section',
        esc_html__('Whatsapp Functions','wa-bubble'),
        null,
        'wa_bubble_page1'
      );


      add_settings_section(
        'wa_bubble_style_section',
        esc_html__('Whatsapp Styles','wa-bubble'),
        null,
        'wa_bubble_page2'
      );

      // Whatsapp Number
      add_settings_field(
        'wa_bubble_whatsapp_number',
        esc_html__('Enter the whatsapp number','wa-bubble'),
        array($this,'wa_bubble_whatsapp_number_callback'),
        'wa_bubble_page1',
        'wa_bubble_main_section',
        array(
          'label_for' => 'wa_bubble_whatsapp_number'
        )
      );

      // Image for Whatsapp
      add_settings_field(
        'wa_bubble_whatsapp_image_whatsapp',
        esc_html__('Enter the image of whatsapp bubble','wa-bubble'),
        array($this,'wa_bubble_whatsapp_image_whatsapp_callback'),
        'wa_bubble_page1',
        'wa_bubble_main_section',
        array(
          'label_for' => 'wa_bubble_whatsapp_image_whatsapp'
        )
      );

      // Name or title for Whatsapp
      add_settings_field(
        'wa_bubble_whatsapp_name_title_whatsapp',
        esc_html__('Enter the name or title of whatsapp bubble','wa-bubble'),
        array($this,'wa_bubble_whatsapp_name_title_whatsapp_callback'),
        'wa_bubble_page1',
        'wa_bubble_main_section',
        array(
          'label_for' => 'wa_bubble_whatsapp_name_title_whatsapp'
        )
      );

      // Name or title for Whatsapp
      add_settings_field(
        'wa_bubble_whatsapp_description_whatsapp',
        esc_html__('Enter the description of whatsapp bubble','wa-bubble'),
        array($this,'wa_bubble_whatsapp_description_whatsapp_callback'),
        'wa_bubble_page1',
        'wa_bubble_main_section',
        array(
          'label_for' => 'wa_bubble_whatsapp_description_whatsapp'
        )
      );

      // Main message for Whatsapp
      add_settings_field(
        'wa_bubble_whatsapp_main_message_whatsapp',
        esc_html__('Enter the main message of whatsapp','wa-bubble'),
        array($this,'wa_bubble_whatsapp_main_message_whatsapp_callback'),
        'wa_bubble_page1',
        'wa_bubble_main_section',
        array(
          'label_for' => 'wa_bubble_whatsapp_main_message_whatsapp'
        )
      );

      // Placeholder text Whatsapp
      add_settings_field(
        'wa_bubble_whatsapp_placeholder',
        esc_html__('Enter a placeholder text for the whatsapp message','wa-bubble'),
        array($this,'wa_bubble_whatsapp_placeholder_callback'),
        'wa_bubble_page1',
        'wa_bubble_main_section',
        array(
          'label_for' => 'wa_bubble_whatsapp_placeholder'
        )
      );

      // Default message for Whatsapp
      add_settings_field(
        'wa_bubble_whatsapp_default_message',
        esc_html__('Enter a default text for the whatsapp message','wa-bubble'),
        array($this,'wa_bubble_whatsapp_default_message_callback'),
        'wa_bubble_page1',
        'wa_bubble_main_section',
        array(
          'label_for' => 'wa_bubble_whatsapp_default_message'
        )
      );

      // Submit button text for Whatsapp
      add_settings_field(
        'wa_bubble_whatsapp_submit_button_text_whatsapp',
        esc_html__('Enter the submit button text','wa-bubble'),
        array($this,'wa_bubble_whatsapp_submit_button_text_whatsapp_callback'),
        'wa_bubble_page1',
        'wa_bubble_main_section',
        array(
          'label_for' => 'wa_bubble_whatsapp_submit_button_text_whatsapp'
        )
      );

      // Open automatically whatsapp bubble?
      add_settings_field(
        'wa_bubble_bubble_autoshow',
        esc_html__('Open automatically whatsapp bubble','wa-bubble'),
        array($this,'wa_bubble_bubble_autoshow_callback'),
        'wa_bubble_page1',
        'wa_bubble_main_section',
        array(
          'items' => array(
            'No',
            'Yes'
          ),
          'label_for' => 'wa_bubble_bubble_autoshow'
        )
      );

      // Delay time
      add_settings_field(
        'wa_bubble_whatsapp_open_time',
        esc_html__('Delay time','wa-bubble'),
        array($this,'wa_bubble_whatsapp_open_time_callback'),
        'wa_bubble_page1',
        'wa_bubble_main_section',
        array(
          'label_for' => 'wa_bubble_whatsapp_open_time',
          'class' => 'dinamyc-row dinamyc-wa_bubble_whatsapp_open_time'
        )
      );

      // How many times should it be opened
      add_settings_field(
        'wa_bubble_whatsapp_times_open',
        esc_html__('How many times should it be opened?','wa-bubble'),
        array($this,'wa_bubble_whatsapp_times_open_callback'),
        'wa_bubble_page1',
        'wa_bubble_main_section',
        array(
          'label_for' => 'wa_bubble_whatsapp_times_open',
          'class' => 'dinamyc-row dinamyc-wa_bubble_whatsapp_times_open'
        )
      );


      // Do you want to show the name of the agent?
      add_settings_field(
        'wa_bubble_bubble_dyw_name_agent',
        esc_html__('Do you want to show the name of the agent?','wa-bubble'),
        array($this,'wa_bubble_bubble_dyw_name_agent_callback'),
        'wa_bubble_page1',
        'wa_bubble_main_section',
        array(
          'items' => array(
            'Yes',
            'No'
          ),
          'label_for' => 'wa_bubble_bubble_dyw_name_agent'
        )
      );


      // Enter the name to display
      add_settings_field(
        'wa_bubble_name_to_display',
        esc_html__('Enter the name to display','wa-bubble'),
        array($this,'wa_bubble_name_to_display_callback'),
        'wa_bubble_page1',
        'wa_bubble_main_section',
        array(
          'label_for' => 'wa_bubble_name_to_display',
          'class' => 'dinamyc-row dinamyc-wa_bubble_name_to_display'
        )
      );



      // Do you want to show the time
      add_settings_field(
        'wa_bubble_bubble_dyw_show_time',
        esc_html__('Do you want to show the time?','wa-bubble'),
        array($this,'wa_bubble_bubble_dyw_show_time_callback'),
        'wa_bubble_page1',
        'wa_bubble_main_section',
        array(
          'items' => array(
            'Yes',
            'No'
          ),
          'label_for' => 'wa_bubble_bubble_dyw_show_time'
        )
      );



      // Select the side of the bubble
      add_settings_field(
        'wa_bubble_bubble_side',
        esc_html__('Select the side of the whatsapp bubble','wa-bubble'),
        array($this,'wa_bubble_bubble_side_callback'),
        'wa_bubble_page2',
        'wa_bubble_style_section',
        array(
          'items' => array(
            'left',
            'right'
          ),
          'label_for' => 'wa_bubble_bubble_side'
        )
      );

      // Select the size of the bubble
      add_settings_field(
        'wa_bubble_bubble_size',
        esc_html__('Select the size of the WhatsApp bubble','wa-bubble'),
        array($this,'wa_bubble_bubble_size_callback'),
        'wa_bubble_page2',
        'wa_bubble_style_section',
        array(
          'items' => array(
            'small',
            'medium',
            'big'
          ),
          'label_for' => 'wa_bubble_bubble_size'
        )
      );

      // Select the animation of the bubble
      add_settings_field(
        'wa_bubble_animation',
        esc_html__('Animated bubble?','wa-bubble'),
        array($this,'wa_bubble_animation_callback'),
        'wa_bubble_page2',
        'wa_bubble_style_section',
        array(
          'items' => array(
            'morph',
            'pulse'
          ),
          'label_for' => 'wa_bubble_animation_callback'
        )
      );

      // Bottom distance
      add_settings_field(
        'wa_bubble_whatsapp_bottom_position',
        esc_html__('Bottom distance (px)','wa-bubble'),
        array($this,'wa_bubble_whatsapp_bottom_position_callback'),
        'wa_bubble_page2',
        'wa_bubble_style_section',
        array(
          'label_for' => 'wa_bubble_whatsapp_bottom_position'
        )
      );

      // Side distance
      add_settings_field(
        'wa_bubble_whatsapp_side_position',
        esc_html__('Side distance (px)','wa-bubble'),
        array($this,'wa_bubble_whatsapp_side_position_callback'),
        'wa_bubble_page2',
        'wa_bubble_style_section',
        array(
          'label_for' => 'wa_bubble_whatsapp_side_position'
        )
      );

      // z index
      add_settings_field(
        'wa_bubble_whatsapp_zindex',
        esc_html__('Enter the z-index value','wa-bubble'),
        array($this,'wa_bubble_whatsapp_zindex_callback'),
        'wa_bubble_page2',
        'wa_bubble_style_section',
        array(
          'label_for' => 'wa_bubble_whatsapp_zindex'
        )
      );

      // Select the side of the bubble
      add_settings_field(
        'wa_bubble_send_button_size',
        esc_html__('Select the size of the send button','wa-bubble'),
        array($this,'wa_bubble_send_button_size_callback'),
        'wa_bubble_page2',
        'wa_bubble_style_section',
        array(
          'items' => array(
            'inline',
            'full'
          ),
          'label_for' => 'wa_bubble_send_button_size'
        )
      );

    }
    // Whatsapp Number
    public function wa_bubble_whatsapp_number_callback($args){
      ?>
      <input type="tel" name="wa_bubble_options[wa_bubble_whatsapp_number]" id="wa_bubble_whatsapp_number" value="<?php echo isset(self::$options['wa_bubble_whatsapp_number']) ? esc_attr(self::$options['wa_bubble_whatsapp_number']) : ''; ?>" placeholder="525555555555"><br>
      <small>Write your whatsapp including your LADA code without spaces. </small>
      <?php
    }

    // Whatsapp image text
    public function wa_bubble_whatsapp_image_whatsapp_callback($args){
      $image = isset(self::$options['wa_bubble_whatsapp_image_whatsapp']) ? esc_attr(self::$options['wa_bubble_whatsapp_image_whatsapp']) : '';


      if( $image ) {
        ?>

        <a href="#" class="marcode-upl "><img width="60" height="60" src="<?php echo $image; ?>" /> </a>
	      <a href="#" class="marcode-rmv">Remove image</a>
	      <input type="hidden" name="wa_bubble_options[wa_bubble_whatsapp_image_whatsapp]" class="image-url" value="<?php echo $image; ?>">

        <?php
      }else{ ?>
        <a href="#" class="marcode-upl button-upl">Upload image</a>
	      <input type="hidden" class="marcode-img-2 image-url" name="wa_bubble_options[wa_bubble_whatsapp_image_whatsapp]"  value="">
          <a href="#" class="marcode-rmv" style="display:none">Remove image</a>
        <?php
      }
    }

    // Whatsapp name/title text
    public function wa_bubble_whatsapp_name_title_whatsapp_callback($args){
      $text = isset(self::$options['wa_bubble_whatsapp_name_title_whatsapp']) ? esc_attr(self::$options['wa_bubble_whatsapp_name_title_whatsapp']) : '';
      ?>
      <input name="wa_bubble_options[wa_bubble_whatsapp_name_title_whatsapp]" id="wa_bubble_whatsapp_name_title_whatsapp" value="<?php echo $text;?>" />
      <?php
    }

    // Whatsapp description text
    public function wa_bubble_whatsapp_description_whatsapp_callback($args){
      $text = isset(self::$options['wa_bubble_whatsapp_description_whatsapp']) ? esc_attr(self::$options['wa_bubble_whatsapp_description_whatsapp']) : '';
      ?>
      <input name="wa_bubble_options[wa_bubble_whatsapp_description_whatsapp]" id="wa_bubble_whatsapp_description_whatsapp" value="<?php echo $text;?>" />
      <?php
    }

    // Whatsapp main text
    public function wa_bubble_whatsapp_main_message_whatsapp_callback($args){
      ?>
      <textarea name="wa_bubble_options[wa_bubble_whatsapp_main_message_whatsapp]" id="wa_bubble_whatsapp_main_message_whatsapp" cols="40"  rows="5"><?php echo isset(self::$options['wa_bubble_whatsapp_main_message_whatsapp']) ? esc_attr(self::$options['wa_bubble_whatsapp_main_message_whatsapp']) : ''; ?></textarea>
      <?php
    }

    // Whatsapp placeholder text
    public function wa_bubble_whatsapp_placeholder_callback($args){
      ?>
      <textarea name="wa_bubble_options[wa_bubble_whatsapp_placeholder]" id="wa_bubble_whatsapp_placeholder" cols="40"  rows="5"><?php echo isset(self::$options['wa_bubble_whatsapp_placeholder']) ? esc_attr(self::$options['wa_bubble_whatsapp_placeholder']) : ''; ?></textarea>
      <?php
    }

    // Whatsapp default message
    public function wa_bubble_whatsapp_default_message_callback($args){
      ?>
      <textarea name="wa_bubble_options[wa_bubble_whatsapp_default_message]" id="wa_bubble_whatsapp_default_message" cols="40"  rows="5"><?php echo isset(self::$options['wa_bubble_whatsapp_default_message']) ? esc_attr(self::$options['wa_bubble_whatsapp_default_message']) : ''; ?></textarea>
      <?php
    }

    // Whatsapp submit button text
    public function wa_bubble_whatsapp_submit_button_text_whatsapp_callback($args){
      ?>
      <input type="text" name="wa_bubble_options[wa_bubble_whatsapp_submit_button_text_whatsapp]" value="<?php echo isset(self::$options['wa_bubble_whatsapp_submit_button_text_whatsapp']) ? esc_attr(self::$options['wa_bubble_whatsapp_submit_button_text_whatsapp']) : ''; ?>">
      <?php
    }

    // Open automatically whatsapp bubble
    public function wa_bubble_bubble_autoshow_callback($args){
      ?>
      <select id="wa_bubble_bubble_autoshow" name="wa_bubble_options[wa_bubble_bubble_autoshow]">
        <?php
        foreach( $args['items'] as $item ):
          ?>
          <option value="<?php echo esc_attr( $item ); ?>"
            <?php
            isset( self::$options['wa_bubble_bubble_autoshow'] ) ? selected( $item, self::$options['wa_bubble_bubble_autoshow'], true ) : '';
            ?>
          >
            <?php echo esc_html( ucfirst( $item ) ); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php
    }

    // Delay time
    public function wa_bubble_whatsapp_open_time_callback($args){
      ?>
      <div id="container-wa_bubble_whatsapp_open_time" class="box-content">
        <input type="number" name="wa_bubble_options[wa_bubble_whatsapp_open_time]" value="<?php echo isset(self::$options['wa_bubble_whatsapp_open_time']) ? esc_attr(self::$options['wa_bubble_whatsapp_open_time']) : '3500'; ?>" min="100" max="180000"> <span>(milliseconds)</span>
      </div>
      <?php
    }

    // How many times should it be opened?
    public function wa_bubble_whatsapp_times_open_callback($args){
      ?>
      <div id="container-wa_bubble_whatsapp_times_open" class="box-content">
        <input type="number" name="wa_bubble_options[wa_bubble_whatsapp_times_open]" value="<?php echo isset(self::$options['wa_bubble_whatsapp_times_open']) ? esc_attr(self::$options['wa_bubble_whatsapp_times_open']) : '2'; ?>" min="1" max="10">
      </div>
      <?php
    }

    // Do you want to show the name of the agent?
    public function wa_bubble_bubble_dyw_name_agent_callback($args){
      ?>
      <select id="wa_bubble_bubble_dyw_name_agent" name="wa_bubble_options[wa_bubble_bubble_dyw_name_agent]">
        <?php
        foreach( $args['items'] as $item ):
          ?>
          <option value="<?php echo esc_attr( $item ); ?>"
            <?php
            isset( self::$options['wa_bubble_bubble_dyw_name_agent'] ) ? selected( $item, self::$options['wa_bubble_bubble_dyw_name_agent'], true ) : selected( $item,'No', true );
            ?>
          >
            <?php echo esc_html( ucfirst( $item ) ); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php
    }

    // Enter the name to display
    public function wa_bubble_name_to_display_callback($args){
      ?>
      <div id="container-wa_bubble_name_to_display" class="box-content">
        <input type="text" name="wa_bubble_options[wa_bubble_name_to_display]" value="<?php echo isset(self::$options['wa_bubble_name_to_display']) ? esc_attr(self::$options['wa_bubble_name_to_display']) : 'MarCode'; ?>">
      </div>
      <?php
    }


    // Do you want to show the name of the agent?
    public function wa_bubble_bubble_dyw_show_time_callback($args){
      ?>
      <select id="wa_bubble_bubble_dyw_show_time" name="wa_bubble_options[wa_bubble_bubble_dyw_show_time]">
        <?php
        foreach( $args['items'] as $item ):
          ?>
          <option value="<?php echo esc_attr( $item ); ?>"
            <?php
            isset( self::$options['wa_bubble_bubble_dyw_show_time'] ) ? selected( $item, self::$options['wa_bubble_bubble_dyw_show_time'], true ) : 'Yes';
            ?>
          >
            <?php echo esc_html( ucfirst( $item ) ); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php
    }



    // Select the side of the bubble
    public function wa_bubble_bubble_side_callback($args){
      ?>
      <select id="wa_bubble_bubble_side" name="wa_bubble_options_style[wa_bubble_bubble_side]">
        <?php
        foreach( $args['items'] as $item ):
          ?>
          <option value="<?php echo esc_attr( $item ); ?>"
            <?php
            isset( self::$options_style['wa_bubble_bubble_side'] ) ? selected( $item, self::$options_style['wa_bubble_bubble_side'], true ) : '';
            ?>
          >
            <?php echo esc_html( ucfirst( $item ) ); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php
    }

    // Select the size of the bubble
    public function wa_bubble_bubble_size_callback($args){
      ?>
      <select id="wa_bubble_bubble_size" name="wa_bubble_options_style[wa_bubble_bubble_size]">
        <?php
        foreach( $args['items'] as $item ):
          ?>
          <option value="<?php echo esc_attr( $item ); ?>"
            <?php
            isset( self::$options_style['wa_bubble_bubble_size'] ) ? selected( $item, self::$options_style['wa_bubble_bubble_size'], true ) : '';
            ?>
          >
            <?php echo esc_html( ucfirst( $item ) ); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php
    }

    // Select the animation
    public function wa_bubble_animation_callback($args){
      ?>
      <select id="wa_bubble_animation" name="wa_bubble_options_style[wa_bubble_animation]">
        <?php
        foreach( $args['items'] as $item ):
          ?>
          <option value="<?php echo esc_attr( $item ); ?>"
            <?php
            isset( self::$options_style['wa_bubble_animation'] ) ? selected( $item, self::$options_style['wa_bubble_animation'], true ) : '';
            ?>
          >
            <?php echo esc_html( ucfirst( $item ) ); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php
    }


    // Distancia del fondo
    public function wa_bubble_whatsapp_bottom_position_callback($args){
      ?>
      <input type="number" name="wa_bubble_options_style[wa_bubble_whatsapp_bottom_position]" id="wa_bubble_whatsapp_bottom_position" value="<?php echo isset(self::$options_style['wa_bubble_whatsapp_bottom_position']) ? esc_attr(self::$options_style['wa_bubble_whatsapp_bottom_position']) : ''; ?>" max="500" min="0" placeholder="20">
      <?php
    }

    // Distancia del fondo
    public function wa_bubble_whatsapp_side_position_callback($args){
      ?>
      <input type="number" name="wa_bubble_options_style[wa_bubble_whatsapp_side_position]" id="wa_bubble_whatsapp_side_position" value="<?php echo isset(self::$options_style['wa_bubble_whatsapp_side_position']) ? esc_attr(self::$options_style['wa_bubble_whatsapp_side_position']) : ''; ?>" max="500" min="0" placeholder="20">
      <?php
    }

    // z index de la burbuja
    public function wa_bubble_whatsapp_zindex_callback($args){
      ?>
      <input type="number" name="wa_bubble_options_style[wa_bubble_whatsapp_zindex]" id="wa_bubble_whatsapp_side_position" value="<?php echo isset(self::$options_style['wa_bubble_whatsapp_zindex']) ? esc_attr(self::$options_style['wa_bubble_whatsapp_zindex']) : 100; ?>" max="999999" min="1" placeholder="100">
      <span>If the chat bubble is above an element that it shouldn't be, enter a smaller number. If, on the other hand, it is below an element and it is not displayed, increase the number.</span>
      <?php
    }

    // Select the size send button
    public function wa_bubble_send_button_size_callback($args){
      ?>
      <select id="wa_bubble_send_button_size" name="wa_bubble_options_style[wa_bubble_send_button_size]">
        <?php
        foreach( $args['items'] as $item ):
          ?>
          <option value="<?php echo esc_attr( $item ); ?>"
            <?php
            isset( self::$options_style['wa_bubble_send_button_size'] ) ? selected( $item, self::$options_style['wa_bubble_send_button_size'], true ) : '';
            ?>
          >
            <?php echo esc_html( ucfirst( $item ) ); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php
    }



    public function wa_bubble_validate( $input ){
      $new_input = array();
      foreach( $input as $key => $value ){
        switch ($key){

          case 'wa_bubble_whatsapp_number':
            if( empty( $value )){
              add_settings_error( 'wa_bubble_options', 'wa_bubble_message', esc_html__('The whatsapp number field can not be left empty','wa-bubble'), 'error' );
              $value = esc_html__('525555555555','wa-bubble');
            }
            $new_input[$key] = sanitize_text_field( $value );
            break;

          case 'wa_bubble_whatsapp_main_message_whatsapp':
            if( empty( $value )){
              add_settings_error( 'wa_bubble_options', 'wa_bubble_message', esc_html__('Enter a message','wa-bubble'), 'error' );
              $value = esc_html__('Receive information about our services:','wa-bubble');
            }
            $new_input[$key] = sanitize_textarea_field( $value );
            break;

          case 'wa_bubble_whatsapp_image_whatsapp':
            if( empty( $value )){
              $value = WA_BUBBLE_URL . 'assets/img/marcode.png';
            }
            $new_input[$key] = sanitize_url( $value );
            break;

          case 'wa_bubble_whatsapp_name_title_whatsapp':
            if( empty( $value )){
              add_settings_error( 'wa_bubble_options', 'wa_bubble_message', esc_html__('The whatsapp title field can not be left empty','wa-bubble'), 'error' );
              $value = esc_html__('MarCode','wa-bubble');
            }
            $new_input[$key] = sanitize_textarea_field( $value );
            break;

          case 'wa_bubble_whatsapp_description_whatsapp':
            if( empty( $value )){
              add_settings_error( 'wa_bubble_options', 'wa_bubble_message', esc_html__('The whatsapp description field can not be left empty','wa-bubble'), 'error' );
              $value = esc_html__('Typically replies within a day','wa-bubble');
            }
            $new_input[$key] = sanitize_textarea_field( $value );
            break;

          case 'wa_bubble_whatsapp_submit_button_text_whatsapp':
            if( empty( $value )){
              add_settings_error( 'wa_bubble_options', 'wa_bubble_message', esc_html__('Enter a message for the send button','wa-bubble'), 'error' );
              $value = esc_html__('Send message','wa-bubble');
            }
            $new_input[$key] = sanitize_text_field( $value );
            break;

          case 'wa_bubble_whatsapp_placeholder':
          case 'wa_bubble_whatsapp_default_message':
            $new_input[$key] = sanitize_textarea_field( $value );
            break;

          case 'wa_bubble_bubble_dyw_name_agent':
          case 'wa_bubble_bubble_autoshow':
          case 'wa_bubble_bubble_dyw_show_time':
            if( empty( $value )){
              $value = esc_html__('No','wa-bubble');
            }
            $new_input[$key] = sanitize_text_field( $value );
            break;

          case 'wa_bubble_name_to_display':
            if( empty( $value )){
              $value = esc_html__('MarCode','wa-bubble');
            }
            $new_input[$key] = sanitize_text_field( $value );
            break;

          case 'wa_bubble_whatsapp_times_open':
            if( empty( $value )){
              $value = esc_html__(2,'wa-bubble');
            }
            $new_input[$key] = sanitize_text_field( $value );
            break;

          case 'wa_bubble_whatsapp_open_time':
            if( empty( $value )){
              $value = esc_html__(3500,'wa-bubble');
            }
            $new_input[$key] = sanitize_text_field( $value );
            break;


          default:
            $new_input[$key] = sanitize_text_field( $value );
            break;
        }
      }
      return $new_input;
    }

  }
}