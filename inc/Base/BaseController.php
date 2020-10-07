<?php


namespace Inc\Base;

//клас для створення публічних констант шляхів
class BaseController
{


    public $plugin_path;
    public $plugin_url;
    public $plugin;

    public function __construct() {
        //в класі ми не можемо просто вказувати шлях типу __FILE__ тому використ іншу констр.
        //  (dirname(__FILE__, 2)) 2 рівень вкладеності відносно кореневої директорії плагіну
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin = plugin_basename(dirname(__FILE__, 3) . '/alecaddd-plugin.php');
    }
}

//define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
//define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
//define( 'PLUGIN', plugin_basename( __FILE__ ) );