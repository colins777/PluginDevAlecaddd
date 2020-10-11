<?php
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Api;

class SettingsApi
{
    public $admin_pages = array();

    public $admin_subpages = array();

    public function register()
    {
        if ( ! empty($this->admin_pages) ) {
            add_action( 'admin_menu', array( $this, 'addAdminMenu' ) );
        }
    }

    public function addPages( array $pages )
    {
        $this->admin_pages = $pages;

        return $this;
    }

    public function withSubPage( string $title = null )
    {
        if ( empty($this->admin_pages) ) {
            return $this;
        }

        $admin_page = $this->admin_pages[0];

        $subpage = array(
            array(
                'parent_slug' => $admin_page['menu_slug'],
                'page_title' => $admin_page['page_title'],
                'menu_title' => ($title) ? $title : $admin_page['menu_title'],
                'capability' => $admin_page['capability'],
                'menu_slug' => $admin_page['menu_slug'],
                'callback' => $admin_page['callback']
            )
        );

        $this->admin_subpages = $subpage;

        return $this;
    }

    public function addSubPages( array $pages )
    {
        $this->admin_subpages = array_merge( $this->admin_subpages, $pages );

        return $this;
    }

    public function addAdminMenu()
    {
        foreach ( $this->admin_pages as $page ) {
            add_menu_page( $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position'] );
        }

        foreach ( $this->admin_subpages as $page ) {
            add_submenu_page( $page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'] );
        }
    }

    public function registerCustomFields ()
    {
        //for register 1 field we need 3 diferrent actions
        //register setting
        register_setting( $setting["option_group"], $setting["option_name"], ( isset( $setting["callback"] ) ? $setting["callback"] : ''));

        // add settings section
        add_settings_section( $section["id"], $section["title"], ( isset( $section["callback"] ) ? $section["callback"] : ''), $section["page"] );

        // add settings field
        add_settings_field($field["id"], $field["title"], ( isset( $field["callback"] ) ? $field["callback"] : ''), $field["page"], $field["section"], ( isset( $field["args"] ) ? $field["args"] : '') );

    }
}