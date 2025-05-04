<?php
// Get name and email from the URL parameters
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Guest';
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : 'N/A';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        .navbar {
            background-color: #4CAF50;
            padding: 10px 0;
            margin-bottom: 40px;
        }
        .navbar a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .thank-you-message {
            background-color: #e0ffe0;
            border: 1px solid #4CAF50;
            padding: 20px;
            border-radius: 8px;
            display: inline-block;
        }
        h2 {
            color: #4CAF50;
        }
    </style>
</head>
<body>

<div class="navbar">
<a href="index.php">Home</a>
    <a href="aboutus.php">About Us</a>
    <a href="contactus.php">Contact Us</a>
    <a href="checkout.php">Purchase</a>
</div>

<div class="thank-you-message">
    <h2>Thank you for contacting us, <?php echo $name; ?>!</h2>
    <p>We will get back to you soon at <?php echo $email; ?>.</p>
</div>

</body>
</html>
