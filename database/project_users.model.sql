-- Project Users junction table
CREATE TABLE IF NOT EXISTS project_users (
    project_id INTEGER NOT NULL REFERENCES projects (id),
    user_id INTEGER NOT NULL REFERENCES users (id),
    role VARCHAR(50) NOT NULL,
    joined_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (project_id, user_id)
);
