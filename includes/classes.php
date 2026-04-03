<?php
include '../includes/dbconnect.php';

function filterClasses($level = 'all')
{
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM classes" . ($level !== 'all' ? " WHERE level = :level" : ""));
        // if level is not 'all', add a WHERE clause to filter by level
        if ($level !== 'all') {
            $stmt->bindParam(':level', $level, PDO::PARAM_STR);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching classes: " . $e->getMessage());
        return [];
    }
}
