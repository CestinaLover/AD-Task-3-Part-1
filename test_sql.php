<?php
require_once __DIR__ . '/utils/envSetter.util.php';

// Test SQL models
function testSQLModels() {
    $host = $_ENV['PG_HOST'];
    $port = $_ENV['PG_PORT'];
    $db   = $_ENV['PG_DB'];
    $user = $_ENV['PG_USER'];
    $pass = $_ENV['PG_PASS'];

    $connStr = "host=$host port=$port dbname=$db user=$user password=$pass";
    $conn = @pg_connect($connStr);

    if (!$conn) {
        echo "❌ Failed to connect to PostgreSQL\n";
        return false;
    }

    echo "✅ Connected to PostgreSQL\n";

    // Array of SQL files to execute
    $sqlFiles = [
        'database/users.model.sql',
        'database/projects.model.sql', 
        'database/project_users.model.sql',
        'database/tasks.model.sql'
    ];

    foreach ($sqlFiles as $file) {
        if (!file_exists($file)) {
            echo "❌ File not found: $file\n";
            continue;
        }

        $sql = file_get_contents($file);
        $result = pg_query($conn, $sql);
        
        if ($result) {
            echo "✅ Executed: $file\n";
        } else {
            echo "❌ Failed to execute: $file - " . pg_last_error($conn) . "\n";
        }
    }

    // Check what tables were created
    $result = pg_query($conn, "SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'");
    echo "\nTables in database:\n";
    while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "  - " . $row['table_name'] . "\n";
    }

    pg_close($conn);
    return true;
}

testSQLModels();
?>
