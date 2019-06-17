<?php
namespace Inc\Base;

class Enqueue extends BaseController
{
    public function __construct()
    {

    }

    public function register()
    {
        add_action("wp_enqueue_scripts", [$this, "enqueueStyles"]);
        add_action("admin_enqueue_scripts", [$this, "enqueueAdminStyles"]);
    }
    public function enqueueStyles()
    {
        wp_enqueue_style("practice-colors", plugin_dir_url(dirname(__FILE__,2)) . "assets/css/colors.css");
    }

    public function enqueueAdminStyles()
    {
        wp_enqueue_style("practice-admin",plugin_dir_url(dirname(__FILE__,2)) . "assets/css/admin.css");
        wp_enqueue_script("google-charts", "https://www.gstatic.com/charts/loader.js");

    }

}
