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
        esc_html__('Enter a placeholder text','wa-bubble'),
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

    }
    // Whatsapp Number
    public function wa_bubble_whatsapp_number_callback($args){
      ?>
      <input type="tel" name="wa_bubble_options[wa_bubble_whatsapp_number]" id="wa_bubble_whatsapp_number" value="<?php echo isset(self::$options['wa_bubble_whatsapp_number']) ? esc_attr(self::$options['wa_bubble_whatsapp_number']) : ''; ?>">
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
              add_settings_error( 'wa_bubble_options', 'wa_bubble_message', esc_html__('The whatsapp number field can not be left empty','wa-bubble'), 'error' );
              $value = esc_html__('Contact me by whatsapp','wa-bubble');
            }
            $new_input[$key] = sanitize_textarea_field( $value );
            break;

          case 'wa_bubble_whatsapp_placeholder':
            if( empty( $value )){
              add_settings_error( 'wa_bubble_options', 'wa_bubble_message', esc_html__('The whatsapp number field can not be left empty','wa-bubble'), 'error' );
              $value = esc_html__('I want more information','wa-bubble');
            }
            $new_input[$key] = sanitize_textarea_field( $value );
            break;

          case 'wa_bubble_whatsapp_default_message':
            if( empty( $value )){
              add_settings_error( 'wa_bubble_options', 'wa_bubble_message', esc_html__('The whatsapp message field can not be left empty','wa-bubble'), 'error' );
              $value = esc_html__('I want more information','wa-bubble');
            }
            $new_input[$key] = sanitize_textarea_field( $value );
            break;

          case 'wa_bubble_whatsapp_submit_button_text_whatsapp':
            if( empty( $value )){
              add_settings_error( 'wa_bubble_options', 'wa_bubble_message', esc_html__('The whatsapp number field can not be left empty','wa-bubble'), 'error' );
              $value = esc_html__('Send','wa-bubble');
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