<?php
namespace Inc\Base;

class Enqueue
{
    public function __construct()
    {

    }

    public function register()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueStyles']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueAdminStyles']);
    }
    public function enqueueStyles()
    {
        wp_enqueue_style('practice-colors', plugin_dir_url(__FILE__) . 'assets/css/colors.css', [], '1.0.0');
    }

    public function enqueueAdminStyles()
    {
        wp_enqueue_style('practice-admin', plugin_dir_url(__FILE__) . 'assets/css/admin.css', [], '1.0.0');
    }

}
