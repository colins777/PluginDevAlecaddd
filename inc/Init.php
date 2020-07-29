<?php
/**
 * @package  AlecadddPlugin
 */
namespace Inc;

final class Init
{
    /**
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function get_services()
    {

        //підключаємо всі необхідні класи для активації через масив
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class
        ];
    }

    /**
     * Loop through the classes, initialize them,
     * and call the register() method if it exists
     * @return
     */
    public static function register_services()
    {
        foreach ( self::get_services() as $class ) {
            $service = self::instantiate( $class );
            if ( method_exists( $service, 'register' ) ) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class
     * @param  class $class    class from the services array
     * @return class instance  new instance of the class
     */
    private static function instantiate( $class )
    {
        $service = new $class();

        return $service;
    }
}

//class AlecadddPlugin

//    public $plugin;
//
//    //ф-я __construct() викликається негайно при ініціалізації нового класу
//    function __construct() {
//        $this->plugin = plugin_basename(__FILE__);
//    }
//
//    public function register () {
//        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
//
//        //add to admin mnu
//        add_action('admin_menu', array($this, 'add_admin_pages'));
//
//        add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
//    }
//
//    //ф-я отримує масив значент всіх лінків в лпагіні і передаємо аргумент ф-ї
//    public  function settings_link ($links) {
//        //створ нове посилання на налашт плагіна і закидуємо в масив лінків, вертаємо новий масив
//
//        $settings_link = '<a href="admin.php?page=alecaddd_plugin">Settings</a>';
//        array_push($links, $settings_link);
//        return $links;
//    }
//
//    public function add_admin_pages () {
//        add_menu_page('Alecaddd Plugin', 'Alecaddd', 'manage_options', 'alecaddd_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
//
//    }
//
//    public function admin_index() {
//        require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
//    }
//
////    protected function create_post_type () {
////        add_action('init', array($this, 'custom_post_type_books'));
////    }
//
//
//    function deactivate () {
//        //echo 'The plugin was deactivated';
//        flush_rewrite_rules();
//    }
//
//
//    function custom_post_type_books () {
//        register_post_type('book', ['public' => 'true', 'labels' => array(
//            'name' => 'Books',
//            'singular_name' => 'Book'
//        ),
//            'rewrite' => array('slug' => 'book'),
//            'show_in_rest' => true,
//            'show_in_menu' => true
//        ]);
//    }
//
//    function enqueue () {
//        //enque all our scripts
//
//        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
//        wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
//    }
//
//
//    function activate() {
//        require_once plugin_dir_path(__FILE__) . 'inc/Base/AlecaddActivate.php';
//        AlecaddActivate::activate();
//    }
//
//
//}
//
//
//$allecadddPlugin = new AlecadddPlugin(); //class initialization
//$allecadddPlugin->register();
//
//
////activation
//register_activation_hook(__FILE__, array($allecadddPlugin, 'AlecaddActivate'));
//
//
////deactivation
//require_once plugin_dir_path(__FILE__) . 'inc/Base/Deactivate.php';
//register_deactivation_hook('Deactivate', 'deactivate');
//
//
//require_once plugin_dir_path(__FILE__) . 'inc/Admin/AdminPages.php';
//
//
//}