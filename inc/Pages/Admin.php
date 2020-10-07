<?php
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
/**
 *
 */
class Admin extends  BaseController
{
    public $settings;
    public function __construct()
    {
        $this->settings = new SettingsApi();

        //можливість додавання необмеженої к-ті м-ню в адмінку через масив
        $this->pages = array(
            [
                'page_title' => 'Alecaddd Plugin',
                'menu_title' => 'Alecaddd',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_plugin',
                'callback' => function () { echo '<h1>TEST Plugin</h1>';},
                'icon_url' => 'dashicons-store',
                'position' => 110
            ],
            [
                'page_title' => 'TEST Alecaddd Plugin',
                'menu_title' => 'TEST Alecaddd',
                'capability' => 'manage_options',
                'menu_slug' => 'TEST  alecaddd_plugin',
                'callback' => function () { echo '<h1>TEST Plugin</h1>';},
                'icon_url' => 'dashicons-external',
                'position' => 110
            ]
        );
    }

    public function register() {
        //add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
        $this->settings->addPages($this->pages)->register();
    }

//    public function add_admin_pages() {
//        add_menu_page( 'Alecaddd Plugin', 'Alecaddd', 'manage_options', 'alecaddd_plugin', array( $this, 'admin_index' ), 'dashicons-store', 110 );
//    }

    public function admin_index() {
        require_once $this->plugin_path . 'templates/admin.php';
    }
}