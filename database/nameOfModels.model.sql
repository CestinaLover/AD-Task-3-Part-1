-- Example model file template
-- Replace 'nameOfModels' with your actual model name
-- Example: users.model.sql, projects.model.sql, etc.

-- Template for creating a new model:
-- CREATE TABLE IF NOT EXISTS your_table_name (
--     id SERIAL PRIMARY KEY,
--     name VARCHAR(255) NOT NULL,
--     description TEXT,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

-- Note: Always use "CREATE TABLE IF NOT EXISTS" to avoid errors when running multiple times
-- Note: Use proper naming conventions (snake_case for table and column names)
-- Note: Consider foreign key relationships when designing your schema