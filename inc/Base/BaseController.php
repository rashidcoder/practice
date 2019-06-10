<?php
namespace Inc\Base;

class BaseController
{

    public $plugin;
    public $plugin_url;
    public $plugin_path;

    public function __construct()
    {
        $this->plugin = plugin_basename(dirname(__FILE__, 3));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));

        echo $this->plugin;
        echo $this->plugin_url;
        echo $this->plugin_path;
    }
}
