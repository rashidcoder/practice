<?php

/**
 * PLUGIN NAME: Practice
 * PLUGIN URI: begaak.com
 * AUTHOR: Rashid Iqbal
 * AUTHOR URI: rashidcoder.com
 * DESCRIPTION: lore ipsum dore
 * TAGS: ab, bc, cd, de
 */

class Practice
{

    public $plugin_name;
    public $plugin_url;
    public $plugin_path;

    public function __construct()
    {
        $plugin_url = plugin_dir_url(__FILE__);
        $plugin_path = plugin_dir_path(__FILE__);
        $plugin_name = plugin_basename( __FILE__ );

        add_action('init', [$this, 'bookPost']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueStyles']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueAdminStyles']);
        add_action('admin_menu', [$this, 'adminMenu']);
        add_filter( 'plugin_action_links_'.$plugin_name, [$this,'actionLinks']);
    }

    public function bookPost()
    {
        register_post_type('books', ['label' => 'Books',
            'public' => true,
            'taxonomies' => ['category', 'post_tag'],
            'show_in_admin_bar' => true,
            'can_export' => true]);
    }

    public function enqueueStyles()
    {
        wp_enqueue_style('colors-css', $this->plugin_url . '/assets/css/colors.css', [], '1.0.0');
    }

    public function enqueueAdminStyles()
    {
        wp_enqueue_style('admin-css', $this->plugin_url . '/assets/css/admin.css', [], '1.0.0');
    }

    public function adminMenu()
    {
        add_menu_page('Practice Dashboard', 'Practice', 'manage_options', 'practice_dash',
            [$this, 'adminPage'], 'dashicons-store', 110);
    }

    public function adminPage()
    {
        // include_once plugin_dir_path(__FILE__) . '/templates/admin.php';
        include_once plugin_dir_path(__FILE__).'/templates/admin.php';


    }

    public function actionLinks($links) {
        $settings = '<a href="#">Settings</a>';
        array_push($links,$settings);
        return $links;
    } 

    public function activate()
    {
        flush_rewrite_rules();
    }
    public function deactivate()
    {
        flush_rewrite_rules();
    }
}

if (class_exists('Practice')) {
    $practice = new Practice();
}

register_activation_hook(__FILE__, [$practice, 'activate']);
register_deactivation_hook(__FILE__, [$practice, 'deactivate']);
