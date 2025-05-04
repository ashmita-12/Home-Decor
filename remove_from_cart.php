<?php
session_start();

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Remove the item from the session cart
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Redirect back to cart page
header("Location: checkout.php");
exit();
?>
