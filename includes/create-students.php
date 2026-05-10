<?php
// Include the database connection file
require_once 'dbconnect.php';
require_once '../controller/student-tables.php';
require_once '../controller/classes-table.php';

// Check if the form is submitted and all required fields are filled
$errorMessages = [];
$success_message = '';
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $requiredFields = ['firstName', 'lastName', 'age', 'dateOfBirth', 'class', 'level', 'block', 'parentName', 'parentNumber', 'parentEmail', 'fee_balance', 'total_fee'];
    $allFieldsFilled = true;

    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $allFieldsFilled = false;
            $errorMessages[] = "The $field field is required.";
        }
    }

    if ($allFieldsFilled) {
        // Get the form data
        $firstName = $_POST['firstName'] ?? '';
        $middleName = $_POST['middleName'] ?? '';
        $lastName = $_POST['lastName'] ?? '';
        $age = $_POST['age'] ?? '';
        $dateOfBirth = $_POST['dateOfBirth'] ?? '';
        $class_name = $_POST['class'] ?? '';
        $level = $_POST['level'] ?? '';
        $block = $_POST['block'] ?? '';
        $parentName = $_POST['parentName'] ?? '';
        $parentNumber = $_POST['parentNumber'] ?? '';
        $parentEmail = $_POST['parentEmail'] ?? '';
        $fee_balance = $_POST['fee_balance'] ?? 0.00;
        $total_fee = $_POST['total_fee'] ?? 0.00;
        // adminsion number generation
        $admission_no = "ADM" . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        // Insert the data into the database
        try {
            $sql = "INSERT INTO students (firstName, middleName, lastName, age, dateOfBirth, class_name, level, block, parentName, parentNumber, parentEmail, admission_no, fee_balance, total_fee) 
                    VALUES (:firstName, :middleName, :lastName, :age, :dateOfBirth, :class_name, :level, :block, :parentName, :parentNumber, :parentEmail, :admission_no, :fee_balance, :total_fee)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':firstName' => $firstName,
                ':middleName' => $middleName,
                ':lastName' => $lastName,
                ':age' => $age,
                ':dateOfBirth' => $dateOfBirth,
                ':class_name' => $class_name,
                ':level' => $level,
                ':block' => $block,
                ':parentName' => $parentName,
                ':parentNumber' => $parentNumber,
                ':parentEmail' => $parentEmail,
                ':admission_no' => $admission_no,
                ':fee_balance' => $fee_balance,
                ':total_fee' => $total_fee
            ]);

            //   classes table update with level, block and class_name
            // Check if class exists, if not insert, if exists update total_fee
            $stmt = $pdo->prepare("SELECT id FROM classes WHERE class_name = :class_name AND level = :level AND block = :block");
            $stmt->execute([
                ':class_name' => $class_name,
                ':level' => $level,
                ':block' => $block
            ]);
            $existingClass = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($existingClass) {
                // Update existing class
                $stmt = $pdo->prepare("UPDATE classes SET total_fee = :total_fee WHERE id = :id");
                $stmt->execute([
                    ':total_fee' => $total_fee,
                    ':id' => $existingClass['id']
                ]);
            } else {
                // Insert new class
                $stmt = $pdo->prepare("INSERT INTO classes (class_name, level, block, total_fee) VALUES (:class_name, :level, :block, :total_fee)");
                $stmt->execute([
                    ':class_name' => $class_name,
                    ':level' => $level,
                    ':block' => $block,
                    ':total_fee' => $total_fee
                ]);
            }

            $success_message = "Student information saved successfully!";
        } catch (PDOException $e) {
            $errorMessage = 'Error saving student information: ' . $e->getMessage();
        }
    }
}
