<?php
session_start();
require 'db_connection.php';

$email = $conn->real_escape_string($_POST['email']);
$password = $_POST['password'];

$result = $conn->query("SELECT id, username, password FROM users WHERE email = '$email' LIMIT 1");

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        // Redirect back to checkout if that's where they came from
        header("Location: " . (isset($_SESSION['checkout_redirect']) ? 'checkout.php' : 'index.php'));
        exit();
    }
}

// If login fails
$_SESSION['login_error'] = "Invalid email or password";
header("Location: login.php");
exit();
?>