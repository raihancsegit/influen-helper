<?php
/*
Plugin Name: Influen Engine
Description: influen Engine is the core plugin for influen WordPress Theme. You must install this plugin to get a full fledge influen WordPress Theme, otherwise you'll miss some cool features.
Author: shifttech
Author URI: https://shifttech.com
Version: 1.0.0
License: GPL2
Text Domain: influen
Domain Path: /languages
*/

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    die( 'No Direct Access' );
}

/*******************************************************************
 * Constants
 *******************************************************************/

/** influen Engine version  */
define( 'INFLUEN_HELPER_VERSION', '1.0.0' );

/** influen Engine directory path  */
define( 'INFLUEN_HELPER_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
/** influen Engine directory path  */

/** influen Engine includes directory path  */
define( 'INFLUEN_HELPER_INCLUDES_DIR', trailingslashit( INFLUEN_HELPER_DIR . 'includes' ) );

define( 'INFLUEN_HELPER_ASSETS_DIR', trailingslashit( INFLUEN_HELPER_DIR . 'assets' ) );

/** influen Engine shortcodes directory path  */
define( 'INFLUEN_HELPER_SHORTCODES_DIR', trailingslashit( INFLUEN_HELPER_DIR . 'shortcodes' ) );

/** influen Engine url  */
define( 'INFLUEN_HELPER_URL', trailingslashit(  plugin_dir_url( __FILE__ ) ) );


class Influen_Helper {

    public function __construct() {
        register_activation_hook( __FILE__, array($this, 'activate') );

        $this->load_includes();

        $this->load_shortcodes();

        add_action( 'plugins_loaded', array($this, 'load_textdomain') );
    }

   

    public function activate() {
        // flash rewrite rules because of custom post type
        flush_rewrite_rules();
    }

    public function load_textdomain() {
        load_plugin_textdomain( 'influen', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

    private function load_includes() {
        // influen icons
        require_once  INFLUEN_HELPER_INCLUDES_DIR . 'icons.php';

        // shortcode base
        require_once  INFLUEN_HELPER_INCLUDES_DIR . 'class.shortcode.php';
        require_once  INFLUEN_HELPER_INCLUDES_DIR . 'class-influen-util.php';

        //  Widget
        //require_once  INFLUEN_HELPER_INCLUDES_DIR . 'widget/contact.php';
        require_once  INFLUEN_HELPER_INCLUDES_DIR . 'widget/about.php';
        require_once  INFLUEN_HELPER_INCLUDES_DIR . 'widget/recent-post.php';
        require_once  INFLUEN_HELPER_INCLUDES_DIR . 'widget/newslatter.php';

        // Filters
        require_once  INFLUEN_HELPER_INCLUDES_DIR . 'functions-filters.php';

        // custom post type
        require_once  INFLUEN_HELPER_INCLUDES_DIR . 'register-custom.php';


        // vc field
        require_once  INFLUEN_HELPER_INCLUDES_DIR . 'class.tb-vc-gdropdown-field.php';


    }

    /**
     * Include all shortcode files
     * @return null
     */
    private function load_shortcodes() {
        foreach ( glob( INFLUEN_HELPER_SHORTCODES_DIR . '*/*.php' ) as $shortcode ) {
            if ( ! file_exists( $shortcode ) ) {
                continue;
            }
            require_once $shortcode;
        }
    }

}

new Influen_Helper;



