<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homedecor";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(32));
        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

        $update = "UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE email = ?";
        $updateStmt = $conn->prepare($update);
        $updateStmt->bind_param("sss", $token, $expiry, $email);
        $updateStmt->execute();

        // Instead of sending email, just show the reset link
        $resetLink = "http://localhost/HomeDecor/reset_password.php?token=" . $token;

        echo "<p><strong>Reset link generated:</strong></p>";
        echo "<p><a href='$resetLink'>$resetLink</a></p>";
        echo "<p><small>This link will expire in 1 hour.</small></p>";

    } else {
        echo "<p>Email address not found.</p>";
    }
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password | Elysian Home</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <form action="forgot_password.php" method="POST">
        <input type="email" name="email" placeholder="Enter your registered email" required>
        <button type="submit">Generate Reset Link</button>
    </form>
    <a href="login.php">Back to Login</a>
</body>
</html>
