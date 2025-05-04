<?php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    $_SESSION['checkout_redirect'] = true;
    header("Location: login.php");
    exit();
}

// Calculate cart total
$grandTotal = 0;
foreach ($_SESSION['cart'] as $id => $item) {
    $grandTotal += (float)$item['price'] * (int)$item['quantity'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <style>
        .cart-item { display: flex; padding: 15px; border-bottom: 1px solid #eee; align-items: center; }
        .cart-item img { width: 80px; height: 80px; object-fit: cover; margin-right: 20px; }
        .user-banner { background: #f0f8ff; padding: 10px; margin-bottom: 20px; border-radius: 5px; }
        .total-display { font-size: 1.2em; font-weight: bold; text-align: right; margin: 20px 0; }
        .checkout-btn { display: block; background: #4CAF50; color: white; text-align: center; 
                       padding: 12px; border-radius: 4px; text-decoration: none; }
    </style>
</head>
<body>

<div class="user-banner">
    Signed in as: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong> | 
    <a href="account.php">My Account</a> | 
    <a href="logout.php">Logout</a>
</div>

<?php if (!empty($_SESSION['cart'])): ?>
    <h1>Your Shopping Cart</h1>
    
    <div class="cart-items">
    <?php foreach ($_SESSION['cart'] as $id => $item): 
        $subtotal = (float)$item['price'] * (int)$item['quantity'];
    ?>
        <div class="cart-item">
            <img src="images/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
            <div style="flex-grow: 1;">
                <h3><?= htmlspecialchars($item['name']) ?></h3>
                <div>Price: $<?= number_format($item['price'], 2) ?></div>
                <div>Quantity: <?= $item['quantity'] ?></div>
                <div><strong>Subtotal: $<?= number_format($subtotal, 2) ?></strong></div>
            </div>
            <a href="remove_from_cart.php?id=<?= $id ?>" 
               style="color: white; background: #ff4444; padding: 5px 10px; border-radius: 3px;">Remove</a>
        </div>
    <?php endforeach; ?>
    </div>
    
    <div class="total-display">
        Order Total: <span style="color: #e67e22;">$<?= number_format($grandTotal, 2) ?></span>
    </div>
    
    <a href="payment.php" class="checkout-btn">Proceed to Secure Checkout →</a>

<?php else: ?>
    <div style="text-align: center; margin-top: 50px;">
        <h2>Your cart is empty</h2>
        <a href="products.php" style="color: #4CAF50;">Continue Shopping</a>
    </div>
<?php endif; ?>

</body>
</html>