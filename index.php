<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal | Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="auth.php" method="POST" id="registerForm">
            <input type="hidden" name="action" value="register">
            <h2>Create Account</h2>
            <input type="text" name="full_name" placeholder="Full Name" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" id="reg_password" placeholder="Password" required minlength="6"/>
            <button type="submit">Sign Up</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="auth.php" method="POST" id="loginForm">
            <input type="hidden" name="action" value="login">
            <h2>Student Login</h2>  
            <?php
                if(isset($_SESSION['error'])) {
                    echo '<p class="error-msg">' . $_SESSION['error'] . '</p>';
                    unset($_SESSION['error']);
                }
                if(isset($_SESSION['success'])) {
                    echo '<p class="success-msg">' . $_SESSION['success'] . '</p>';
                    unset($_SESSION['success']);
                }
            ?>
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit">Sign In</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h2>Welcome Back!</h2>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h2>Hello, Student!</h2>
                <p>Enter your personal details and start your journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>