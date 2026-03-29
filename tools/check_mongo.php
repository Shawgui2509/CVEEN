<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$uri = getenv('MONGODB_URI');
$dbName = getenv('MONGODB_DATABASE') ?: 'tp_cven';

if (! $uri) {
    fwrite(STDERR, "MONGODB_URI missing\n");
    exit(1);
}

try {
    $client = new MongoDB\Client($uri);
    $db = $client->selectDatabase($dbName);

    $count = 0;
    foreach ($db->listCollections() as $collection) {
        $count++;
    }

    echo "OK db={$dbName} collections={$count}\n";
} catch (Throwable $e) {
    fwrite(STDERR, 'ERROR: ' . $e->getMessage() . "\n");
    exit(1);
}
