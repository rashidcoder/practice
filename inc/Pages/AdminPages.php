<?php

namespace Inc\Pages;

class AdminPages
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
        $this->page();
    }

    public function page()
    {
        echo '<h1 style="text-align:center">Humpy Dumpy</h1>';
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
