<?php

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Triggers\Triggers;

class AdminPages extends BaseController
{

    private $settings;
    private $pages = [];
    private $sub_pages = [];

    private $triggers;

    public function __construct()
    {
        $this->settings = new SettingsApi();
        $this->triggers = new Triggers();
        $this->pages = [
            [
                "page_title" => "Practice Dashboard",
                "menu_title" => "Practice Menu",
                "capability" => "manage_options",
                "menu_slug" => "practice",
                "callback" => [$this->triggers, "dashboard"],
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
                "page_title" => "Dashboard",
                "menu_title" => "Dashboard",
                "capability" => "manage_options",
                "menu_slug" => "practice",
                "callback" => [$this->triggers, "dashboard"],
            ],
            ["parent_slug" => "practice",
                "page_title" => "CPT",
                "menu_title" => "Custom Post Types",
                "capability" => "manage_options",
                "menu_slug" => "practice_cpt",
                "callback" => [$this->triggers, "cpt"],
            ],
            ["parent_slug" => "practice",
                "page_title" => "Taxonomies",
                "menu_title" => "Taxonomies",
                "capability" => "manage_options",
                "menu_slug" => "practice_taxonomies",
                "callback" => [$this->triggers, "taxonomies"]],
            ["parent_slug" => "practice",
                "page_title" => "Widgets",
                "menu_title" => "Widgets",
                "capability" => "manage_options",
                "menu_slug" => "practice_widgets",
                "callback" => [$this->triggers, "widgets"]],
        ];

    }

    public function register()
    {

        $this->settings->pages($this->pages, $this->sub_pages);
        $this->settings->register();

        $this->settings->setSections($this->getSections());
        $this->settings->setFields($this->getFields());
        $this->settings->setSettings($this->getSettings());

        // add_action("admin_init", [$this->settings, "createCustomFields"]);
        add_action("admin_init", [$this, "createCustomFields"]);

    }

//  ................................................................

    public function createCustomFields()
    {

        $this->settings->createCustomFields($this->getSections(),$this->getFields(),$this->getSettings());
       
 
    }
 
    public function getSections()
    {

        
        $args = [
            [
                "id" => "practice_section", // Section ID
                "title" => "My Options Title", // Section Title
                "callback" => [$this->triggers, "sections"], // Callback
                "page" => "practice", // What Page?  This makes the section show up on the practice Settings Page
            ],
        ];

        return $args;

    }

    public function getFields()
    {

      

        $args = [

            [
                "id" => "firstName", // Option ID
                "title" => "First Name", // Label
                "callback" => [$this->triggers, "firstName"], // !important - This is where the args go!
                "page" => "practice", // Page it will be displayed
                "section" => "practice_section", // Name of our section (practice Settings)
                "args" => [ // The $args
                    "firstName", // Should match Option ID
                ],
            ],

            [
                "id" => "lastName", // Option ID
                "title" => "Last Name", // Label
                "callback" => [$this->triggers, "firstName"], // !important - This is where the args go!
                "page" => "practice", // Page it will be displayed
                "section" => "practice_section", // Name of our section (practice Settings)
                "args" => [ // The $args
                    "lastName", // Should match Option ID
                ],
            ]

        ];

        return $args;

    }

    public function getSettings()
    {

      

        $args = [
            [
                "option_group" => "practice_group", // Options group
                "option_name" => "firstName", // Option name/database
                "sanitize_callback" => "esc_attr", // sanitize callback function
            ],
            [
                "option_group" => "practice_group", // Options group
                "option_name" => "lastName", // Option name/database
                "sanitize_callback" => "esc_attr", // sanitize callback function
            ]
        ];

        return $args;

    }

}
