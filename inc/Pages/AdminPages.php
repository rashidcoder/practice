<?php

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;

class AdminPages extends BaseController
{

    public $settingsApi;
    public function __construct()
    {
        $this->settingsApi = new SettingsApi();
    }

    public function register()
    {
        $pages = [
            [
                'page_title' => 'Practice',
                'menu_title' => 'Practice',
                'capability' => 'manage_options',
                'menu_slug' => 'practice',
                'callback' => function () {echo "hello world";},
                'icon_url' => 'dashicons-store',
                'position' => 110,
            ],
            [
                'page_title' => 'Practice Test',
                'menu_title' => 'Practice Test',
                'capability' => 'manage_options',
                'menu_slug' => 'practice_2',
                'callback' => function () {echo "hello world";},
                'icon_url' => 'dashicons-external',
                'position' => 111,
            ],
        ];

        $this->settingsApi->addPages($pages)->register();
    }

    // public function bookPost()
    // {
    //     register_post_type('books', ['label' => 'Books',
    //         'public' => true,
    //         'taxonomies' => ['category', 'post_tag'],
    //         'show_in_admin_bar' => true,
    //         'can_export' => true]);
    // }

}
