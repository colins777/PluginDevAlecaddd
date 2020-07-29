<?php

/**
 * @package AlecadddPlugin
 * Plugin name: alex-plugin-test
 * Description: This is simple test
 */

defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN', plugin_basename( __FILE__ ) );

if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}