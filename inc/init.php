<?php

namespace Inc;

class Init
{
    public function __construct()
    {

    }

    private static function services()
    {
        return [
            Pages\AdminPages::class,
            Base\SettingLinks::class,
            Base\Enqueue::class,
        ];
    }

    public static function register_services()
    {
        $services = self::services();
        foreach ($services as $class) {
            $service = self::instantiante($class);
            # code...
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    public static function instantiante($class)
    {
        $service = new $class();
        return $service;
    }

}
