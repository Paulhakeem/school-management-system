<?php
include '../includes/students.php';

$search = htmlspecialchars($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search']) ? $_GET['search'] : '');
$errorMessage = '';

try {
    if ($search) {
        $stmt = $pdo->prepare("SELECT * FROM students WHERE firstName LIKE :search OR middleName LIKE :search OR admission_no LIKE :search");
        $stmt->execute(['search' => '%' . $search . '%']);
        
        $getStudent = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($getStudent)) {
            $errorMessage = "No students found matching your search criteria.";
        }
        $search = null; // Clear the search term after use
    } else {
        $stmt = $pdo->query("SELECT * FROM students");
    }
} catch (PDOException $e) {
    die("Error fetching students: " . $e->getMessage());
}
