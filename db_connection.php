<?php
$host = "localhost";
$user = "root";     // Default XAMPP username
$pass = "";         // Default XAMPP password (empty)
$database = "homedecor"; // Your database name

// Create connection
$conn = new mysqli($host, $user, $pass, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>