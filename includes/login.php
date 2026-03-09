<?php
require_once 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            echo "Login successful!";
            header("Location: ../pages/dashboard.php");
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
