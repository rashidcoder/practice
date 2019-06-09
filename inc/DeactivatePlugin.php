<?php

class DeactivatePlugin
{
    public function __construct()
    {

    }

    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}
