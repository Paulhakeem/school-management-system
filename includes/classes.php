<?php
include '../includes/dbconnect.php';

function filterClasses($level = 'all')
{
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM classes" . ($level !== 'all' ? " WHERE class_name = :class_name" : ""));
        if ($level !== 'all') {
            $stmt->bindParam(':class_name', $level, PDO::PARAM_STR);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching classes: " . $e->getMessage());
        return [];
    }
}
