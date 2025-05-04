<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = floatval($_POST['price']); // convert to float
    $image = $_POST['image'];

    // Create cart if not set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // If item already exists in cart, increase quantity
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$id] = [
            'name' => $name,
            'price' => $price,
            'quantity' => 1,
            'image' => $image
        ];
    }

    header("Location: checkout.php");
    exit();
}


?>
