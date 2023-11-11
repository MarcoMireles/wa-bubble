<?php

/**
 * Plugin Name: Bubble Chat
 * Plugin URI: https://marcode.site/plugin/bubble-chat/
 * Description: Bubble Chat is a whatsapp chat bubble. Floating bubble for your visitors to contact you more easily and quickly.
 * Tags: Bubble chat, click to chat, whatsapp chat
 * Version: 3.1
 * Requires at least: 5.6
 * Tested up to: 6.4
 * Requires PHP: 7.0
 * Author: Marco Mireles
 * Author URI: https://marcomireles.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wa-bubble
 * Domain Path: /languages
 */
/*
Bubble Chat is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Bubble Chat is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Bubble Chat. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( !class_exists( 'WA_Bubble' )){

	class WA_Bubble{

		public function __construct(){

			$this->define_constants();
      $this->load_textdomain();

      require_once (WA_BUBBLE_PATH.'functions/functions.php');

			add_action('admin_menu',array($this,'add_menu'));
      require_once (WA_BUBBLE_PATH . 'class.wa-bubble-settings.php');
      $WA_Bubble_Settings = new WA_Bubble_Settings();

      require_once (WA_BUBBLE_PATH . 'class.wa-bubble-whatsapp-bubble.php');
      $WA_Bubble_Whatsapp_Bubble = new WA_Bubble_Whatsapp_Bubble();

      add_action('wp_enqueue_scripts',array($this,'register_scripts'),999);
      add_action('admin_enqueue_scripts', array($this,'register_admin_scripts'), 999);
      add_action('plugin_row_meta', array($this,'filter_plugin_row_meta'),10,4);

		}

		public function define_constants(){
            // Path/URL to root of this plugin, with trailing slash.
			define ( 'WA_BUBBLE_PATH', plugin_dir_path( __FILE__ ) );
      define ( 'WA_BUBBLE_URL', plugin_dir_url( __FILE__ ) );
      define ( 'WA_BUBBLE_VERSION', '3.1' );
		}

		public function add_menu(){
       add_menu_page(
		    esc_html__('Bubble Chat Options','wa-bubble'),
		    'Wa Bubble',
        'manage_options',
        'wa_bubble_admin',
        array($this,'wa_bubble_settings_page'),
        'dashicons-whatsapp',
        20
      );
		}
    public function wa_bubble_settings_page(){
      if (!current_user_can('manage_options')){
        return;
      }
      if (isset($_GET['settings-updated'])){
        add_settings_error('wa_bubble_options','wa_bubble_message',esc_html__('Settings Saved','wa-bubble'),'success');
      }
      settings_errors('wa_bubble_options');
      require_once (WA_BUBBLE_PATH . 'views/settings-page.php');
    }
    public function register_scripts(){
		  //wp_register_script('wa-bubble-main-js',WA_BUBBLE_URL.'vendor/js/frontend.js',array('jquery'),WA_BUBBLE_VERSION,true);
		  wp_register_style('wa-bubble-main-css',WA_BUBBLE_URL . 'assets/css/frontend.css',array(),WA_BUBBLE_VERSION,'all');
		  wp_register_style('font-roboto','https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap',array(),WA_BUBBLE_VERSION,'all');
    }

    public function register_admin_scripts($hook){

      if( $hook == 'toplevel_page_wa_bubble_admin'){

        wp_enqueue_script('wa-bubble_adminjs', WA_BUBBLE_URL .'vendor/js/style.js', array('jquery'), 1.0, true );
        wp_enqueue_script('select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array(), WA_BUBBLE_VERSION, false );

        wp_enqueue_style( 'wa-bubble-admin', WA_BUBBLE_URL . 'assets/css/admin.css',array(),WA_BUBBLE_VERSION,'all' );
        wp_register_style('font-poppins','https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap',array(),WA_BUBBLE_VERSION,'all');
        wp_enqueue_style( 'select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',array(),WA_BUBBLE_VERSION,'all' );

        if ( ! did_action( 'wp_enqueue_media' ) ) {
          wp_enqueue_media();
        }
      }
    }


    public function load_textdomain(){
      load_plugin_textdomain(
        'wa-bubble',
        false,
        dirname(plugin_dir_path(__FILE__)).'/languages',
      );
    }

        /**
         * Activate the plugin
         */
        public static function activate(){
            update_option('rewrite_rules', '' );

        }

        /**
         * Deactivate the plugin
         */
        public static function deactivate(){
            flush_rewrite_rules();
        }        

        /**
         * Uninstall the plugin
         */
        public static function uninstall(){
          delete_option('wa_bubble_options');
        }


    public function filter_plugin_row_meta( $links_array, $plugin_file_name, $plugin_data, $status )
    {

      if (strpos($plugin_file_name, basename(__FILE__))) {
        // You can still use `array_unshift()` to add links at the beginning.
        $links_array[] = '<a href="https://paypal.me/marcodeoficial?country.x=MX&locale.x=es_XC">Donate 🍺</a>';
      }
      return $links_array;
    }


  }
}

// Plugin Instantiation
if (class_exists( 'WA_Bubble' )){

    // Installation and uninstallation hooks
    register_activation_hook( __FILE__, array( 'WA_Bubble', 'activate'));
    register_deactivation_hook( __FILE__, array( 'WA_Bubble', 'deactivate'));
    register_uninstall_hook( __FILE__, array( 'WA_Bubble', 'uninstall' ) );

    // Instatiate the plugin class
    $wa_bubble = new WA_Bubble();
}