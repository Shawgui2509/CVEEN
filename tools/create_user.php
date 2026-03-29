<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$email = $argv[1] ?? null;
$password = $argv[2] ?? null;
$role = $argv[3] ?? 'user';

if ($email === null || $password === null) {
    fwrite(STDERR, "Usage: php tools/create_user.php <email> <password> [role]\n");
    exit(1);
}

$uri = getenv('MONGODB_URI');
$dbName = getenv('MONGODB_DATABASE') ?: 'tp_cven';

if (!$uri) {
    fwrite(STDERR, "MONGODB_URI is not configured in environment.\n");
    exit(1);
}

$client = new MongoDB\Client($uri);
$collection = $client->selectDatabase($dbName)->selectCollection('users');

$now = date('Y-m-d H:i:s');
$base = [
    'prenom' => 'Root',
    'nom' => 'Admin',
    'date_naissance' => '1990-01-01',
    'genre' => 'Autre',
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT),
    'updated_at' => $now,
    'role' => $role,
    'essai' => 0,
];

$existing = $collection->findOne(['email' => $email]);

if ($existing !== null) {
    $collection->updateOne(['email' => $email], ['$set' => $base]);
    fwrite(STDOUT, "Updated user {$email} ({$role}).\n");
    exit(0);
}

$idUser = 1;
$cursor = $collection->find([], [
    'sort' => ['id_user' => -1],
    'limit' => 1,
    'projection' => ['id_user' => 1],
]);

foreach ($cursor as $doc) {
    $idUser = ((int) ($doc['id_user'] ?? 0)) + 1;
}

$document = array_merge([
    'id_user' => $idUser,
    'created_at' => $now,
], $base);

$collection->insertOne($document);
fwrite(STDOUT, "Created user {$email} with id_user={$idUser} ({$role}).\n");
