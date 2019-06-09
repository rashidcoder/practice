<?php

/*
 *
 * PLUGIN NAME: practice
 * PLUGIN URI: rashidcoder.com
 * AUTHOR: Rashid Iqbal
 * Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam corrupti ea, velit minima provident mollitia fugiat aperiam, nemo earum reprehenderit vitae similique nulla obcaecati! Blanditiis, in! Vel possimus cumque modi.
 * LICENSE: MIT
 *
 */

class Practice
{
    public function __construct()
    {
        add_action('init', [$this, 'bookPost']);
    }
    public function activate()
    {
        flush_rewrite_rules();
    }
    public function deactivate()
    {
        flush_rewrite_rules();
    }

    public function bookPost()
    {
        register_post_type('books',
            ['label' => 'Books',
                'public' => true,
                'taxonomies' => ['category', 'post_tag'],
                'show_in_admin_bar' => 'true'
                , 'can_export' => true]);
    }
}

if (class_exists("Practice")) {
    $practice = new Practice();
}

if (class_exists('Practice')) {
    $practice = new Practice();
}

register_activation_hook(__FILE__, [$practice, 'activate']);
register_deactivation_hook(__FILE, [$practice, 'deactivate']);
