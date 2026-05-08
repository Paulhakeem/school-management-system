<?php
// Include the database connection file
require_once 'dbconnect.php';
require_once '../controller/student-tables.php';
require_once '../controller/classes-table.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $firstName = $_POST['firstName'] ?? '';
    $middleName = $_POST['middleName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $age = $_POST['age'] ?? '';
    $dateOfBirth = $_POST['dateOfBirth'] ?? '';
    $class = $_POST['class'] ?? '';
    $level = $_POST['level'] ?? '';
    $block = $_POST['block'] ?? '';
    $parentName = $_POST['parentName'] ?? '';
    $parentNumber = $_POST['parentNumber'] ?? '';
    $parentEmail = $_POST['parentEmail'] ?? '';
    // adminsion number generation
    $admission_no = "ADM" . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

    // Insert the data into the database
    try {
        $sql = "INSERT INTO students (firstName, middleName, lastName, age, dateOfBirth, class, level, block, parentName, parentNumber, parentEmail, admission_no) 
                VALUES (:firstName, :middleName, :lastName, :age, :dateOfBirth, :class, :level, :block, :parentName, :parentNumber, :parentEmail, :admission_no)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':firstName' => $firstName,
            ':middleName' => $middleName,
            ':lastName' => $lastName,
            ':age' => $age,
            ':dateOfBirth' => $dateOfBirth,
            ':class' => $class,
            ':level' => $level,
            ':block' => $block,
            ':parentName' => $parentName,
            ':parentNumber' => $parentNumber,
            ':parentEmail' => $parentEmail,
            ':admission_no' => $admission_no
        ]);

        //   classes table update with level, block and class_name
        $sql = "INSERT INTO classes (class_name, level, block, total_fee) VALUES (:class_name, :level, :block, :total_fee)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':class_name' => $class,
            ':level' => $level,
            ':block' => $block,
            ':total_fee' => 0.00
        ]);

        $success_message = "Student information saved successfully!";
        exit();
    } catch (PDOException $e) {
        die("Error saving student information: " . $e->getMessage());
    }
}
