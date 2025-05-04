<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$order_id = (int)$_GET['id'];
$order = $conn->query("SELECT * FROM orders WHERE id = $order_id AND user_id = {$_SESSION['user_id']}")->fetch_assoc();

if (!$order) {
    die("Order not found");
}

$items = $conn->query("
    SELECT oi.*, p.name, p.image 
    FROM order_items oi
    JOIN products p ON oi.product_id = p.id
    WHERE oi.order_id = $order_id
");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order #<?= $order['id'] ?></title>
</head>
<body>
    <h1>Order #<?= $order['id'] ?></h1>
    <p>Date: <?= date('F j, Y', strtotime($order['created_at'])) ?></p>
    <p>Status: <?= ucfirst($order['status']) ?></p>
    <p>Payment Method: <?= strtoupper($order['payment_method']) ?></p>
    
    <h2>Items</h2>
    <table border="1">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <?php while ($item = $items->fetch_assoc()): ?>
            <tr>
                <td>
                    <img src="images/<?= htmlspecialchars($item['image']) ?>" width="50">
                    <?= htmlspecialchars($item['name']) ?>
                </td>
                <td>$<?= number_format($item['price'], 2) ?></td>
                <td><?= $item['quantity'] ?></td>
                <td>$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
            </tr>
        <?php endwhile; ?>
        <tr>
            <td colspan="3" align="right"><strong>Total:</strong></td>
            <td><strong>$<?= number_format($order['total_amount'], 2) ?></strong></td>
        </tr>
    </table>
    
    <p><a href="account.php">← Back to Account</a></p>
</body>
</html>