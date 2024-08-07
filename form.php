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
            <form id="form1" action="login.php" method="post">
            <h1>Sign In</h1>
            <?php if (isset($_GET['error']) && $_GET['form'] === 'login') { ?>
                    <div class="alert"><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span><?=$_GET['error']?></div>
                <?php }?>
                <input type="text" name='email' placeholder="Email">
                <input type="password" name='password' placeholder="Password">
                <button type="submit" name="sign" class="signin-button">Sign In</button>
                <div class="remember-me">
                    <input type="checkbox" class="remember-me" id="remember1">
                    <label for="remember-me">Remember me</label>
                </div>
                <div class="alternate-signin">
                    <a href="#" data-form-id="form2">New to Cattoflix? Register now</a>
                </div>

            </form>
            <form id="form2" action="Inscription.php" method="post" style="display: none;">
                <h1>Register now</h1>
                <?php if (isset($_GET['error']) && $_GET['form'] === 'register') { ?>
                    <div class="alert"><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span><?=$_GET['error']?></div>
                <?php } ?>
                <input type="text" name='username' placeholder="Username">
                <input type="text" name='email' placeholder="Email">
                <input type="password" name='password' placeholder="Password">
                <button type="submit" name="register" class="signin-button">Register</button>
                <div class="remember-me">
                    <input type="checkbox" class="remember-me" id="remember2">
                    <label for="remember-me">Remember me</label>
                </div>
                <div class="alternate-signin">
                    <a href="#" data-form-id="form1">Already have an account? Login now</a>
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
    <script src="feature\formscript.js"></script>
</body>
</html>