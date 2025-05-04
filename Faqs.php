<?php
$faqs = [
    [
        "question" => "What is HomeDecor (Elysian Home)?",
        "answer" => "HomeDecor, under the project Elysian Home, is your one-stop destination for premium, stylish, and affordable home decor products."
    ],
    [
        "question" => "What products do you offer?",
        "answer" => "We offer a wide range of home decor items including furniture, wall art, rugs, lighting, cushions, kitchen decor, and more."
    ],
    [
        "question" => "How do I place an order?",
        "answer" => "Browse our collections, add items to your cart, and proceed to checkout to complete your order."
    ],
    [
        "question" => "Do you offer customization?",
        "answer" => "Yes, selected products offer customization options like fabric choice, size adjustments, and color selections."
    ],
    [
        "question" => "What payment methods do you accept?",
        "answer" => "We accept credit/debit cards, net banking, UPI, wallets, and cash on delivery (available in select locations)."
    ],
    [
        "question" => "How long will delivery take?",
        "answer" => "Delivery usually takes 5–10 business days depending on your location."
    ],
    [
        "question" => "Can I track my order?",
        "answer" => "Yes, a tracking ID will be sent via email and SMS after dispatch."
    ],
    [
        "question" => "What is your return policy?",
        "answer" => "We offer a 7-day return window for most products, provided they are unused and in original packaging."
    ],
    [
        "question" => "What if my product arrives damaged?",
        "answer" => "Contact us within 48 hours of delivery with photos; we’ll arrange a replacement or refund."
    ],
    [
        "question" => "How do I contact customer support?",
        "answer" => "Email us at support@homedecor.com or call 9843957746. Live chat is available 10 AM – 8 PM (Mon-Sat)."
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FAQs - HomeDecor (Elysian Home)</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 30px;
            background: linear-gradient(to right, #f8f9fa, #e0e0e0);
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #444;
            margin-bottom: 40px;
            position: relative;
        }
        h1::after {
            content: '';
            width: 80px;
            height: 4px;
            background: #ff7e5f;
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }
        .faq {
            margin-bottom: 20px;
            padding: 20px;
            background: #f7f7f7;
            border-radius: 10px;
            transition: background 0.3s ease;
            cursor: pointer;
        }
        .faq:hover {
            background: #ffe8d6;
        }
        .faq-header {
            display: flex;
            align-items: center;
        }
        .faq-header img {
            width: 30px;
            margin-right: 15px;
        }
        .faq h3 {
            margin: 0;
            color: #333;
            font-size: 20px;
        }
        .faq p {
            margin: 10px 0 0 45px;
            color: #555;
            font-size: 16px;
            display: none;
        }
        .faq.open p {
            display: block;
            animation: fadeIn 0.5s;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px);}
            to { opacity: 1; transform: translateY(0);}
        }
    </style>
    <script>
        function toggleFaq(element) {
            element.classList.toggle('open');
        }
    </script>
</head>
<body>

<div class="container">
    <h1>FAQs – HomeDecor (Elysian Home)</h1>

    <?php foreach ($faqs as $faq): ?>
        <div class="faq" onclick="toggleFaq(this)">
            <div class="faq-header">
                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" alt="FAQ Icon">
                <h3><?php echo htmlspecialchars($faq["question"]); ?></h3>
            </div>
            <p><?php echo htmlspecialchars($faq["answer"]); ?></p>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
