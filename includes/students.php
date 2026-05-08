<?php

include '../includes/dbconnect.php';

$students = [];

// Fetch all students from the database
try {
    $stmt = $pdo->query("SELECT * FROM students");
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching students: " . $e->getMessage());
}
