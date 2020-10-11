<?php
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;
/**
 *
 */
class Admin extends  BaseController
{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();


    public function register() {

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubpages();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    public function setPages () {
        //можливість додавання необмеженої к-ті м-ню в адмінку через масив
        $this->pages = array(
            [
                'page_title' => 'Alecaddd Plugin',
                'menu_title' => 'Alecaddd',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_plugin',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-store',
                'position' => 110
            ],
        );
    }

    public function setSubpages () {
        $this->subpages = array(
            array(
                'parent_slug' => 'alecaddd_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_cpt',
                'callback' => function () { echo '<h1>CPT Manager</h1>';}
            ),
            array(
                'parent_slug' => 'alecaddd_plugin',
                'page_title' => 'Custom Widjets',
                'menu_title' => 'Widjets',
                'capability' => 'manage_widjets',
                'menu_slug' => 'alecaddd__widjets',
                'callback' => function () { echo '<h1>Widjet Manager</h1>';}
            ),

        );
    }


}