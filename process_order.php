<?php
session_start();

// Process order (in a real app, you'd save to database)
$order = [
    'customer_name' => $_POST['name'],
    'email' => $_POST['email'],
    'address' => $_POST['address'],
    'items' => $_SESSION['cart'],
    'total' => array_reduce($_SESSION['cart'], function($sum, $item) {
        return $sum + ($item['price'] * $item['quantity']);
    }, 0)
];

// Clear cart
$_SESSION['cart'] = [];

// Redirect to thank you page
header("Location: thank_you.php");
exit();
?>