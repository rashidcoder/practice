<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

$posts = get_posts(['post_type' => 'books', 'numberposts' => -1]);

foreach ($posts as $post) {
    wp_delete_post($post->ID, true);
}
