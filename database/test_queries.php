<?php
require_once __DIR__ . '/../utils/envSetter.util.php';

// Example database queries
function testDatabaseQueries() {
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

    echo "✅ Connected to PostgreSQL database\n\n";

    // Query 1: Get all users
    echo "👥 All Users:\n";
    $result = pg_query($conn, "SELECT id, username, email, first_name, last_name, role FROM users");
    while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "  - {$row['first_name']} {$row['last_name']} ({$row['username']}) - {$row['role']}\n";
    }

    // Query 2: Get all projects with their creators
    echo "\n📋 All Projects:\n";
    $result = pg_query($conn, "
        SELECT p.id, p.name, p.description, p.status, u.username as created_by 
        FROM projects p 
        JOIN users u ON p.created_by = u.id
    ");
    while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "  - {$row['name']} (Status: {$row['status']}) - Created by: {$row['created_by']}\n";
    }

    // Query 3: Get project assignments
    echo "\n🔗 Project Assignments:\n";
    $result = pg_query($conn, "
        SELECT p.name as project_name, u.username, pu.role 
        FROM project_users pu 
        JOIN projects p ON pu.project_id = p.id 
        JOIN users u ON pu.user_id = u.id
    ");
    while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "  - {$row['username']} is {$row['role']} on '{$row['project_name']}'\n";
    }

    // Query 4: Get tasks with assignments
    echo "\n📝 Tasks:\n";
    $result = pg_query($conn, "
        SELECT t.title, t.status, t.priority, p.name as project_name, u.username as assigned_to 
        FROM tasks t 
        JOIN projects p ON t.project_id = p.id 
        LEFT JOIN users u ON t.assigned_to = u.id
    ");
    while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        $assigned = $row['assigned_to'] ? $row['assigned_to'] : 'Unassigned';
        echo "  - {$row['title']} ({$row['status']}, {$row['priority']}) - Project: {$row['project_name']}, Assigned to: {$assigned}\n";
    }

    pg_close($conn);
    return true;
}

// Run the test queries
if (testDatabaseQueries()) {
    echo "\n🎉 Database queries completed successfully!\n";
} else {
    echo "\n❌ Database queries failed!\n";
}
?>
