<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Calculate cart total (if coming from checkout)
$grandTotal = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $grandTotal += $item['price'] * $item['quantity'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Options</title>
    <style>
        .payment-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .payment-option {
            padding: 15px;
            margin: 15px 0;
            border: 1px solid #eee;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .payment-option:hover {
            background: #f9f9f9;
            border-color: #4CAF50;
        }
        .payment-logo {
            height: 30px;
            vertical-align: middle;
            margin-right: 10px;
        }
        .user-info {
            background: #f0f8ff;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h2>Complete Your Payment</h2>
        <p>Total Amount: <strong>Rs. <?= number_format($grandTotal, 2) ?></strong></p>
        
        <div class="payment-options">
            <!-- eSewa Payment -->
            <div class="payment-option" onclick="payWithEsewa()">
                <img src="images/esewa-logo.png" class="payment-logo" alt="eSewa">
                Pay with eSewa
            </div>
            
            <!-- Khalti Payment -->
            <div class="payment-option" onclick="payWithKhalti()">
                <img src="images/khalti-logo.png" class="payment-logo" alt="Khalti">
                Pay with Khalti
            </div>
            
            <!-- Credit Card Payment -->
            <div class="payment-option" onclick="showCreditCardForm()">
                <img src="images/credit-card-logo.png" class="payment-logo" alt="Credit Card">
                Pay with Credit/Debit Card
            </div>
        </div>
        
        <!-- Credit Card Form (Hidden by Default) -->
        <div id="credit-card-form" style="display: none; margin-top: 20px;">
            <form action="process_payment.php" method="post">
                <input type="hidden" name="payment_method" value="credit_card">
                
                <div style="margin-bottom: 15px;">
                    <label>Card Number</label>
                    <input type="text" name="card_number" placeholder="1234 5678 9012 3456" required>
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label>Expiry Date</label>
                    <input type="text" name="expiry" placeholder="MM/YY" required>
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label>CVV</label>
                    <input type="text" name="cvv" placeholder="123" required>
                </div>
                
                <button type="submit" style="background: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px;">
                    Pay Rs. <?= number_format($grandTotal, 2) ?>
                </button>
            </form>
        </div>
    </div>

    <script>
    function payWithEsewa() {
        // eSewa Integration
        const path = "https://uat.esewa.com.np/epay/main";
        const params = {
            amt: <?= $grandTotal ?>,
            psc: 0,
            pdc: 0,
            txAmt: 0,
            tAmt: <?= $grandTotal ?>,
            pid: "<?= uniqid() ?>",
            scd: "EPAYTEST", // Your merchant code
            su: "http://localhost/HomeDecor/payment_success.php",
            fu: "http://localhost/HomeDecor/payment_failed.php"
        };
        
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = path;
        
        Object.keys(params).forEach(key => {
            const hiddenField = document.createElement('input');
            hiddenField.type = 'hidden';
            hiddenField.name = key;
            hiddenField.value = params[key];
            form.appendChild(hiddenField);
        });
        
        document.body.appendChild(form);
        form.submit();
    }

    function payWithKhalti() {
        // Khalti Checkout.js integration
        const config = {
            "publicKey": "test_public_key_<?= uniqid() ?>",
            "productIdentity": "<?= uniqid() ?>",
            "productName": "Your Order",
            "productUrl": "http://localhost/HomeDecor",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT"
            ],
            "eventHandler": {
                onSuccess(payload) {
                    window.location.href = "payment_success.php?khalti_token=" + payload.token;
                },
                onError(error) {
                    console.log(error);
                },
                onClose() {
                    console.log('widget closed');
                }
            }
        };

        const checkout = new KhaltiCheckout(config);
        checkout.show({ amount: <?= $grandTotal * 100 ?> }); // Amount in paisa
    }

    function showCreditCardForm() {
        document.getElementById('credit-card-form').style.display = 'block';
    }
    </script>
    
    <!-- Khalti Checkout.js -->
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</body>
</html>