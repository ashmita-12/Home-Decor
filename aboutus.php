<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Elysian Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        .nav-center {
            display: flex;
            gap: 20px; /* Space between links */
            justify-content: center;
            margin-bottom: 20px;
        }
        .nav-center a {
            text-decoration: none;
            color: black; /* Light color for links */
            font-weight: 500;
            font-size: 1rem;
            transition: color 0.3s ease;
        }
        .nav-center a:hover {
            text-decoration: underline;
            color: purple;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }
        header {
            background: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }
        header h1 {
            font-size: 2.5em;
            letter-spacing: 1px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
        }
        .section {
            margin-bottom: 60px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }
        .section img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.4s ease;
        }
        .section img:hover {
            transform: scale(1.05);
        }
        .text-content {
            flex: 1;
            margin-left: 20px;
        }
        .text-content h2 {
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
            font-weight: 500;
        }
        .text-content p {
            font-size: 1.1em;
            color: #555;
            margin-bottom: 20px;
            line-height: 1.8;
        }
        .button {
            background-color: #4CAF50;
            color: #fff;
            padding: 12px 30px;
            font-size: 1.2em;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #45a049;
        }
        .team-member {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .team-member img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
        }
        .team-member div {
            flex: 1;
        }
        .team-member h3 {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 10px;
        }
        .team-member p {
            color: #777;
        }
        footer {
            background: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .fade-in {
            animation: fadeIn 1s ease-out;
        }

        @media (max-width: 768px) {
            .section {
                flex-direction: column;
                text-align: center;
            }
            .section img {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
<header>
    <h1>Elysian Home</h1>
    <p>Your destination for luxurious home decor</p>
</header>

<!-- Navigation Links -->
<nav class="nav-center">
    <a href="index.php">Home</a>
    <a href="aboutus.php">About Us</a>
    <a href="contactus.php">Contact Us</a>
    <a href="checkout.php">Purchase</a>
</nav>

<div class="container fade-in">
    <div class="section">
        <div class="text-content">
            <h2>About Us</h2>
            <p>At Elysian Home, we believe that your home should reflect your personality and style. We are an online store specializing in premium home decor products, offering a wide range of beautiful and elegant furniture, decor, and accessories for every room in your home. Our goal is to help you transform your living space into an oasis of comfort, beauty, and style.</p>
            <p>We curate the finest products from artisans and designers around the world, ensuring that each item brings quality and elegance to your home. Whether you're looking for luxurious furniture, trendy lighting, or unique decorative pieces, Elysian Home has something for every taste and preference.</p>
            <a href="index.php" class="button">Shop Now</a>
        </div>
        <img src="images/placeholder.jpg" alt="Home Decor" height="300px" style="padding-top: 11px"/>
    </div>

    <div class="section">
        <div class="text-content">
            <h2>Our Vision</h2>
            <p>Our vision is to provide customers with the most exquisite and high-quality home decor that suits their style and needs. We strive to create an online shopping experience that is seamless, enjoyable, and enriching. By blending style, functionality, and innovation, we aim to help our customers create living spaces that reflect their aspirations and lifestyles.</p>
        </div>
        <img src="images/Welcome.jpg" alt="Vision" height="300px" style="padding-top: 11px" />
    </div>

    <div class="section">
        <div class="text-content">
            <h2>Meet the Team</h2>
            <p>Our team is made up of passionate individuals who share a love for design and decor. From curating the finest collections to ensuring excellent customer service, our goal is to make your shopping experience effortless and enjoyable.</p>
        </div>
    </div>

    <div class="team-member">
        <div>
            <h3>Anushka Limbu</h3>
            <p>Founder & CEO</p>
            <p>Anushka is the creative mind behind Elysian Home. His passion for design and dedication to quality have made the brand a trusted name in the home decor industry.</p>
        </div>
    </div>

    <div class="team-member">
        <div>
            <h3>Ashmita Dahal</h3>
            <p>Chief Operating Officer</p>
            <p>Ashmita oversees the day-to-day operations of Elysian Home, ensuring that everything runs smoothly and efficiently, from order fulfillment to customer service.</p>
        </div>
    </div>

    <div class="team-member">
        <div>
            <h3>Subhechha Singh</h3>
            <p>Creative Director</p>
            <p>Subhechha leads the design team, working closely with designers and artisans to create collections that reflect the latest trends and timeless elegance.</p>
        </div>
    </div>

</div>

<footer>
    <p>&copy; 2025 Elysian Home | All Rights Reserved</p>
</footer>

</body>
</html>
