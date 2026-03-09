<?php
require_once '../controller/loadEnv.php';

// database connection variables
$host = $_ENV['DB_HOST']; // database host
$username = $_ENV['DB_USER']; // database username
$password = $_ENV['DB_PASS']; // database password
$dbname = $_ENV['DB_NAME']; // database name

try {
    // create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // if there is an error, display the error message
    die("Connection failed: " . $e->getMessage());
}
