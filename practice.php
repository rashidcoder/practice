<?php

/**
 * PLUGIN NAME: Practice
 * PLUGIN URI: begaak.com
 * AUTHOR: Rashid Iqbal
 * AUTHOR URI: rashidcoder.com
 * DESCRIPTION: lore ipsum dore
 * TAGS: ab, bc, cd, de
 */

defined('ABSPATH') or die('you silly human, get yourself back');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Inc\Base\Activate;
use Inc\Base\Deactivate;

function activate()
{
    # code...
    Activate::activate();
}

function deactivate()
{
    # code...
    Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate');
register_deactivation_hook(__FILE__, 'deactivate');

if (class_exists("Inc\\Init")) {
    Inc\Init::register_services();
}

 
