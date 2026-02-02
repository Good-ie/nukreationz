-- Seed data for nukreationz
-- This file inserts initial required data

-- Insert default admin user (password: goodi321)
INSERT INTO nadmin (username, firstname, lastname, email, user_type, password, status) 
VALUES ('admin', 'Admin', 'User', 'admin@nukreationz.com', 'super', MD5('goodi321'), 'active')
ON DUPLICATE KEY UPDATE username=username;

-- Insert a test premium user (password: password123)
INSERT INTO user (username, email, password, plan, status) 
VALUES ('goodie', 'goodie@test.com', MD5('password123'), 'premium', 'active')
ON DUPLICATE KEY UPDATE username=username;
