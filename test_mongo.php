<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client('mongodb://mongo:27017');
$db = $client->selectDatabase('tp_cven');
$collection = $db->selectCollection('users');

$count = $collection->countDocuments();
echo "Total users in DB: " . $count . "\n";
echo "---\n";

$users = $collection->find()->toArray();
foreach ($users as $user) {
    echo "ID: " . ($user['_id'] ?? 'N/A') . "\n";
    echo "Email: " . ($user['email'] ?? 'N/A') . "\n";
    echo "Prenom: " . ($user['prenom'] ?? 'N/A') . "\n";
    echo "Nom: " . ($user['nom'] ?? 'N/A') . "\n";
    echo "---\n";
}
