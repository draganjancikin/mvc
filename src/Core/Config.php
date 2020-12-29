<?php 
namespace Roloffice\Core;

/**
 * Class that load configuration param from file config/config.php
 * @return string
 */
class Config {
    private static $config;

    public static function get($key, $default = null)
    {
        if (is_null(self::$config)) {
            self::$config = require_once(__DIR__.'/../../config/config.php');
        }

        return !empty(self::$config[$key])?self::$config[$key]:$default;
    }
}