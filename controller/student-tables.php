<?php
include '../includes/dbconnect.php';

// create a table to store student information
try {
    $sql = "CREATE TABLE IF NOT EXISTS students (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstName VARCHAR(50) NOT NULL,
        middleName VARCHAR(50) NOT NULL,
        lastName VARCHAR(50) NOT NULL,
        age INT(3) NOT NULL,
        dateOfBirth DATE NOT NULL,
        class VARCHAR(20) NOT NULL,
        level VARCHAR(20) NOT NULL,
        block VARCHAR(20) NOT NULL,
        parentName VARCHAR(100) NOT NULL,
        parentNumber VARCHAR(20) NOT NULL,
        parentEmail VARCHAR(100) NOT NULL,
        admission_no VARCHAR(20) NOT NULL UNIQUE,
        fee_balance DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
        total_fee DECIMAL(10, 2) NOT NULL DEFAULT 0.00
    )";
    $pdo->exec($sql);

    $pdo->exec("ALTER TABLE students ADD COLUMN IF NOT EXISTS lastName VARCHAR(50) NOT NULL AFTER middleName");
    $pdo->exec("ALTER TABLE students ADD COLUMN IF NOT EXISTS fee_balance DECIMAL(10, 2) NOT NULL DEFAULT 0.00 AFTER admission_no");
    $pdo->exec("ALTER TABLE students ADD COLUMN IF NOT EXISTS total_fee DECIMAL(10, 2) NOT NULL DEFAULT 0.00 AFTER fee_balance");
} catch (PDOException $e) {
    die("Error creating table: " . $e->getMessage());
}
