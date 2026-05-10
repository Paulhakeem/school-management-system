<?php
include '../includes/dbconnect.php';

try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS students (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstName VARCHAR(50) NOT NULL,
        middleName VARCHAR(50) NOT NULL,
        lastName VARCHAR(50) NOT NULL,
        age INT(3) NOT NULL,
        dateOfBirth DATE NOT NULL,
        class_name VARCHAR(20) NOT NULL,
        level VARCHAR(20) NOT NULL,
        block VARCHAR(20) NOT NULL,
        parentName VARCHAR(100) NOT NULL,
        parentNumber VARCHAR(20) NOT NULL,
        parentEmail VARCHAR(100) NOT NULL,
        admission_no VARCHAR(20) NOT NULL UNIQUE,
        fee_balance DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
        total_fee DECIMAL(10, 2) NOT NULL DEFAULT 0.00
    )");

    // Migration: rename old `class` column to `class_name` if it exists
    $stmt = $pdo->query("SHOW COLUMNS FROM students WHERE Field = 'class'");
    if ($stmt->fetch()) {
        $pdo->exec("ALTER TABLE students CHANGE COLUMN class class_name VARCHAR(20) NOT NULL");
    }

    // Migration: add missing columns
    $pdo->exec("ALTER TABLE students ADD COLUMN IF NOT EXISTS lastName VARCHAR(50) NOT NULL AFTER middleName");
    $pdo->exec("ALTER TABLE students ADD COLUMN IF NOT EXISTS fee_balance DECIMAL(10, 2) NOT NULL DEFAULT 0.00 AFTER admission_no");
    $pdo->exec("ALTER TABLE students ADD COLUMN IF NOT EXISTS total_fee DECIMAL(10, 2) NOT NULL DEFAULT 0.00 AFTER fee_balance");

    // Migration: swap class_name ↔ level column names
    $stmt = $pdo->query("SHOW COLUMNS FROM students WHERE Field = 'class_name' AND Type = 'varchar(50)'");
    if ($stmt->fetch()) {
        $pdo->exec("ALTER TABLE students CHANGE COLUMN class_name cn_tmp VARCHAR(50) NOT NULL");
        $pdo->exec("ALTER TABLE students CHANGE COLUMN level class_name VARCHAR(20) NOT NULL");
        $pdo->exec("ALTER TABLE students CHANGE COLUMN cn_tmp level VARCHAR(20) NOT NULL");
    }
} catch (PDOException $e) {
    die("Error creating table: " . $e->getMessage());
}