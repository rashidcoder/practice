<?php

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;

class AdminPages extends BaseController
{

    private $settings;
    private $pages = [];
    private $sub_pages = [];

    public function __construct()
    {
        $this->settings = new SettingsApi();
        $this->pages = [
            [
                "page_title" => "Practice Page",
                "menu_title" => "Practice Menu",
                "capability" => "manage_options",
                "menu_slug" => "practice",
                "callback" => function () {echo "humpy dumpy";},
                "icon" => "dashicons-external",
                "position" => 110,
            ],
            [
                "page_title" => "Practice Page",
                "menu_title" => "Practice Options",
                "capability" => "manage_options",
                "menu_slug" => "practice_dash_2",
                "callback" => function () {echo "humpy dumpy";},
                "icon" => "dashicons-store",
                "position" => 111,
            ],
        ];

        $this->sub_pages = [
            ["parent_slug" => "practice",
                "page_title" => "CPT",
                "menu_title" => "Custom Post Types",
                "capability" => "manage_options",
                "menu_slug" => "practice_cpt",
                "callback", function () {echo "CPT";}],
            ["parent_slug" => "practice",
                "page_title" => "Taxonomies",
                "menu_title" => "Taxonomies",
                "capability" => "manage_options",
                "menu_slug" => "pratice_taxonomies",
                "callback", function () {echo "Taxonomies";}],
            ["parent_slug" => "practice",
                "page_title" => "Widgets",
                "menu_title" => "Widgets",
                "capability" => "manage_options",
                "menu_slug" => "pratice_widgets",
                "callback", function () {echo "Widgets";}],
        ];

    }

    public function register()
    {

        $this->settings->pages($this->pages,$this->sub_pages);
        $this->settings->register();
    }

}
