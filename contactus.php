<?php
// Initialize variables
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = clean_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = clean_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    } else {
        $message = clean_input($_POST["message"]);
    }

    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        header("Location: thankyou.php?name=$name&email=$email");
        exit();
    }
}

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Roboto', sans-serif; background: #f4f7fa; color: #333; }
        
        /* Navbar */
        .navbar {
            background-color: #4CAF50;
            padding: 15px;
            display: flex;
            justify-content: center;
            gap: 30px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 1.2em;
            font-weight: 500;
        }
        .navbar a:hover {
            text-decoration: underline;
        }

        .container {
            width: 100%;
            max-width: 900px;
            margin: 50px auto;
            padding: 40px;
            background: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            animation: fadeIn 1s ease-out;
        }
        h2 { text-align: center; margin-bottom: 30px; font-size: 2em; color: #333; }
        .form-group { margin-bottom: 20px; }
        label { font-size: 1em; font-weight: bold; margin-bottom: 5px; display: block; }
        input[type="text"], textarea {
            width: 100%;
            padding: 15px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus, textarea:focus {
            border-color: #4CAF50;
            outline: none;
        }
        textarea { resize: vertical; height: 150px; }
        .error { color: #e74c3c; font-size: 0.9em; display: block; margin-top: 5px; }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 15px;
            font-size: 1.1em;
            cursor: pointer;
            border-radius: 8px;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover { background-color: #45a049; }
        .success-message {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
            text-align: center;
            color: #155724;
            font-size: 1.2em;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
    <script>
        function validateForm() {
            let name = document.getElementById('name').value;
            let email = document.getElementById('email').value;
            let message = document.getElementById('message').value;
            let valid = true;

            if (name === "") {
                document.getElementById('nameError').innerText = "Name is required";
                valid = false;
            } else {
                document.getElementById('nameError').innerText = "";
            }

            if (email === "") {
                document.getElementById('emailError').innerText = "Email is required";
                valid = false;
            } else if (!validateEmail(email)) {
                document.getElementById('emailError').innerText = "Invalid email format";
                valid = false;
            } else {
                document.getElementById('emailError').innerText = "";
            }

            if (message === "") {
                document.getElementById('messageError').innerText = "Message is required";
                valid = false;
            } else {
                document.getElementById('messageError').innerText = "";
            }

            return valid;
        }

        function validateEmail(email) {
            let regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            return regex.test(email);
        }
    </script>
</head>
<body>

<!-- Navigation Bar -->
<div class="navbar">
<a href="index.php">Home</a>
    <a href="aboutus.php">About Us</a>
    <a href="contactus.php">Contact Us</a>
    <a href="checkout.php">Purchase</a>
</div>

<div class="container">
    <h2>Contact Us</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" placeholder="Enter your name">
            <span class="error" id="nameError"><?php echo $nameErr; ?></span>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your email">
            <span class="error" id="emailError"><?php echo $emailErr; ?></span>
        </div>

        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="Enter your message"><?php echo $message; ?></textarea>
            <span class="error" id="messageError"><?php echo $messageErr; ?></span>
        </div>

        <input type="submit" value="Submit">
    </form>

    <?php
    if (!empty($name) && empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        echo "<div class='success-message'>";
        echo "<h2>Thank you for contacting us, $name!</h2>";
        echo "<p>We will get back to you soon at $email.</p>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>
