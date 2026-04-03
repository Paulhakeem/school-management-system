<?php
include '../includes/dbconnect.php';

$success_message = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $class_name = $_POST['class_name'];
    $level = $_POST['level'];
    $block = $_POST['block'];
    // assume data is an array of additional class details, you can modify this as needed
    $data = json_encode($_POST['data'] ?? []); // convert to JSON string for storage

    if (empty($class_name) || empty($level) || empty($block)) {
        echo "Please fill in all required fields.";
        exit;
    } else {
        // insert clases data
        try {
            $stmt = $pdo->prepare("INSERT INTO classes (class_name, level, block, data) VALUES (:class_name, :level, :block, :data)");
            $stmt->bindParam(':class_name', $class_name);
            $stmt->bindParam(':level', $level);
            $stmt->bindParam(':block', $block);
            $stmt->bindParam(':data', $data);
            $stmt->execute();
            $success_message = "Class added successfully!";
        } catch (PDOException $e) {
            $errorMessage = "Error: " . $e->getMessage();
        }
    }
}
