<?php
session_start();
$reason = $_GET['reason'] ?? 'unknown';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Failed</title>
</head>
<body>
    <div style="text-align: center; margin-top: 50px;">
        <h2 style="color: red;">Payment Failed</h2>
        <p>Reason: <?= htmlspecialchars($reason) ?></p>
        <a href="checkout.php">Try Again</a>
    </div>
</body>
</html>