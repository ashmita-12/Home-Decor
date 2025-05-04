<?php
session_start();
require 'db_connection.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Validate order ID from URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid order ID.");
}

$orderId = (int)$_GET['id']; // Force integer type for security
$userId = (int)$_SESSION['user_id'];

// Fetch order from database (with error handling)
try {
    $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $orderId, $userId);
    $stmt->execute();
    $order = $stmt->get_result()->fetch_assoc();

    if (!$order) {
        die("Order not found or you don't have permission to view it.");
    }
} catch (Exception $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .order-details { background: #f9f9f9; padding: 15px; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>Order #<?= htmlspecialchars($order['id']) ?> Confirmed</h2>
    <p>Thank you for your purchase, <?= htmlspecialchars($_SESSION['username']) ?>!</p>
    
    <div class="order-details">
        <h3>Order Details</h3>
        <?php if ($order): ?>
            <p><strong>Date:</strong> <?= htmlspecialchars($order['order_date']) ?></p>
            <p><strong>Total:</strong> $<?= number_format($order['total_amount'], 2) ?></p>
            <!-- Add more order details as needed -->
        <?php endif; ?>
    </div>

    <p><a href="orders.php">View All Orders</a> | <a href="index.php">Continue Shopping</a></p>
</body>
</html>