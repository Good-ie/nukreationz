-- Database setup for nukreationz (CORRECTED VERSION)
-- Run with: sudo mysql nukreationz < setup_database.sql

CREATE TABLE IF NOT EXISTS `user` (
    `user_id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(100) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `plan` VARCHAR(50) DEFAULT 'free',
    `firstname` VARCHAR(100) DEFAULT '',
    `lastname` VARCHAR(100) DEFAULT '',
    `profile_image` VARCHAR(255) DEFAULT '',
    `sub_end` DATE DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `status` VARCHAR(20) DEFAULT 'active'
);

CREATE TABLE IF NOT EXISTS `nadmin` (
    `admin_id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(100) NOT NULL,
    `firstname` VARCHAR(100),
    `lastname` VARCHAR(100),
    `email` VARCHAR(150) NOT NULL,
    `user_type` VARCHAR(50),
    `password` VARCHAR(255) NOT NULL,
    `status` VARCHAR(20) DEFAULT 'active',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `smartcard` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `code` VARCHAR(100),
    `fullname` VARCHAR(150),
    `mobilenumber` VARCHAR(20),
    `whatsappnumber` VARCHAR(20),
    `profilepix` VARCHAR(255),
    `email` VARCHAR(150),
    `companyname` VARCHAR(200),
    `officeaddress` TEXT,
    `designation` VARCHAR(150),
    `professionalsummary` TEXT,
    `websiteaddress` VARCHAR(255),
    `facebookprofile` VARCHAR(255),
    `linkedinprofile` VARCHAR(255),
    `twitterprofile` VARCHAR(255),
    `instagramprofile` VARCHAR(255),
    `product1` VARCHAR(255),
    `product2` VARCHAR(255),
    `product3` VARCHAR(255),
    `product4` VARCHAR(255),
    `product5` VARCHAR(255),
    `date_created` DATETIME
);

CREATE TABLE IF NOT EXISTS `card_details` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT,
    `firstname` VARCHAR(100),
    `lastname` VARCHAR(100),
    `email` VARCHAR(150),
    `phone` VARCHAR(20),
    `caddress` TEXT,
    `company_name` VARCHAR(200),
    `psummary` TEXT,
    `jobtitle` VARCHAR(150),
    `website_link` VARCHAR(255),
    `images` VARCHAR(255),
    `profile_page` VARCHAR(100),
    `color` VARCHAR(20),
    `sec_color` VARCHAR(20),
    `text_color` VARCHAR(20),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `hit` INT DEFAULT 0,
    `original_url` VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS `user_social_link` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `card_id` INT,
    `user_id` INT,
    `facebook` VARCHAR(255),
    `instagram` VARCHAR(255),
    `linkedin` VARCHAR(255),
    `twitter` VARCHAR(255),
    `whatsapp` VARCHAR(50),
    `pintrest` VARCHAR(255),
    `youtube` VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS `images` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT,
    `card_id` INT,
    `file_name` VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS `contact_form` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `code` VARCHAR(100),
    `name` VARCHAR(150),
    `email` VARCHAR(150),
    `phone` VARCHAR(20),
    `date_created` DATETIME,
    `message` TEXT
);

CREATE TABLE IF NOT EXISTS `blogs` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `code` VARCHAR(100),
    `title` VARCHAR(255),
    `content` TEXT,
    `flyer` VARCHAR(255),
    `author` VARCHAR(100),
    `date_created` DATETIME
);

CREATE TABLE IF NOT EXISTS `comments` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `code` VARCHAR(100),
    `name` VARCHAR(150),
    `comment` TEXT,
    `date_created` DATETIME,
    `blog_id` INT
);

CREATE TABLE IF NOT EXISTS `pdf_files` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `url` VARCHAR(255),
    `name` VARCHAR(200),
    `size` VARCHAR(50),
    `type` VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS `promo` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `code` VARCHAR(100),
    `contact_name` VARCHAR(150),
    `company_name` VARCHAR(200),
    `email` VARCHAR(150),
    `phone` VARCHAR(20),
    `date_created` DATETIME,
    `other_details` TEXT,
    `selected_service` VARCHAR(150),
    `promo_code` VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS `email_list` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `email` VARCHAR(150),
    `name` VARCHAR(150)
);

CREATE TABLE IF NOT EXISTS `billing` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT,
    `tran_reference` VARCHAR(100),
    `amount` DECIMAL(10,2),
    `plan` VARCHAR(100),
    `period` VARCHAR(50),
    `start_date` DATE,
    `end_date` DATE,
    `status` VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS `complaints` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT,
    `complaint` TEXT,
    `complaint_ticket` VARCHAR(100),
    `email` VARCHAR(150),
    `status` VARCHAR(50),
    `username` VARCHAR(100)
);

-- Insert default admin user (password: goodi321)
INSERT INTO nadmin (username, firstname, lastname, email, user_type, password, status) 
VALUES ('admin', 'Admin', 'User', 'admin@nukreationz.com', 'super', MD5('goodi321'), 'active');
