<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
        }
        .modal-content {
            background: white;
            margin: 10% auto;
            padding: 20px;
            width: 300px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close-modal" style="float: right; cursor: pointer;">&times;</span>
        <h2>Sign In</h2>
        
        <?php if (isset($_SESSION['login_error'])): ?>
            <div style="color: red; margin-bottom: 15px;">
                <?= $_SESSION['login_error'] ?>
                <?php unset($_SESSION['login_error']); ?>
            </div>
        <?php endif; ?>
        
        <form action="process_login.php" method="post">
            <input type="email" name="email" placeholder="Email" required style="width: 100%; padding: 8px; margin-bottom: 10px;">
            <input type="password" name="password" placeholder="Password" required style="width: 100%; padding: 8px; margin-bottom: 10px;">
            <button type="submit" style="width: 100%; padding: 10px; background: #4CAF50; color: white; border: none;">Sign In</button>
        </form>
        
        <div style="margin-top: 15px; text-align: center;">
            <a href="register.php">Create Account</a> | 
            <a href="forgot_password.php">Forgot Password?</a>
        </div>
    </div>
</div>

<script>
// Close modal
document.querySelector('.close-modal').addEventListener('click', function() {
    document.getElementById('loginModal').style.display = 'none';
});

// Close when clicking outside
window.addEventListener('click', function(event) {
    if (event.target == document.getElementById('loginModal')) {
        document.getElementById('loginModal').style.display = 'none';
    }
});

// Open modal if redirected from checkout
<?php if (isset($_SESSION['checkout_redirect'])): ?>
    document.getElementById('loginModal').style.display = 'block';
<?php unset($_SESSION['checkout_redirect']); ?>
<?php endif; ?>
</script>

</body>
</html>
