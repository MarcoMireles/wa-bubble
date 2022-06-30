<?php

/**
* Plugin Name: Wa Bubble
* Plugin URI:
* Description: Whatsapp bubble. Floating bubble for your visitors to contact you more easily and quickly.
* Version: 1.0
* Requires at least: 5.6
* Requires PHP: 7.0
* Author: Marco Mireles
* Author URI: https://marcomireles.com/
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: wa-bubble
* Domain Path: /languages
*/
/*
Wa Bubble is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Wa Bubble is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Wa Bubble. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( !class_exists( 'WA_Bubble' )){

	class WA_Bubble{

		public function __construct(){

			$this->define_constants();

			add_action('admin_menu',array($this,'add_menu'));
      require_once (WA_BUBBLE_PATH . 'class.wa-bubble-settings.php');
      $WA_Bubble_Settings = new WA_Bubble_Settings();

      require_once (WA_BUBBLE_PATH . 'class.wa-bubble-whatsapp-bubble.php');
      $WA_Bubble_Whatsapp_Bubble = new WA_Bubble_Whatsapp_Bubble();

      add_action('wp_enqueue_scripts',array($this,'register_scripts'),999);

		}

		public function define_constants(){
            // Path/URL to root of this plugin, with trailing slash.
			define ( 'WA_BUBBLE_PATH', plugin_dir_path( __FILE__ ) );
      define ( 'WA_BUBBLE_URL', plugin_dir_url( __FILE__ ) );
      define ( 'WA_BUBBLE_VERSION', '1.0.0' );
		}

		public function add_menu(){
		  add_menu_page(
		    esc_html__('Wa Bubble Options','wa-bubble'),
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
		  wp_register_script('wa-bubble-main-js',WA_BUBBLE_URL.'vendor/js/frontend.js',array('jquery'),WA_BUBBLE_VERSION,true);
		  wp_register_style('wa-bubble-main-css',WA_BUBBLE_URL . 'assets/css/frontend.css',array(),WA_BUBBLE_VERSION,'all');wp_register_style('font-roboto','https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap',array(),WA_BUBBLE_VERSION,'all');
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