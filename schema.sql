-- MySQL schema for SendSurat demo
CREATE DATABASE IF NOT EXISTS sendsurat CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE sendsurat;

-- Users table
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(120) NOT NULL UNIQUE,
  username VARCHAR(60) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Letters table (either composed in the editor, or uploaded files)
CREATE TABLE IF NOT EXISTS letters (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  title VARCHAR(255) DEFAULT 'Untitled',
  content MEDIUMTEXT NULL,       -- for Google Docs-like editor content (HTML)
  file_path VARCHAR(255) NULL,   -- for uploaded PDFs/DOCs
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_letters_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Seed one demo user (password: 123456)
INSERT INTO users (name, email, username, password_hash)
VALUES ('Demo User','demo@example.com','demo', SHA2('123456', 256))
ON DUPLICATE KEY UPDATE email=email;
