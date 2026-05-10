<?php
include '../includes/dbconnect.php';

try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS classes (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        class_name VARCHAR(20) NOT NULL,
        level VARCHAR(50) NOT NULL,
        block VARCHAR(20) NOT NULL,
        total_fee DECIMAL(10, 2) NOT NULL
    )");

    // Migration: swap class_name ↔ level (class_name was VARCHAR(50), level was VARCHAR(20))
    $stmt = $pdo->query("SHOW COLUMNS FROM classes WHERE Field = 'class_name'");
    $col = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($col && $col['Type'] === 'varchar(50)') {
        $pdo->exec("ALTER TABLE classes CHANGE COLUMN class_name cn_tmp VARCHAR(50) NOT NULL");
        $pdo->exec("ALTER TABLE classes CHANGE COLUMN level class_name VARCHAR(50) NOT NULL");
        $pdo->exec("ALTER TABLE classes CHANGE COLUMN cn_tmp level VARCHAR(20) NOT NULL");
    }
} catch (PDOException $e) {
    die("Error creating table: " . $e->getMessage());
}