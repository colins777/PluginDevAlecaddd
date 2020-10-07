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


//use Activate;
//use Deactivate;

function activate_alecaddd_plugin() {
    Inc\Base\Activate::activate();
}

register_activation_hook(__FILE__, 'activate_alecaddd_plugin');


function deactivate_alecaddd_plugin() {
    Inc\Base\Deactivate::deactivate();
}



register_deactivation_hook(__FILE__, 'deactivate_alecaddd_plugin');

if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}