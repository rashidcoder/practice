<?php
namespace Inc\Api;

class SettingsApi
{

    public $admin_pages = [];
    public $admin_sub_pages = [];

    public function pages(array $pages, array $sub_pages)
    {
        $this->admin_pages = $pages;
        $this->admin_sub_pages = $sub_pages;
    }
    public function register()
    {
        add_action('admin_menu', [$this, 'addMenu']);
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
}
