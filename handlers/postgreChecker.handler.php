<?php
require_once __DIR__ . '/../utils/envSetter.util.php';

// Check if PostgreSQL extension is loaded
if (!extension_loaded('pgsql')) {
    echo "❌ PostgreSQL extension not loaded.\n";
    return;
}

$host = $_ENV['PG_HOST'];
$port = $_ENV['PG_PORT'];
$db   = $_ENV['PG_DB'];
$user = $_ENV['PG_USER'];
$pass = $_ENV['PG_PASS'];

$connStr = "host=$host port=$port dbname=$db user=$user password=$pass";
$conn = @pg_connect($connStr);

if ($conn) {
    echo "✅ PostgreSQL Connection successful.\n";
    pg_close($conn);
} else {
    echo "❌ PostgreSQL Connection Failed\n";
}
