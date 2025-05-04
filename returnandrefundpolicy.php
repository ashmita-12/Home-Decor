<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Returns & Refunds Policy - HomeDecor (Elysian Home)</title>
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
            width: 100px;
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
            content: "↩️";
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
    <h1>Returns & Refunds Policy</h1>

    <p>Last updated: <strong><?php echo date('F d, Y'); ?></strong></p>

    <p>At <strong>HomeDecor (Elysian Home)</strong>, customer satisfaction is our top priority. If you are not fully satisfied with your purchase, we're here to help!</p>

    <h2>1. Return Eligibility</h2>
    <ul>
        <li>Items must be returned within 15 days of delivery.</li>
        <li>Items must be unused, in the same condition as received, and in original packaging.</li>
        <li>Receipt or proof of purchase is required.</li>
    </ul>

    <h2>2. Non-Returnable Items</h2>
    <ul>
        <li>Gift cards</li>
        <li>Custom or personalized products</li>
        <li>Sale or clearance items (if mentioned as final sale)</li>
    </ul>

    <h2>3. Refunds Process</h2>
    <p>Once we receive your returned item, we will inspect it and notify you of the approval or rejection of your refund.</p>
    <ul>
        <li>Approved refunds will be processed back to your original payment method within 7-10 business days.</li>
        <li>Shipping charges are non-refundable.</li>
    </ul>

    <h2>4. Exchanges</h2>
    <p>We only replace items if they are defective or damaged. If you need an exchange, please email us at <a href="mailto:support@homedecor.com">support@homedecor.com</a>.</p>

    <h2>5. Return Shipping</h2>
    <p>You will be responsible for paying your own shipping costs for returning the item. We recommend using a trackable shipping service or purchasing shipping insurance.</p>

    <h2>6. Contact Us</h2>
    <p>For more questions about returns and refunds, please contact:</p>
    <ul>
        <li>Email: returns@homedecor.com</li>
        <li>Phone: 9843957746</li>
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
