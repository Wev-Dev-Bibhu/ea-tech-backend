# Laravel Backend App

To Run App <code>php artisan serve</code>
<br/>

<code>
CREATE TABLE options (
    id SERIAL PRIMARY KEY,
    type VARCHAR(255) NOT NULL,
    label VARCHAR(255) NOT NULL,
    value TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT NULL,
    updated_at TIMESTAMP DEFAULT NULL
);
</code>

<code>
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20),
    industry_option_id INTEGER REFERENCES options(id),
    job_title_option_id INTEGER REFERENCES options(id),
    company_option_id INTEGER REFERENCES options(id),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
);
</code>

<code>
-- Industry Options
INSERT INTO options (type, value, label) VALUES
('industry', 'it', 'IT'),
('industry', 'finance', 'Finance'),
('industry', 'healthcare', 'Healthcare');
</code>

<code>
-- Job Title Options
INSERT INTO options (type, value, label) VALUES
('job_title', 'developer', 'Developer'),
('job_title', 'designer', 'Designer'),
('job_title', 'manager', 'Manager');
</code>

<code>
-- Company Options
INSERT INTO options (type, value, label) VALUES
('company_name', 'google', 'Google'),
('company_name', 'microsoft', 'Microsoft'),
('company_name', 'amazon', 'Amazon');
</code>

Database Structure
