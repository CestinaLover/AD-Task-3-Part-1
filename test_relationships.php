<?php
require_once __DIR__ . '/utils/envSetter.util.php';

// Test database relationships
function testDatabaseRelationships() {
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

    // Insert test data
    echo "\nInserting test data...\n";
    
    // Insert users
    $result = pg_query($conn, "
        INSERT INTO users (username, email, password_hash, first_name, last_name, role) 
        VALUES ('testuser', 'test@example.com', 'hash123', 'Test', 'User', 'admin')
        ON CONFLICT (username) DO NOTHING
        RETURNING id
    ");
    
    if ($result) {
        echo "✅ User inserted\n";
    } else {
        echo "❌ User insert failed: " . pg_last_error($conn) . "\n";
    }

    // Insert project
    $result = pg_query($conn, "
        INSERT INTO projects (name, description, created_by) 
        VALUES ('Test Project', 'A test project', 1)
        RETURNING id
    ");
    
    if ($result) {
        echo "✅ Project inserted\n";
    } else {
        echo "❌ Project insert failed: " . pg_last_error($conn) . "\n";
    }

    // Insert project_user relationship
    $result = pg_query($conn, "
        INSERT INTO project_users (project_id, user_id, role) 
        VALUES (1, 1, 'manager')
        ON CONFLICT (project_id, user_id) DO NOTHING
    ");
    
    if ($result) {
        echo "✅ Project-User relationship inserted\n";
    } else {
        echo "❌ Project-User relationship failed: " . pg_last_error($conn) . "\n";
    }

    // Insert task
    $result = pg_query($conn, "
        INSERT INTO tasks (title, description, project_id, assigned_to, created_by) 
        VALUES ('Test Task', 'A test task', 1, 1, 1)
        RETURNING id
    ");
    
    if ($result) {
        echo "✅ Task inserted\n";
    } else {
        echo "❌ Task insert failed: " . pg_last_error($conn) . "\n";
    }

    // Test relationships with JOIN query
    echo "\nTesting relationships with JOIN query...\n";
    $result = pg_query($conn, "
        SELECT 
            u.username,
            p.name as project_name,
            pu.role as project_role,
            t.title as task_title
        FROM users u
        JOIN project_users pu ON u.id = pu.user_id
        JOIN projects p ON pu.project_id = p.id
        LEFT JOIN tasks t ON p.id = t.project_id AND u.id = t.assigned_to
        LIMIT 5
    ");

    if ($result) {
        echo "✅ JOIN query successful\n";
        echo "Query results:\n";
        while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            echo "  - {$row['username']} is {$row['project_role']} on '{$row['project_name']}' with task '{$row['task_title']}'\n";
        }
    } else {
        echo "❌ JOIN query failed: " . pg_last_error($conn) . "\n";
    }

    pg_close($conn);
    return true;
}

testDatabaseRelationships();
?>
