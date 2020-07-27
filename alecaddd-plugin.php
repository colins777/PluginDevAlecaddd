<?php

/**
 * @package AlecadddPlugin
 * Plugin name: alex-plugin-test
 * Description: This is simple test
 */

if (! defined('ABSPATH')) {
    die;
}

/*the same method*/

//if (! function_exists('add_action')) {
//    echo 'Hey you can\'t access!';
//    exit;
//}

//add_action("admin_menu", "wpl_list_table_menu");
if (!class_exists('AlecadddPlugin')) {

class AlecadddPlugin
{


    public $plugin;

        //ф-я __construct() викликається негайно при ініціалізації нового класу
    function __construct() {
        $this->plugin = plugin_basename(__FILE__);
    }

  public function register () {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));

        //add to admin mnu
        add_action('admin_menu', array($this, 'add_admin_pages'));

        add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
    }

    //ф-я отримує масив значент всіх лінків в лпагіні і передаємо аргумент ф-ї
    public  function settings_link ($links) {
        //створ нове посилання на налашт плагіна і закидуємо в масив лінків, вертаємо новий масив

        $settings_link = '<a href="admin.php?page=alecaddd_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }

    public function add_admin_pages () {
        add_menu_page('Alecaddd Plugin', 'Alecaddd', 'manage_options', 'alecaddd_plugin', array($this, 'admin_index'), 'dashicons-store', 110);

    }

        public function admin_index() {
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }

//    protected function create_post_type () {
//        add_action('init', array($this, 'custom_post_type_books'));
//    }


    function deactivate () {
        //echo 'The plugin was deactivated';
        flush_rewrite_rules();
    }


    function custom_post_type_books () {
        register_post_type('book', ['public' => 'true', 'labels' => array(
            'name' => 'Books',
            'singular_name' => 'Book'
        ),
            'rewrite' => array('slug' => 'book'),
            'show_in_rest' => true,
            'show_in_menu' => true
            ]);
    }

    function enqueue () {
        //enque all our scripts

        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
    }


    function activate() {
        require_once plugin_dir_path(__FILE__) . 'inc/Base/AlecaddActivate.php';
        AlecaddActivate::activate();
    }


}


   $allecadddPlugin = new AlecadddPlugin(); //class initialization
   $allecadddPlugin->register();


//activation
register_activation_hook(__FILE__, array($allecadddPlugin, 'AlecaddActivate'));


//deactivation
require_once plugin_dir_path(__FILE__) . 'inc/Base/Deactivate.php';
register_deactivation_hook('Deactivate', 'deactivate');


require_once plugin_dir_path(__FILE__) . 'inc/Admin/AdminPages.php';


}