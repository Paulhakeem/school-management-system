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
        class_name VARCHAR(20) NOT NULL,
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

    $stmt = $pdo->prepare("SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'students' AND COLUMN_NAME IN ('class', 'class_name')");
    $stmt->execute();
    $existingColumns = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if (!in_array('class_name', $existingColumns, true)) {
        if (in_array('class', $existingColumns, true)) {
            $pdo->exec("ALTER TABLE students CHANGE COLUMN class class_name VARCHAR(20) NOT NULL");
        } else {
            $pdo->exec("ALTER TABLE students ADD COLUMN class_name VARCHAR(20) NOT NULL AFTER age");
        }
    }

    $pdo->exec("ALTER TABLE students ADD COLUMN IF NOT EXISTS lastName VARCHAR(50) NOT NULL AFTER middleName");
    $pdo->exec("ALTER TABLE students ADD COLUMN IF NOT EXISTS fee_balance DECIMAL(10, 2) NOT NULL DEFAULT 0.00 AFTER admission_no");
    $pdo->exec("ALTER TABLE students ADD COLUMN IF NOT EXISTS total_fee DECIMAL(10, 2) NOT NULL DEFAULT 0.00 AFTER fee_balance");
} catch (PDOException $e) {
    die("Error creating table: " . $e->getMessage());
}
