<?php
// Include the database connection file
require_once 'dbconnect.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Check if passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Prepare an SQL statement to insert the user data into the database
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        // Bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        // Execute the statement
        $stmt->execute();
        echo "Registration successful!";
        header("Location: ../pages/dashboard.php");
    } catch (PDOException $e) {
        // If there is an error, display the error message
        die("Error: " . $e->getMessage());
    }
}