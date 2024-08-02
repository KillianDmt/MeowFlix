<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="icon" href="assets\images\minilogo.png" type="image/icon">
</head>

<body>
    <div class="background"></div>
    <div class="container">
        <img src="assets\images\logo.png" alt="Cattoflix logo" class="logo">
        <div class="login-box">
            <h1>Sign In</h1>
            <form>
                <input type="text" placeholder="Email" required>
                <input type="password" placeholder="Password" required>
                <button type="submit" class="signin-button">Sign In</button>
                <div class="remember-me">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
            </form>
            <form method="$_POST">
                <div class="alternate-signin">
                    <a href="#">New to Cattoflix? Register now</a>
                </div>
            </form>
            <div class="alternate-signin">
                <a href="#">Forgot Password?</a>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <div class="footer-links">
                <a href="#">link to github code source</a>
                <a href="#">link to deployed site</a>
            </div>
        </div>
    </footer>
</body>

</html>