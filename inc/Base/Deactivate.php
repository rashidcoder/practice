<?php 

namespace Inc\Base;


class Deactivate
{
    public function __construct()
    {

    }

    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}
