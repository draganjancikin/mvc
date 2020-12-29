<?php namespace Roloffice\Model;

use Roloffice\Core\Config;

class ClientsModel
{
    private static $DATA = [];

    public static function all()
    {
        return self::$DATA;
    }

    public static function add($client)
    {
        $client->id = count(self::$DATA) + 1;
        self::$DATA[] = $client;
        self::save();
        return $client;
    }

    public static function findById(int $id)
    {
        foreach (self::$DATA as $client) {
            if ($client->id === $id) {
                return $client;
            }
        }
        return [];
    }

    public static function load()
    {
        $DB_PATH = Config::get('DB_PATH', __DIR__ . '/../../db.json');
        self::$DATA = json_decode(file_get_contents($DB_PATH));
    }

    public static function save()
    {
        $DB_PATH = Config::get('DB_PATH', __DIR__ . '/../../db.json');
        file_put_contents($DB_PATH, json_encode(self::$DATA, JSON_PRETTY_PRINT));
    }
}