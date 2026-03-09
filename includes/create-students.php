<?php
// Include the database connection file
require_once 'dbconnect.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $age = $_POST['age'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $class = $_POST['class'];
    $block = $_POST['block'];
    $parentName = $_POST['parentName'];
    $parentNumber = $_POST['parentNumber'];
    $parentEmail = $_POST['parentEmail'];

    // adminsion number generation
    $admission_no = "ADM" . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);



    try {
        // Prepare an SQL statement to insert the student data into the database
        $stmt = $pdo->prepare("INSERT INTO students (firstName, middleName, age, dateOfBirth, class, block, parentName, parentNumber, parentEmail, admission_no) VALUES (:firstName, :middleName, :age, :dateOfBirth, :class, :block, :parentName, :parentNumber, :parentEmail, :admission_no)");
        // Bind the parameters
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':middleName', $middleName);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':dateOfBirth', $dateOfBirth);
        $stmt->bindParam(':class', $class);
        $stmt->bindParam(':block', $block);
        $stmt->bindParam(':parentName', $parentName);
        $stmt->bindParam(':parentNumber', $parentNumber);
        $stmt->bindParam(':parentEmail', $parentEmail);
        $stmt->bindParam(':admission_no', $admission_no);
        $stmt->execute();
        echo "Student added successfully!";
    } catch (PDOException $e) {
        // If there is an error, display the error message
        die("Error: " . $e->getMessage());
    }
}
