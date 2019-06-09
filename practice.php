<?php

/*
 *
 * PLUGIN NAME: practice
 * PLUGIN URI: rashidcoder.com
 * AUTHOR: Rashid Iqbal
 * Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam corrupti ea, velit minima provident mollitia fugiat aperiam, nemo earum reprehenderit vitae similique nulla obcaecati! Blanditiis, in! Vel possimus cumque modi.
 * LICENSE: MIT
 *
 */

// https://github.com/rashidcoder/practice.git master

class Practice
{
    public function __construct()
    {
        # this books posts line  is just for practice
        add_action('init', [$this, 'bookPost']);
        add_action('wp_enqueue_scripts', [$this, 'loadStyles']);
        add_action('admin_menu', [$this, 'adminMenu']);
    }

    public function bookPost()
    {
        register_post_type('books',
            ['label' => 'Books',
                'public' => true,
                'taxonomies' => ['category', 'post_tag'],
                'show_in_admin_bar' => 'true',
                'can_export' => true]);
    }

    public function loadStyles()
    {
        wp_enqueue_style('colors-css', plugin_dir_url(__FILE__) .
            '/assets/css/colors.css',[],'1.0.0');
    }

    public function adminMenu()
    {
        // add_menu_page( $page_title:string, $menu_title:string, $capability:string, $menu_slug:string, $function:callable, $icon_url:string, $position:integer|null )
        add_menu_page( 'Practice Dashboard', 'Practice Dash', 'manage_options', 
        'books_dash', [$this,'practiceAdmin'], 'dashicons-store', 110 );
    }

    public function practiceAdmin() {
        echo "<b> hello world </b>";
    }

}

if (class_exists("Practice")) {
    $practice = new Practice();
}

require_once plugin_dir_path(__FILE__) . '/inc/ActivatePlugin.php';
require_once plugin_dir_path(__FILE__) . '/inc/DeactivatePlugin.php';

register_activation_hook(__FILE__, [ActivatePlugin, 'activate']);
register_deactivation_hook(__FILE, [DeactivatePlugin, 'deactivate']);
