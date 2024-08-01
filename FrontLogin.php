<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Streaming Service</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <body>
        <div class="background"></div>
        <div class="container">
            <img src="https://assets.nflxext.com/en_us/layout/ecweb/netflix-logo.svg" alt="Meowflix" class="logo">
            <div class="login-box">
                <h1>Sign In</h1>
                <form action="Login.php" method="POST">
                    <input type="text" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" class="signin-button">Sign In</button>
                    <div class="remember-me">
                        <input type="checkbox" name="newsletterOn" id="remember-me">
                        <label for="remember-me">Remember me</label>
                    </div>
                    <div class="Register">
                        <a href="#">Register</a>
                    </div>
                    <div class="PasswordLost">
                        <a href="#">Forgot password?</a>
                    </div>
                </form>
            </div>
        </div>
        <footer>
            <div class="footer-content">
                <div class="footer-links">
                    <a href="#">link to github code source</a>
                    <a href="#">link to deployed site</a>
                </div>
            </div>
            <?php
           
            ?>
        </footer>
    </body>

</html>