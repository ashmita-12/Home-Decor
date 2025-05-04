<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user = $conn->query("SELECT * FROM users WHERE id = {$_SESSION['user_id']}")->fetch_assoc();
$orders = $conn->query("SELECT * FROM orders WHERE user_id = {$_SESSION['user_id']} ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Account</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($user['username']) ?></h1>
    
    <h2>Order History</h2>
    <?php if ($orders->num_rows > 0): ?>
        <table border="1">
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php while ($order = $orders->fetch_assoc()): ?>
                <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= date('M j, Y', strtotime($order['created_at'])) ?></td>
                    <td>$<?= number_format($order['total_amount'], 2) ?></td>
                    <td><?= ucfirst($order['status']) ?></td>
                    <td><a href="order_details.php?id=<?= $order['id'] ?>">View</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No orders found.</p>
    <?php endif; ?>
    
    <p><a href="logout.php">Logout</a></p>
</body>
</html>