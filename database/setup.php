<?php
require_once __DIR__ . '/../utils/envSetter.util.php';

// Database setup script
function setupDatabase() {
    $host = $_ENV['PG_HOST'];
    $port = $_ENV['PG_PORT'];
    $db   = $_ENV['PG_DB'];
    $user = $_ENV['PG_USER'];
    $pass = $_ENV['PG_PASS'];

    $connStr = "host=$host port=$port dbname=$db user=$user password=$pass";
    $conn = @pg_connect($connStr);

    if (!$conn) {
        echo "❌ Failed to connect to PostgreSQL database\n";
        return false;
    }

    echo "✅ Connected to PostgreSQL database\n";

    // Read and execute the setup SQL file
    $sqlFile = __DIR__ . '/setup.sql';
    if (!file_exists($sqlFile)) {
        echo "❌ SQL setup file not found: $sqlFile\n";
        return false;
    }

    $sql = file_get_contents($sqlFile);
    $result = pg_query($conn, $sql);

    if ($result) {
        echo "✅ Database tables created successfully\n";
        echo "✅ Sample data inserted\n";
        
        // Show created tables
        $tablesQuery = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'";
        $tablesResult = pg_query($conn, $tablesQuery);
        
        echo "\n📋 Created tables:\n";
        while ($row = pg_fetch_array($tablesResult, null, PGSQL_ASSOC)) {
            echo "  - " . $row['table_name'] . "\n";
        }
        
    } else {
        echo "❌ Failed to create database tables: " . pg_last_error($conn) . "\n";
    }

    pg_close($conn);
    return $result !== false;
}

// Run the setup
if (setupDatabase()) {
    echo "\n🎉 Database setup completed successfully!\n";
} else {
    echo "\n❌ Database setup failed!\n";
}
?>
