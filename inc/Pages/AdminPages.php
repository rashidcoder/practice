<?php

namespace Inc\Pages;

use Inc\Base\BaseController;

class AdminPages extends BaseController
{

    public function register()
    {
        // add_action('init', [$this, 'bookPost']);
        add_action('admin_menu', [$this, 'adminMenu']);
    }

    public function adminMenu()
    {
        add_menu_page('Practice Dashboard', 'Practice', 'manage_options', 'practice_dash',
            [$this, 'adminPage'], 'dashicons-store', 110);
    }

    public function adminPage()
    {

        include_once $this->plugin_path . 'templates\admin.php';
    }

    // public function bookPost()
    // {
    //     register_post_type('books', ['label' => 'Books',
    //         'public' => true,
    //         'taxonomies' => ['category', 'post_tag'],
    //         'show_in_admin_bar' => true,
    //         'can_export' => true]);
    // }

}


