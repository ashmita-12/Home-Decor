<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CineReserve</title>
    <link rel="stylesheet" href="style.css" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
     />
     <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">


    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <style>
      .social {
        cursor: pointer;
      }
    </style>

    <!--link for the js in script.js -->
    
  </head>
  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <div>
      <nav class="nav">
        <div id="nav-left">
            <img
                src="images/plogo.png"
                alt="ElysianHome"
                height="80px"
                width="90px"
            />
        </div>
        
        <div class="nav-center">
          <a href="index.php">Home</a>
          <a href="aboutus.php">About Us</a>
          <a href="contactus.php">Contact Us</a>
          <a href="checkout.php">Purchase</a>
      </div>

      <div id="nav-right" class="nav-right">
        <!-- Search Bar -->
        <div class="search-bar">
          <input type="text" placeholder="Search..." />
          <button type="submit" class="search-button" aria-label="Search">
            <i class="fas fa-search"></i>
          </button>
        </div>
      
        <!-- Hamburger Menu Button -->
        <button class="hamburger" aria-label="Menu">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </button>
      
        <!-- Sign-In Button -->
        <button
          class="login-trigger primary"
          data-target="#login"
          data-toggle="modal"
        >
          <span class="sign-in-text">Sign In</span>
          <i class="fas fa-user sign-in-icon"></i>
        </button>
      </div>
      
      </nav>
    </div>
    <div class="slider">
      <div class="swiper mySwiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide">
            <img src="images/hd6.jpg" alt="Living Room" />
          </div>
          <div class="swiper-slide">
            <img src="images/hd2.jpg" alt="Sofa" />
          </div>
          <div class="swiper-slide">
            <img src="images/hd4.jpg" alt="Jujutsu Kaisen" />
          </div>
          <div class="swiper-slide">
            <img src="images/hd5.jpg" alt="Jujutsu Kaisen" />
          </div>
          ...
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
      </div>
    </div>
      <!-- Product Categories & Products Section -->
  <div class="product-section" style="padding: 40px;">
    <h1 style="text-align: center; font-size: 36px; margin-bottom: 20px;">Product Categories</h1>
    <p style="text-align: center; font-size: 18px; color: #666;">Explore our wide range of products</p>

    <!-- PHP code to fetch and display categories and products -->

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
session_start(); // Add this at the top
$categoryResult = $conn->query("SELECT * FROM categories");

while ($category = $categoryResult->fetch_assoc()) {
    echo "<div style='margin-bottom: 40px'>";
    echo "<h2>" . htmlspecialchars($category['name']) . "</h2>";

    $categoryId = $category['id'];
    $subcatResult = $conn->query("SELECT * FROM subcategories WHERE category_id = $categoryId");

    while ($subcat = $subcatResult->fetch_assoc()) {
        echo "<h3 style='margin-left: 20px;'>" . htmlspecialchars($subcat['name']) . "</h3>";

        $subcatId = $subcat['id'];
        $productResult = $conn->query("SELECT * FROM products WHERE subcategory_id = $subcatId");

        echo "<div class='product-row' style='display: flex; gap: 20px; overflow-x: auto; padding-bottom: 10px; margin-left: 20px; white-space: nowrap;'>";

        while ($product = $productResult->fetch_assoc()) {
            echo "<div class='product-card' style='width: 200px; border: 1px solid #ccc; padding: 10px; border-radius: 10px; background: #fdfdfd; text-align: center; flex-shrink: 0; display: flex; flex-direction: column; justify-content: space-between;'>";
            
            echo "<img src='images/" . htmlspecialchars($product['image']) . "' style='width: 100%; height: 80px; object-fit: cover; border-radius: 5px;'>";
            
            echo "<h4 style='margin: 5px 0; font-size: 14px;'>" . htmlspecialchars($product['name']) . "</h4>";
            
            echo "<div class='product-description' style='height: 60px; overflow-y: auto; overflow-x: hidden; font-size: 12px; line-height: 1.4em; padding-right: 5px; text-align: left; word-wrap: break-word;'>";
            echo nl2br(htmlspecialchars($product['description']));
            echo "</div>";
            
            // Add to Cart Button
            echo "<form action='add_to_cart.php' method='post' style='margin-top: 10px;'>";
            echo "<input type='hidden' name='id' value='" . $product['id'] . "'>";
            echo "<input type='hidden' name='name' value='" . htmlspecialchars($product['name']) . "'>";
            echo "<input type='hidden' name='price' value='" . $product['price'] . "'>";
            echo "<input type='hidden' name='image' value='" . htmlspecialchars($product['image']) . "'>";
            echo "<button type='submit' style='background: #4CAF50; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer; width: auto;'>Add to Cart</button>";

            echo "</form>";



            
            echo "</div>"; // End product-card
        }

        echo "</div>"; // End product-row
    }

    echo "</div>"; // End category section
}

// Display Cart Link (top-right corner)
echo "<div style='position: fixed; top: 20px; right: 20px;'>";
$cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
echo "<a href='checkout.php' style='background: #4CAF50; color: white; padding: 8px 15px; text-decoration: none; border-radius: 3px;'>";
echo "Cart (<span id='cart-count'>" . $cartCount . "</span>)";
echo "</a>";
echo "</div>";
?>


</div>

  <footer>
    <img
      src="images/plogo.png"
      alt="CineReserve"
      height="100px"
      width="100px"
    />
    <div class="flex" style="padding-top: 20px">
      <img
        src="https://img.icons8.com/?size=100&id=118497&format=png&color=000000"
        alt="facebook"
      />
      <img
        src="https://img.icons8.com/?size=100&id=32323&format=png&color=000000"
        alt="instagram"
      />
      <img
        src="https://img.icons8.com/?size=100&id=AltfLkFSP7XN&format=png&color=000000"
        alt="whatsapp"
      />
    </div>
    <div
      style="
        color: rgb(104, 104, 104);
        font-size: 18px;
        font-weight: 500;
        padding-top: 20px;
        padding-bottom: 8px;
      "
    >
      Get Latest Movie Updates
    </div>
    <div class="send-email">
      <input type="email" placeholder="Enter your Email ID" />
      <div>
        <img
          src="https://img.icons8.com/?size=100&id=2837&format=png&color=ffffff"
        />
      </div>
    </div>

    <ul class="list-inline">
      <li class="list-inline-item">
        <a class="footer_new_link" href="aboutus.php">About Us</a>
      </li>
      <li class="list-inline-item">
        <a class="footer_new_link" href="Faqs.php">FAQs</a>
      </li>
      <li class="list-inline-item">
        <a class="footer_new_link" href="termsandcondition.php">Terms and Conditions</a>
      </li>
      <li class="list-inline-item">
        <a class="footer_new_link" href="privacypolicy.php">Privacy Policy</a>
      </li>
      <li class="list-inline-item">
        <a class="footer_new_link" href="returnandrefundpolicy.php">Return and Refund Policy</a>
      </li>
    </ul>
    <div
      style="
        display: flex;
        gap: 4px;
        font-size: 12px;
        color: rgb(104, 104, 104);
      "
    >
      <img
        src="https://img.icons8.com/?size=100&id=14577&format=png&color=686868"
        height="16px"
        style="padding-top: 11px"
      />
      <p>All Rights Reserved</p>
    </div>
  </footer>

    <div id="login" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="container" id="container">
              <div class="form-container sign-up-container">
                <form action="#">
                  <h1>Create Account</h1>
                  <div class="social-container">
                    <a href="#" class="social"
                      ><i class="fab fa-facebook-f"></i
                    ></a>
                    <a href="#" class="social"
                      ><i class="fab fa-google-plus-g"></i
                    ></a>
                    <a href="#" class="social"
                      ><i class="fab fa-linkedin-in"></i
                    ></a>
                  </div>
                  <span>or use your email for registration</span>
                  <input type="text" placeholder="Name" />
                  <input type="email" placeholder="Email" />
                  <input type="password" placeholder="Password" />
                  <button class="btn">Sign Up</button>
                </form>
              </div>
              <div class="form-container sign-in-container">
                <form action="#">
                  <h1>Sign in</h1>
                  <div class="social-container">
                    <a href="#" class="social"
                      ><i class="fab fa-facebook-f"></i
                    ></a>
                    <a href="#" class="social"
                      ><i class="fab fa-google-plus-g"></i
                    ></a>
                    <a href="#" class="social"
                      ><i class="fab fa-linkedin-in"></i
                    ></a>
                  </div>
                  <span>or use your account</span>
                  <input type="email" placeholder="Email" />
                  <input type="password" placeholder="Password" />
                  <a href="#" class="forgot">Forgot your password?</a>
                  <button class="btn">Sign In</button>
                </form>
              </div>
              <div class="overlay-container">
                <div class="overlay">
                  <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>
                      To keep connected with us please login with your personal
                      info
                    </p>
                    <button class="btn ghost" id="signIn">Sign In</button>
                  </div>
                  <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="btn ghost" id="signUp">Sign Up</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      const signUpButton = document.getElementById("signUp");
      const signInButton = document.getElementById("signIn");
      const container = document.getElementById("container");

      signUpButton.addEventListener("click", () => {
        container.classList.add("right-panel-active");
      });

      signInButton.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
      });
    </script>
    <script type="module">
      import Swiper from "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs";
      const swiper = new Swiper(".mySwiper", {
        autoplay: { delay: 5000 },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
    <script src="script.js"></script>
    <script>
  $(document).ready(function () {
    $(".add-to-cart-form").on("submit", function (e) {
      e.preventDefault(); // prevent form from submitting normally

      const form = $(this);
      const formData = form.serialize();

      $.ajax({
        url: "add_to_cart.php",
        type: "POST",
        data: formData,
        success: function (response) {
          // Assuming the response is the new cart count
          $("#cart-count").text(response);
        },
        error: function () {
          alert("Failed to add to cart. Please try again.");
        }
      });
    });
  });
</script>

  </body>
</html>
