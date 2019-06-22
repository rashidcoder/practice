<?php
namespace Inc\Api;

use Inc\Triggers\Triggers;

class SettingsApi
{

    public $admin_pages = [];
    public $admin_sub_pages = [];
    public $settings = [];
    public $sections = [];
    public $fields = [];

    private $triggers;
    public function __construct()
    {
        $this->triggers = new Triggers();
        # code...
    }

    public function pages(array $pages, array $sub_pages)
    {
        $this->admin_pages = $pages;
        $this->admin_sub_pages = $sub_pages;
    }
    public function register()
    {
        if (!empty($this->admin_pages)) {
            add_action('admin_menu', [$this, 'addMenu']);
        }

    }

    public function addMenu()
    {

        if (!empty($this->admin_pages)) {
            $this->addPages();
        }
    }

    public function addPages()
    {

        foreach ($this->admin_pages as $page) {
            add_menu_page(
                $page['page_title'],
                $page['menu_title'],
                $page['capability'],
                $page['menu_slug'],
                $page['callback'],
                $page['icon'],
                $page['position']
            );

        }

        foreach ($this->admin_sub_pages as $sub_page) {
            add_submenu_page('practice', $sub_page['page_title'], $sub_page['menu_title'],
                $sub_page['capability'], $sub_page['menu_slug'], $sub_page['callback']);

        }

    }

    public function setSettings(array $args)
    {
        $this->settings = $args;
        return $this;
    }

    public function setSections(array $args)
    {
        $this->sections = $args;
        return $this;
    }

    public function setFields(array $args)
    {
        $this->fields = $args;
        return $this;
    }

    public function createCustomFields($sections, $fields, $settings)
    {
        foreach ($sections as $section) {
            add_settings_section(
                $section['id'],
                $section['title'],
                $section['callback'],
                $section['page']
            );
        }

        foreach ($fields as $field) { 
            add_settings_field(  
                $field['id'], $field['title'],
                $field['callback'], $field['page'],
                $field['section'], $field['args']
            );
        }
        foreach ($settings as $setting) { 
            register_setting(
                $setting["option_group"],
                $setting["option_name"],
                (isset($setting['sanitize_callback']) ? $setting['sanitize_callback'] : '')
            );
        }
      
    }
 

}
