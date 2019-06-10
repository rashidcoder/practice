<?php
namespace Inc\Base;

class SettingLinks
{
    public function __construct()
    {

    }

    public function register()
    {
        add_filter('plugin_action_links_' . plugin_basename(__FILE__), [$this, 'actionLinks']);
    }
    public function actionLinks($links)
    {
        $settings = '<a href="#">Settings</a>';
        array_push($links, $settings);
        return $links;
    }
}
