<?php
include '../includes/dbconnect.php';

$success_message = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $class_name = trim($_POST['class_name'] ?? '');
    $level = trim($_POST['level'] ?? '');
    $block = trim($_POST['block'] ?? '');

    if (empty($class_name) || empty($level) || empty($block)) {
        $errorMessage = "Please fill in all required fields.";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO classes (class_name, level, block) VALUES (:class_name, :level, :block)");
            $stmt->execute([
                ':class_name' => $class_name,
                ':level' => $level,
                ':block' => $block,
            ]);
            $success_message = "Class added successfully!";
        } catch (PDOException $e) {
            $errorMessage = "Error: " . $e->getMessage();
        }
    }
}
