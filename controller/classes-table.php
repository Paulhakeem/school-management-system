<?php
include '../includes/dbconnect.php';

// create a table to store class information
try {
    $sql = "CREATE TABLE IF NOT EXISTS classes (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        class_name VARCHAR(50) NOT NULL,
        level VARCHAR(20) NOT NULL,
        block VARCHAR(20) NOT NULL,
        total_fee DECIMAL(10, 2) NOT NULL
    )";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("Error creating table: " . $e->getMessage());
}
