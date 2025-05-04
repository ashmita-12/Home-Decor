<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Terms & Conditions - HomeDecor (Elysian Home)</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
            color: #333;
            line-height: 1.8;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 50px auto;
            background: #fff;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            animation: fadeIn 1.2s ease-in-out;
        }
        h1 {
            font-size: 36px;
            text-align: center;
            margin-bottom: 30px;
            color: #5D3FD3;
            position: relative;
        }
        h1::after {
            content: "";
            width: 80px;
            height: 4px;
            background: #5D3FD3;
            display: block;
            margin: 10px auto 0;
            border-radius: 5px;
        }
        h2 {
            font-size: 24px;
            color: #444;
            margin-top: 30px;
            position: relative;
        }
        h2::before {
            content: "🛡️";
            margin-right: 10px;
            font-size: 24px;
        }
        p, ul {
            margin-top: 10px;
            font-size: 16px;
            color: #555;
        }
        ul {
            padding-left: 20px;
            list-style: disc;
        }
        a {
            color: #5D3FD3;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        footer {
            text-align: center;
            font-size: 14px;
            margin-top: 50px;
            color: #aaa;
        }
        /* Animation */
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
        /* Scroll To Top Button */
        #topBtn {
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            background-color: #5D3FD3;
            color: white;
            border: none;
            outline: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            display: none;
        }
        #topBtn:hover {
            background-color: #372ba7;
        }
    </style>
</head>
<body>

<!-- Scroll Top Button -->
<button onclick="topFunction()" id="topBtn" title="Go to top">⬆️</button>

<div class="container">
    <h1>Terms & Conditions</h1>

    <p>Last updated: <strong><?php echo date('F d, Y'); ?></strong></p>

    <p>Welcome to <strong>HomeDecor</strong> (operated under the project name <strong>Elysian Home</strong>).
    By accessing or using our website, you agree to comply with and be bound by the following Terms & Conditions. Please read them carefully.</p>

    <h2>1. Introduction</h2>
    <p>These Terms govern your use of our website and services. If you disagree with any part, please do not use our site.</p>

    <h2>2. Products and Services</h2>
    <p>We aim to display products as accurately as possible. However, slight variations in color, texture, and size may occur. All items are subject to availability and changes.</p>

    <h2>3. Orders and Payments</h2>
    <ul>
        <li>All orders are subject to acceptance and product availability.</li>
        <li>Prices are listed in [Insert Currency] and include applicable taxes unless specified.</li>
        <li>We reserve the right to cancel orders at our discretion.</li>
    </ul>

    <h2>4. Shipping and Delivery</h2>
    <p>Delivery estimates are approximate. We are not liable for delays caused by external circumstances beyond our control.</p>

    <h2>5. Returns and Refunds</h2>
    <p>Items can be returned within 7 days of delivery. Certain personalized or sale items are non-returnable unless defective.</p>

    <h2>6. User Conduct</h2>
    <ul>
        <li>Use the website lawfully.</li>
        <li>Do not interfere with or disrupt website security.</li>
        <li>Do not post false or misleading information.</li>
    </ul>

    <h2>7. Intellectual Property</h2>
    <p>All content including images, logos, and texts are owned by HomeDecor (Elysian Home). Unauthorized use is prohibited.</p>

    <h2>8. Limitation of Liability</h2>
    <p>We are not responsible for any losses or damages caused directly or indirectly through the use of our services or products.</p>

    <h2>9. Privacy Policy</h2>
    <p>Please review our <a href="privacypolicy.php">Privacy Policy</a> for information on how we collect and use your personal data.</p>

    <h2>10. Changes to Terms</h2>
    <p>We reserve the right to modify these Terms at any time. Your continued use of our site constitutes your agreement to the new Terms.</p>

    <h2>11. Governing Law</h2>
    <p>These Terms are governed by the laws of [Insert Country/State].</p>

    <h2>12. Contact Information</h2>
    <p>For questions, reach out to us at:</p>
    <ul>
        <li>Email: support@homedecor.com</li>
        <li>Phone: 9843957746X</li>
    </ul>
</div>

<footer>
    &copy; <?php echo date('Y'); ?> HomeDecor (Elysian Home). All rights reserved.
</footer>

<script>
    // Scroll to top functionality
    let topButton = document.getElementById("topBtn");

    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            topButton.style.display = "block";
        } else {
            topButton.style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

</body>
</html>
