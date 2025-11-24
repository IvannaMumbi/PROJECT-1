<?php
$host = 'localhost';
$dbname = 'employment_system';
$username = 'root';
$password = ''; // Default XAMPP has no password

try {
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Database connection error. Create the database first!");
}
?>