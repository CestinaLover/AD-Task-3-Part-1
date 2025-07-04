<?php
require_once __DIR__ . '/../utils/envSetter.util.php';

$mongoUri = $_ENV['MONGO_URI'];
$dbName = $_ENV['MONGO_DB'];

try {
    $client = new MongoDB\Client($mongoUri);
    $client->selectDatabase($dbName)->command(['ping' => 1]);
    echo "✅ Connected to MongoDB successfully.\n";
} catch (Exception $e) {
    echo "❌ MongoDB connection failed: " . $e->getMessage() . "\n";
}
