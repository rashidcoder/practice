<?php
namespace Inc\Base;

class SettingLinks extends BaseController
{
    public function __construct()
    {

    }

    public function register()
    {
        add_filter('plugin_action_links_' .$this->plugin, [$this, 'actionLinks']);
    }
    public function actionLinks($links)
    {
        $settings = '<a href="#">Settings</a>';
        array_push($links, $settings);
        return $links;
    }
}

