<?php
if (!class_exists('WA_Bubble_Settings')){
  class WA_Bubble_Settings{

    public static $options;
    public static $options_style;
    public static $page_conditions;

    public function __construct(){
      self::$options = get_option('wa_bubble_options');
      self::$options_style = get_option('wa_bubble_options_style');
      self::$page_conditions = get_option('wa_bubble_page_conditions');
      add_action('admin_init',array($this,'admin_init'));
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
      register_setting(
        'wa_bubble_group3',
        'wa_bubble_page_conditions',
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

      add_settings_section(
        'wa_bubble_page_conditions_section',
        esc_html__('Page Conditions','wa-bubble'),
        null,
        'wa_bubble_page3'
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

      // Bottom distance mobile
      add_settings_field(
        'wa_bubble_whatsapp_bottom_position_mobile',
        esc_html__('Bottom distance on mobile (px)','wa-bubble'),
        array($this,'wa_bubble_whatsapp_bottom_position_mobile_callback'),
        'wa_bubble_page2',
        'wa_bubble_style_section',
        array(
          'label_for' => 'wa_bubble_whatsapp_bottom_position_mobile'
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

      // Side distance Mobile
      add_settings_field(
        'wa_bubble_whatsapp_side_position_mobile',
        esc_html__('Side distance on mobile (px)','wa-bubble'),
        array($this,'wa_bubble_whatsapp_side_position_mobile_callback'),
        'wa_bubble_page2',
        'wa_bubble_style_section',
        array(
          'label_for' => 'wa_bubble_whatsapp_side_position_mobile'
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
      // Do you want to active Page Conditions
      add_settings_field(
        'wa_bubble_page_conditions_active',
        esc_html__('Do you want to active page conditions?','wa-bubble'),
        array($this,'wa_bubble_page_conditions_active_callback'),
        'wa_bubble_page3',
        'wa_bubble_page_conditions_section',
        array(
          'items' => array(
            'Yes',
            'No'
          ),
          'label_for' => 'wa_bubble_page_conditions_active'
        )
      );
//      // Do you want to show or hide / Page Conditions
      add_settings_field(
        'wa_bubble_page_show_or_hide',
        esc_html__('Do you want to show or hide?','wa-bubble'),
        array($this,'wa_bubble_page_show_or_hide_callback'),
        'wa_bubble_page3',
        'wa_bubble_page_conditions_section',
        array(
          'items' => array(
            esc_html__('Show','wa-bubble'),
            esc_html__('Hide','wa-bubble')
          ),
          'label_for' => 'wa_bubble_page_show_or_hide'
        )
      );

      // In which pages do you want to / Page Conditions
      add_settings_field(
        'wa_bubble_select_page_show_or_hide',
        esc_html__('In which pages do you want to ?','wa-bubble'),
        array($this,'wa_bubble_select_page_show_or_hide_callback'),
        'wa_bubble_page3',
        'wa_bubble_page_conditions_section',
        array(
          'label_for' => 'wa_bubble_select_page_show_or_hide'
        )
      );


      if ( class_exists( 'WooCommerce' ) && is_plugin_active( 'woocommerce/woocommerce.php' )) {

        // Product page
        add_settings_field(
          'wa_bubble_woocoomerce_product_page',
          esc_html__('Product page','wa-bubble'),
          array($this,'wa_bubble_woocoomerce_product_page_callback'),
          'wa_bubble_page3',
          'wa_bubble_page_conditions_section',
          array(
            'label_for' => 'wa_bubble_woocoomerce_product_page'
          )
        );

        // Shop Page / Woocommerce
        add_settings_field(
          'wa_bubble_woocoomerce_shop_page',
          esc_html__('Shop pages / Product category','wa-bubble'),
          array($this,'wa_bubble_woocoomerce_shop_page_callback'),
          'wa_bubble_page3',
          'wa_bubble_page_conditions_section',
          array(
            'label_for' => 'wa_bubble_woocoomerce_shop_page'
          )
        );

        // Cart Page / Woocommerce
        add_settings_field(
          'wa_bubble_woocoomerce_cart_page',
          esc_html__('Cart page','wa-bubble'),
          array($this,'wa_bubble_woocoomerce_cart_page_callback'),
          'wa_bubble_page3',
          'wa_bubble_page_conditions_section',
          array(
            'label_for' => 'wa_bubble_woocoomerce_cart_page'
          )
        );

        // Checkout Page / Woocommerce
        add_settings_field(
          'wa_bubble_woocoomerce_checkout_page',
          esc_html__('Checkout page','wa-bubble'),
          array($this,'wa_bubble_woocoomerce_checkout_page_callback'),
          'wa_bubble_page3',
          'wa_bubble_page_conditions_section',
          array(
            'label_for' => 'wa_bubble_woocoomerce_checkout_page'
          )
        );

        // My Account Page / Woocommerce
        add_settings_field(
          'wa_bubble_woocoomerce_my_account_page',
          esc_html__('My account page','wa-bubble'),
          array($this,'wa_bubble_woocoomerce_my_account_page_callback'),
          'wa_bubble_page3',
          'wa_bubble_page_conditions_section',
          array(
            'label_for' => 'wa_bubble_woocoomerce_my_account_page'
          )
        );
      }

    }

    /**
     *
     * STYLE SECTION
     *
     */

    // Callback para el número de Whatsapp
    public function wa_bubble_whatsapp_number_callback($args) {
      ?>
      <input type="tel" name="wa_bubble_options[wa_bubble_whatsapp_number]" id="wa_bubble_whatsapp_number" value="<?php echo isset(self::$options['wa_bubble_whatsapp_number']) ? esc_attr(self::$options['wa_bubble_whatsapp_number']) : ''; ?>" placeholder="525555555555"><br>
      <small><?php echo esc_html('Write your WhatsApp number, including your country code without spaces.'); ?></small>
      <?php
    }

    // Callback para la imagen de Whatsapp
    public function wa_bubble_whatsapp_image_whatsapp_callback($args) {
      $image = isset(self::$options['wa_bubble_whatsapp_image_whatsapp']) ? esc_attr(self::$options['wa_bubble_whatsapp_image_whatsapp']) : '';

      if ($image) {
        ?>
        <a href="#" class="marcode-upl"><img width="60" height="60" src="<?php echo $image; ?>" /> </a>
        <a href="#" class="marcode-rmv"><?php echo esc_html('Remove image'); ?></a>
        <input type="hidden" name="wa_bubble_options[wa_bubble_whatsapp_image_whatsapp]" class="image-url" value="<?php echo $image; ?>">
        <?php
      } else {
        ?>
        <a href="#" class="marcode-upl button-upl"><?php echo esc_html('Upload image'); ?></a>
        <input type="hidden" class="marcode-img-2 image-url" name="wa_bubble_options[wa_bubble_whatsapp_image_whatsapp]" value="">
        <a href="#" class="marcode-rmv" style="display:none"><?php echo esc_html('Remove image'); ?></a>
        <?php
      }
    }

    // Callback para el nombre/título de Whatsapp
    public function wa_bubble_whatsapp_name_title_whatsapp_callback($args) {
      $text = isset(self::$options['wa_bubble_whatsapp_name_title_whatsapp']) ? esc_attr(self::$options['wa_bubble_whatsapp_name_title_whatsapp']) : '';
      ?>
      <input name="wa_bubble_options[wa_bubble_whatsapp_name_title_whatsapp]" id="wa_bubble_whatsapp_name_title_whatsapp" value="<?php echo $text; ?>" />
      <?php
    }

    // Callback para la descripción de Whatsapp
    public function wa_bubble_whatsapp_description_whatsapp_callback($args) {
      $text = isset(self::$options['wa_bubble_whatsapp_description_whatsapp']) ? esc_attr(self::$options['wa_bubble_whatsapp_description_whatsapp']) : '';
      ?>
      <input name="wa_bubble_options[wa_bubble_whatsapp_description_whatsapp]" id="wa_bubble_whatsapp_description_whatsapp" value="<?php echo $text; ?>" />
      <?php
    }

    // Callback para el mensaje principal de Whatsapp
    public function wa_bubble_whatsapp_main_message_whatsapp_callback($args) {
      ?>
      <textarea name="wa_bubble_options[wa_bubble_whatsapp_main_message_whatsapp]" id="wa_bubble_whatsapp_main_message_whatsapp" cols="40"  rows="5"><?php echo isset(self::$options['wa_bubble_whatsapp_main_message_whatsapp']) ? esc_attr(self::$options['wa_bubble_whatsapp_main_message_whatsapp']) : ''; ?></textarea>
      <?php
    }

    // Callback para el marcador de posición de Whatsapp
    public function wa_bubble_whatsapp_placeholder_callback($args) {
      ?>
      <textarea name="wa_bubble_options[wa_bubble_whatsapp_placeholder]" id="wa_bubble_whatsapp_placeholder" cols="40"  rows="5"><?php echo isset(self::$options['wa_bubble_whatsapp_placeholder']) ? esc_attr(self::$options['wa_bubble_whatsapp_placeholder']) : ''; ?></textarea>
      <?php
    }

    // Callback para el mensaje predeterminado de Whatsapp
    public function wa_bubble_whatsapp_default_message_callback($args) {
      ?>
      <textarea name="wa_bubble_options[wa_bubble_whatsapp_default_message]" id="wa_bubble_whatsapp_default_message" cols="40"  rows="5"><?php echo isset(self::$options['wa_bubble_whatsapp_default_message']) ? esc_attr(self::$options['wa_bubble_whatsapp_default_message']) : ''; ?></textarea>
      <?php
    }

    // Callback para el texto del botón de enviar en Whatsapp
    public function wa_bubble_whatsapp_submit_button_text_whatsapp_callback($args) {
      ?>
      <input type="text" name="wa_bubble_options[wa_bubble_whatsapp_submit_button_text_whatsapp]" value="<?php echo isset(self::$options['wa_bubble_whatsapp_submit_button_text_whatsapp']) ? esc_attr(self::$options['wa_bubble_whatsapp_submit_button_text_whatsapp']) : ''; ?>">
      <?php
    }

    // Callback para mostrar automáticamente la burbuja de Whatsapp
    public function wa_bubble_bubble_autoshow_callback($args) {
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

    // Callback para el tiempo de retardo
    public function wa_bubble_whatsapp_open_time_callback($args) {
      ?>
      <!-- Contenedor para el tiempo de retardo -->
      <div id="container-wa_bubble_whatsapp_open_time" class="box-content">
        <input type="number" name="wa_bubble_options[wa_bubble_whatsapp_open_time]" value="<?php echo isset(self::$options['wa_bubble_whatsapp_open_time']) ? esc_attr(self::$options['wa_bubble_whatsapp_open_time']) : '3500'; ?>" min="100" max="180000"> <span>(milisegundos)</span>
      </div>
      <?php
    }

    // Callback para la cantidad de veces que se debe abrir
    public function wa_bubble_whatsapp_times_open_callback($args) {
      ?>
      <!-- Contenedor para la cantidad de veces que se debe abrir -->
      <div id="container-wa_bubble_whatsapp_times_open" class="box-content">
        <input type="number" name="wa_bubble_options[wa_bubble_whatsapp_times_open]" value="<?php echo isset(self::$options['wa_bubble_whatsapp_times_open']) ? esc_attr(self::$options['wa_bubble_whatsapp_times_open']) : '2'; ?>" min="1" max="10">
      </div>
      <?php
    }

    // Callback para mostrar el nombre del agente
    public function wa_bubble_bubble_dyw_name_agent_callback($args) {
      ?>
      <!-- Selección para mostrar el nombre del agente -->
      <select id="wa_bubble_bubble_dyw_name_agent" name="wa_bubble_options[wa_bubble_bubble_dyw_name_agent]">
        <?php foreach ($args['items'] as $item): ?>
          <option value="<?php echo esc_attr($item); ?>" <?php isset(self::$options['wa_bubble_bubble_dyw_name_agent']) ? selected($item, self::$options['wa_bubble_bubble_dyw_name_agent'], true) : selected($item, 'No', true); ?>>
            <?php echo esc_html(ucfirst($item)); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php
    }

    // Callback para ingresar el nombre a mostrar
    public function wa_bubble_name_to_display_callback($args) {
      ?>
      <!-- Contenedor para el nombre a mostrar -->
      <div id="container-wa_bubble_name_to_display" class="box-content">
        <input type="text" name="wa_bubble_options[wa_bubble_name_to_display]" value="<?php echo isset(self::$options['wa_bubble_name_to_display']) ? esc_attr(self::$options['wa_bubble_name_to_display']) : 'MarCode'; ?>">
      </div>
      <?php
    }

    // Callback para mostrar el tiempo
    public function wa_bubble_bubble_dyw_show_time_callback($args) {
      ?>
      <!-- Selección para mostrar el tiempo -->
      <select id="wa_bubble_bubble_dyw_show_time" name="wa_bubble_options[wa_bubble_bubble_dyw_show_time]">
        <?php foreach ($args['items'] as $item): ?>
          <option value="<?php echo esc_attr($item); ?>" <?php isset(self::$options['wa_bubble_bubble_dyw_show_time']) ? selected($item, self::$options['wa_bubble_bubble_dyw_show_time'], true) : selected($item, 'Yes', true); ?>>
            <?php echo esc_html(ucfirst($item)); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php
    }

    /**
     *
     * STYLE SECTION
     *
     */

    // Callback para seleccionar el lado de la burbuja
    public function wa_bubble_bubble_side_callback($args) {
      ?>
      <!-- Selección para el lado de la burbuja -->
      <select id="wa_bubble_bubble_side" name="wa_bubble_options_style[wa_bubble_bubble_side]">
        <?php foreach ($args['items'] as $item): ?>
          <option value="<?php echo esc_attr($item); ?>" <?php isset(self::$options_style['wa_bubble_bubble_side']) ? selected($item, self::$options_style['wa_bubble_bubble_side'], true) : ''; ?>>
            <?php echo esc_html(ucfirst($item)); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php
    }

    // Callback para seleccionar el tamaño de la burbuja
    public function wa_bubble_bubble_size_callback($args) {
      ?>
      <!-- Selección para el tamaño de la burbuja -->
      <select id="wa_bubble_bubble_size" name="wa_bubble_options_style[wa_bubble_bubble_size]">
        <?php foreach ($args['items'] as $item): ?>
          <option value="<?php echo esc_attr($item); ?>" <?php isset(self::$options_style['wa_bubble_bubble_size']) ? selected($item, self::$options_style['wa_bubble_bubble_size'], true) : ''; ?>>
            <?php echo esc_html(ucfirst($item)); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php
    }

    // Callback para seleccionar la animación
    public function wa_bubble_animation_callback($args) {
      ?>
      <!-- Selección para la animación -->
      <select id="wa_bubble_animation" name="wa_bubble_options_style[wa_bubble_animation]">
        <?php foreach ($args['items'] as $item): ?>
          <option value="<?php echo esc_attr($item); ?>" <?php isset(self::$options_style['wa_bubble_animation']) ? selected($item, self::$options_style['wa_bubble_animation'], true) : ''; ?>>
            <?php echo esc_html(ucfirst($item)); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php
    }

    // Callback para la distancia del fondo
    public function wa_bubble_whatsapp_bottom_position_callback($args) {
      ?>
      <!-- Input para la distancia del fondo -->
      <input type="number" name="wa_bubble_options_style[wa_bubble_whatsapp_bottom_position]" id="wa_bubble_whatsapp_bottom_position" value="<?php echo isset(self::$options_style['wa_bubble_whatsapp_bottom_position']) ? esc_attr(self::$options_style['wa_bubble_whatsapp_bottom_position']) : ''; ?>" max="500" min="0" placeholder="20">
      <?php
    }

    // Callback para la distancia del fondo
    public function wa_bubble_whatsapp_bottom_position_mobile_callback($args) {
      ?>
      <!-- Input para la distancia del fondo -->
      <input type="number" name="wa_bubble_options_style[wa_bubble_whatsapp_bottom_position_mobile]" id="wa_bubble_whatsapp_bottom_position_mobile" value="<?php echo isset(self::$options_style['wa_bubble_whatsapp_bottom_position_mobile']) ? esc_attr(self::$options_style['wa_bubble_whatsapp_bottom_position_mobile']) : ''; ?>" max="500" min="0" placeholder="20">
      <?php
    }

    // Callback para la distancia lateral
    public function wa_bubble_whatsapp_side_position_callback($args) {
      ?>
      <!-- Input para la distancia lateral -->
      <input type="number" name="wa_bubble_options_style[wa_bubble_whatsapp_side_position]" id="wa_bubble_whatsapp_side_position" value="<?php echo isset(self::$options_style['wa_bubble_whatsapp_side_position']) ? esc_attr(self::$options_style['wa_bubble_whatsapp_side_position']) : ''; ?>" max="500" min="0" placeholder="20">
      <?php
    }

    // Callback para la distancia lateral Mobile
    public function wa_bubble_whatsapp_side_position_mobile_callback($args) {
      ?>
      <!-- Input para la distancia lateral -->
      <input type="number" name="wa_bubble_options_style[wa_bubble_whatsapp_side_position_mobile]" id="wa_bubble_whatsapp_side_position_mobile" value="<?php echo isset(self::$options_style['wa_bubble_whatsapp_side_position_mobile']) ? esc_attr(self::$options_style['wa_bubble_whatsapp_side_position_mobile']) : ''; ?>" max="500" min="0" placeholder="20">
      <?php
    }

    // Callback para el índice z de la burbuja
    public function wa_bubble_whatsapp_zindex_callback($args) {
      ?>
      <!-- Input para el índice z de la burbuja -->
      <input type="number" name="wa_bubble_options_style[wa_bubble_whatsapp_zindex]" id="wa_bubble_whatsapp_zindex" value="<?php echo isset(self::$options_style['wa_bubble_whatsapp_zindex']) ? esc_attr(self::$options_style['wa_bubble_whatsapp_zindex']) : 100; ?>" max="999999" min="1" placeholder="100">
      <span>If the chat bubble is above an element that it shouldn't be, enter a smaller number. If, on the other hand, it is below an element and it is not displayed, increase the number.</span>
      <?php
    }

    // Callback para seleccionar el tamaño del botón de envío
    public function wa_bubble_send_button_size_callback($args) {
      ?>
      <!-- Selección para el tamaño del botón de envío -->
      <select id="wa_bubble_send_button_size" name="wa_bubble_options_style[wa_bubble_send_button_size]">
        <?php foreach ($args['items'] as $item): ?>
          <option value="<?php echo esc_attr($item); ?>" <?php isset(self::$options_style['wa_bubble_send_button_size']) ? selected($item, self::$options_style['wa_bubble_send_button_size'], true) : ''; ?>>
            <?php echo esc_html(ucfirst($item)); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php
    }

    /**
     *
     * CONDITIONS SECTION
     *
     */

    // Callback para activar o desactivar las condiciones de la página
    public function wa_bubble_page_conditions_active_callback($args){
      ?>
      <!-- Selección para activar o desactivar condiciones de página -->
      <select id="wa_bubble_page_conditions_active" name="wa_bubble_page_conditions[wa_bubble_page_conditions_active]">
        <?php foreach ($args['items'] as $item): ?>
          <option value="<?php echo esc_attr($item); ?>" <?php echo isset(self::$page_conditions['wa_bubble_page_conditions_active']) && self::$page_conditions['wa_bubble_page_conditions_active'] == $item ? 'selected' : ''; ?>>
            <?php echo esc_html(ucfirst($item)); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php
    }

    // Callback para mostrar u ocultar en las condiciones de la página
    public function wa_bubble_page_show_or_hide_callback($args){
      ?>
      <!-- Selección para mostrar u ocultar en las condiciones de la página -->
      <select id="wa_bubble_page_show_or_hide" name="wa_bubble_page_conditions[wa_bubble_page_show_or_hide]">
        <?php foreach ($args['items'] as $item): ?>
          <option value="<?php echo esc_attr($item); ?>" <?php isset(self::$page_conditions['wa_bubble_page_show_or_hide']) ? selected($item, self::$page_conditions['wa_bubble_page_show_or_hide'], true) : 'Show'; ?>>
            <?php echo esc_html(ucfirst($item)); ?>
          </option>
        <?php endforeach; ?>
      </select><br>
      <small><?php echo esc_html('The value you select will apply to all pages including WooCommerce pages.', 'wa-bubble'); ?></small>
      <?php
    }

    // Callback para la selección de páginas para mostrar u ocultar
    public function wa_bubble_select_page_show_or_hide_callback($args){
      // Obtener IDs de las páginas de WooCommerce
      $shop_page_id = get_option('woocommerce_shop_page_id');
      $my_account_page_id = get_option('woocommerce_myaccount_page_id');
      $cart_page_id = get_option('woocommerce_cart_page_id');
      $checkout_page_id = get_option('woocommerce_checkout_page_id');

      // Obtener IDs de las páginas si no están configuradas en WooCommerce
      if (!$shop_page_id) {
        $shop_page = get_page_by_path('shop');
        if ($shop_page) {
          $shop_page_id = $shop_page->ID;
        }
      }

      if (!$my_account_page_id) {
        $my_account_page = get_page_by_path('my-account');
        if ($my_account_page) {
          $my_account_page_id = $my_account_page->ID;
        }
      }

      if (!$cart_page_id) {
        $cart_page = get_page_by_path('cart');
        if ($cart_page) {
          $cart_page_id = $cart_page->ID;
        }
      }

      if (!$checkout_page_id) {
        $checkout_page = get_page_by_path('checkout');
        if ($checkout_page) {
          $checkout_page_id = $checkout_page->ID;
        }
      }

      // Obtener las páginas
      $pages = get_pages(array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'exclude' => array($shop_page_id, $my_account_page_id, $cart_page_id, $checkout_page_id),
        'fields' => 'ids',
      ));

      // Crear un arreglo de títulos y IDs
      $titles_and_slugs = array();
      foreach ($pages as $page) {
        $titles_and_slugs[] = array(
          'title' => $page->post_title,
          'id' => $page->ID,
        );
      }

      // Obtener las páginas seleccionadas previamente
      $selected_pages = self::$page_conditions['wa_bubble_select_page_show_or_hide'];
      $arrayPages = !empty($selected_pages) ? json_decode($selected_pages, true) : array();

      ?>
      <!-- Select múltiple para las páginas -->
      <select id="pages_conditions" multiple="multiple">
        <?php foreach ($titles_and_slugs as $item): ?>
          <option value="<?php echo esc_attr($item['id']); ?>" <?php echo in_array($item['id'], $arrayPages) ? 'selected' : ''; ?>>
            <?php echo esc_html(ucfirst($item['title'])); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <!-- Mensajes explicativos -->
      <small><?php echo esc_html('If you selected:', 'wa-bubble'); ?></small>
      <br>
      <small><?php echo esc_html('Show: Leave the field blank if you want it to apply to all pages.', 'wa-bubble'); ?></small>
      <br>
      <small><?php echo esc_html('Hide: Leave it blank if you want to show it on all pages or select the pages where you want to hide it', 'wa-bubble'); ?></small>
      <!-- Campo oculto para almacenar las páginas seleccionadas -->
      <input hidden type="text" name="wa_bubble_page_conditions[wa_bubble_select_page_show_or_hide]" id="wa_bubble_select_page_show_or_hide" value="<?php echo esc_attr($selected_pages); ?>" >
      <?php
    }

    // Callback común para las páginas de WooCommerce
    private function woocommerce_page_callback($page_key, $label) {
      $page_value = self::$page_conditions[$page_key];
      ?>
      <input type="checkbox" class="chck_woo"
             name="wa_bubble_page_conditions[<?php echo esc_attr($page_key); ?>]"
             id="wa_bubble_<?php echo esc_attr($page_key); ?>"
        <?php echo ($page_value == 'on') ? 'checked' : ''; ?>
      >
      <label for="wa_bubble_<?php echo esc_attr($page_key); ?>"><?php echo esc_html($label); ?></label>
      <?php
    }

    // Páginas específicas de WooCommerce
    public function wa_bubble_woocoomerce_product_page_callback($args) {
      $this->woocommerce_page_callback('wa_bubble_woocoomerce_product_page', 'Product Page');
    }

    public function wa_bubble_woocoomerce_shop_page_callback($args) {
      $this->woocommerce_page_callback('wa_bubble_woocoomerce_shop_page', 'Shop Page');
    }

    public function wa_bubble_woocoomerce_cart_page_callback($args) {
      $this->woocommerce_page_callback('wa_bubble_woocoomerce_cart_page', 'Cart Page');
    }

    public function wa_bubble_woocoomerce_checkout_page_callback($args) {
      $this->woocommerce_page_callback('wa_bubble_woocoomerce_checkout_page', 'Checkout Page');
    }

    public function wa_bubble_woocoomerce_my_account_page_callback($args) {
      $this->woocommerce_page_callback('wa_bubble_woocoomerce_my_account_page', 'My Account Page');
    }

    // VALIDATE
    public function wa_bubble_validate( $input ) {
      $new_input = array();

      foreach( $input as $key => $value ) {
        switch ( $key ) {
          case 'wa_bubble_whatsapp_number':
            $value = $this->validate_empty_field( $value, esc_html__('The WhatsApp number field cannot be left empty','wa-bubble'), esc_html__('525555555555','wa-bubble') );
            $new_input[$key] = sanitize_text_field( $value );
            break;

          case 'wa_bubble_whatsapp_main_message_whatsapp':
            $value = $this->validate_empty_field( $value, esc_html__('Enter a message','wa-bubble'), esc_html__('Receive information about our services:','wa-bubble') );
            $new_input[$key] = sanitize_textarea_field( $value );
            break;

          case 'wa_bubble_whatsapp_image_whatsapp':
            $value = empty( $value ) ? WA_BUBBLE_URL . 'assets/img/marcode.png' : $value;
            $new_input[$key] = sanitize_url( $value );
            break;

          case 'wa_bubble_whatsapp_name_title_whatsapp':
            $value = $this->validate_empty_field( $value, esc_html__('The WhatsApp title field cannot be left empty','wa-bubble'), esc_html__('MarCode','wa-bubble') );
            $new_input[$key] = sanitize_textarea_field( $value );
            break;

          case 'wa_bubble_whatsapp_description_whatsapp':
            $value = $this->validate_empty_field( $value, esc_html__('The WhatsApp description field cannot be left empty','wa-bubble'), esc_html__('Typically replies within a day','wa-bubble') );
            $new_input[$key] = sanitize_textarea_field( $value );
            break;

          case 'wa_bubble_whatsapp_submit_button_text_whatsapp':
            $value = $this->validate_empty_field( $value, esc_html__('Enter a message for the send button','wa-bubble'), esc_html__('Send message','wa-bubble') );
            $new_input[$key] = sanitize_text_field( $value );
            break;

          // ... (otros casos)

          default:
            $new_input[$key] = sanitize_text_field( $value );
            break;
        }
      }

      return $new_input;
    }

// Función auxiliar para validar campos vacíos
    private function validate_empty_field( $value, $error_message, $default_value ) {
      if( empty( $value ) ) {
        add_settings_error( 'wa_bubble_options', 'wa_bubble_message', $error_message, 'error' );
        $value = $default_value;
      }

      return $value;
    }

  }
}