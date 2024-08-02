<?php
require_once ('FormFunction.php');
?>
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
            <?php 
            require_once './FormFunction.php';

            formSignIn();
            ?>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <div class="footer-links">
                <a href="#">link to github code source</a>
                <a href="#">link to deployed site</a>
            </div>

        </footer>
        
    </body>


</html>