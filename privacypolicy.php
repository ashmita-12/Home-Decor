<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Privacy Policy - HomeDecor (Elysian Home)</title>
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
            content: "🔒";
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
    <h1>Privacy Policy</h1>

    <p>Last updated: <strong><?php echo date('F d, Y'); ?></strong></p>

    <p>At <strong>HomeDecor (Elysian Home)</strong>, we value your privacy and are committed to protecting your personal information. This Privacy Policy explains how we collect, use, and safeguard your information when you visit our website.</p>

    <h2>1. Information We Collect</h2>
    <ul>
        <li><strong>Personal Information:</strong> Name, email address, phone number, shipping address, payment details.</li>
        <li><strong>Non-Personal Information:</strong> Browser type, IP address, time zone, pages you visit.</li>
    </ul>

    <h2>2. How We Use Your Information</h2>
    <ul>
        <li>To process and fulfill your orders</li>
        <li>To improve our website and services</li>
        <li>To send promotional emails or updates (only if you opt-in)</li>
        <li>To prevent fraud and secure our platform</li>
    </ul>

    <h2>3. Sharing Your Information</h2>
    <p>We do not sell or rent your personal information. We may share your information with trusted partners who help operate our website, conduct business, or serve you — as long as they agree to keep your information confidential.</p>

    <h2>4. Data Security</h2>
    <p>We use appropriate security measures to protect your information from unauthorized access, disclosure, or destruction. However, no internet transmission is 100% secure.</p>

    <h2>5. Cookies</h2>
    <p>We use cookies to improve your browsing experience and analyze website traffic. You can choose to disable cookies through your browser settings, but some features may not work properly without them.</p>

    <h2>6. Your Rights</h2>
    <ul>
        <li>Right to access your personal information</li>
        <li>Right to correct or update your information</li>
        <li>Right to request deletion of your data</li>
        <li>Right to opt-out of marketing communications</li>
    </ul>

    <h2>7. Third-Party Links</h2>
    <p>Our website may contain links to other websites. We are not responsible for the privacy practices of third-party sites.</p>

    <h2>8. Changes to This Policy</h2>
    <p>We reserve the right to modify this Privacy Policy at any time. Changes will be effective immediately upon posting.</p>

    <h2>9. Contact Us</h2>
    <p>If you have any questions about this Privacy Policy, please contact us:</p>
    <ul>
        <li>Email: privacy@homedecor.com</li>
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
