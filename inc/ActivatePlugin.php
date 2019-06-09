<?php

class ActivatePlugin
{
    public function __construct()
    {

    }

    public static function activate()
    {
        flush_rewrite_rules();
    }
}
