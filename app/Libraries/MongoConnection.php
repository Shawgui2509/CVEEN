<?php

namespace App\Libraries;

use RuntimeException;

class MongoConnection
{
    private static $client;

    public static function client()
    {
        if (! extension_loaded('mongodb') || ! class_exists('MongoDB\\Driver\\Manager'))
        {
            throw new RuntimeException('MongoDB extension is not loaded for this PHP runtime. Use Docker (docker compose up -d --build) or enable ext-mongodb in your local PHP.');
        }

        if (! class_exists('MongoDB\\Client'))
        {
            throw new RuntimeException('MongoDB PHP library is missing. Install mongodb/mongodb and enable ext-mongodb in PHP.');
        }

        if (self::$client === null)
        {
            $uri = getenv('MONGODB_URI') ?: getenv('database.mongodb.uri');

            if (! $uri)
            {
                throw new RuntimeException('MONGODB_URI is not configured. Add it to your environment or .env file.');
            }

            self::$client = new \MongoDB\Client($uri);
        }

        return self::$client;
    }

    public static function database()
    {
        $dbName = getenv('MONGODB_DATABASE') ?: getenv('database.mongodb.database') ?: 'tp_cven';
        return self::client()->selectDatabase($dbName);
    }
}
