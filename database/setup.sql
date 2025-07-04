-- Master database setup script
-- Run this file to create all tables in the correct order

-- Users table (must be created first due to foreign key dependencies)
CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    role VARCHAR(50) NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Projects table
CREATE TABLE IF NOT EXISTS projects (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    status VARCHAR(50) NOT NULL DEFAULT 'active',
    start_date DATE,
    end_date DATE,
    created_by INTEGER REFERENCES users(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Project Users junction table
CREATE TABLE IF NOT EXISTS project_users (
    project_id INTEGER NOT NULL REFERENCES projects (id),
    user_id INTEGER NOT NULL REFERENCES users (id),
    role VARCHAR(50) NOT NULL,
    joined_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (project_id, user_id)
);

-- Tasks table
CREATE TABLE IF NOT EXISTS tasks (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status VARCHAR(50) NOT NULL DEFAULT 'pending',
    priority VARCHAR(20) NOT NULL DEFAULT 'medium',
    project_id INTEGER REFERENCES projects(id),
    assigned_to INTEGER REFERENCES users(id),
    created_by INTEGER REFERENCES users(id),
    due_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data (optional)
INSERT INTO users (username, email, password_hash, first_name, last_name, role) 
VALUES 
    ('admin', 'admin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin', 'User', 'admin'),
    ('john_doe', 'john@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'John', 'Doe', 'user'),
    ('jane_smith', 'jane@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Jane', 'Smith', 'user')
ON CONFLICT (username) DO NOTHING;

INSERT INTO projects (name, description, created_by) 
VALUES 
    ('Sample Project', 'This is a sample project for testing', 1),
    ('Website Development', 'Building a company website', 1)
ON CONFLICT DO NOTHING;

INSERT INTO project_users (project_id, user_id, role) 
VALUES 
    (1, 1, 'project_manager'),
    (1, 2, 'developer'),
    (2, 1, 'project_manager'),
    (2, 3, 'designer')
ON CONFLICT DO NOTHING;

INSERT INTO tasks (title, description, project_id, assigned_to, created_by) 
VALUES 
    ('Setup Database', 'Create database schema and tables', 1, 2, 1),
    ('Design UI', 'Create user interface mockups', 2, 3, 1),
    ('Implement Authentication', 'Add login/logout functionality', 1, 2, 1)
ON CONFLICT DO NOTHING;
