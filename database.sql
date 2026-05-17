
-- Create Database
CREATE DATABASE IF NOT EXISTS `student_db` 
DEFAULT CHARACTER SET utf8mb4 
DEFAULT COLLATE utf8mb4_unicode_ci;

USE `student_db`;

-- Create Students Table
CREATE TABLE IF NOT EXISTS `students` (
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `fullname` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `phone` VARCHAR(20),
    `password` VARCHAR(255) NOT NULL,
    `program` VARCHAR(100) NOT NULL,
    `year_of_study` INT(2),
    `status` ENUM('active', 'pending') DEFAULT 'pending',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create Courses Table (Optional: for better data management)
CREATE TABLE IF NOT EXISTS `courses` (
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `code` VARCHAR(10) NOT NULL UNIQUE
);

INSERT INTO `courses` (`name`, `code`) VALUES
('Computer Science', 'CS'),
('Business Administration', 'BA'),
('Engineering', 'ENG'),
('Arts & Humanities', 'ART'),
('Mathematics', 'MATH');
