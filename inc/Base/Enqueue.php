<?php
namespace Inc\Base;

class Enqueue extends BaseController
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
        wp_enqueue_style('practice-colors', $this->plugin_url . 'assets/css/colors.css', [], '1.0.0');
    }

    public function enqueueAdminStyles()
    {
        wp_enqueue_style('practice-admin', $this->plugin_url . 'assets/css/admin.css', [], '1.0.0');
    }

}
