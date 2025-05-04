<?php
session_start();
require 'db_connection.php';

// Verify user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Process payment and save order
$conn->begin_transaction();

try {
    // 1. Create order record
    $stmt = $conn->prepare("INSERT INTO orders (user_id, total_amount, payment_method) VALUES (?, ?, ?)");
    $stmt->bind_param("ids", $_SESSION['user_id'], $grandTotal, $paymentMethod);
    $stmt->execute();
    $orderId = $conn->insert_id;
    
    // 2. Save order items
    $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    
    foreach ($_SESSION['cart'] as $item) {
        $stmt->bind_param("iiid", $orderId, $item['id'], $item['quantity'], $item['price']);
        $stmt->execute();
    }
    
    $conn->commit();
    unset($_SESSION['cart']);
    header("Location: order_confirmation.php?id=".$orderId);
    
} catch (Exception $e) {
    $conn->rollback();
    header("Location: payment_failed.php");
}
?>