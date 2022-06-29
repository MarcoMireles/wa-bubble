<?php
if (!class_exists('WA_Bubble_Settings')){
  class WA_Bubble_Settings{
    public static $options;

    public function __construct(){
      self::$options = get_option('wa_bubble_options');
      add_action('admin_init',array($this,'admin_init'));
    }

    public function admin_init(){
      register_setting(
        'wa_bubble_group',
        'wa_bubble_options',
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

//      Whatsapp Number
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

//      Select the side of the bubble
      add_settings_field(
        'wa_bubble_bubble_side',
        esc_html__('Which side you want the whatsapp bubble','wa-bubble'),
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
    }

    public function wa_bubble_whatsapp_number_callback($args){
    ?>
      <input type="tel" name="wa_bubble_options[wa_bubble_whatsapp_number]">
    <?php
    }
    public function wa_bubble_bubble_side_callback($args){
    ?>
      <select
        id="wa_bubble_bubble_side"
        name="wa_bubble_options[wa_bubble_bubble_side]">
        <?php
        foreach( $args['items'] as $item ):
          ?>
          <option value="<?php echo esc_attr( $item ); ?>"
            <?php
            isset( self::$options['wa_bubble_bubble_side'] ) ? selected( $item, self::$options['wa_bubble_bubble_side'], true ) : '';
            ?>
          >
            <?php echo esc_html( ucfirst( $item ) ); ?>
          </option>
        <?php endforeach; ?>
      </select>
    <?php
    }
    public function mv_slider_validate( $input ){

    }

  }
}