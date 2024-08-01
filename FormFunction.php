<?php
// Authentification
    function formSignUp () {
        echo "<form action='Login.php' method='POST'>";
                    echo "<input type='text' name='email' placeholder='Email' required>";
                    echo "<input type='text' name='username' placeholder='Username' required>";
                    echo "<input type='password' name='password' placeholder='Password' required>";
                    echo "<button type='submit' class='signin-button'>Sign In</button>";
                    echo "<div class='remember-me'>";
                        echo "<input type='checkbox' name='Cookies' id='remember-me'>";
                        echo "<label for='remember-me'>Remember me</label>";
                    echo "</div>";
                    echo "<div class='Register'>";
                        echo "<a href='#'>Register</a>";
                    echo "</div>";
                    echo "<div class='PasswordLost'>";
                        echo "<a href='LostPass.php'>Forgot password?</a>";
                    echo "</div>";
                echo "</form>";
    }

    function formSignIn () {
        echo "<form action='Login.php' method='POST'>";
                    echo "<input type='text' name='email' placeholder='Email' required>";
                    echo "<input type='password' name='password' placeholder='Password' required>";
                    echo "<button type='submit' class='signin-button'>Sign In</button>";
                    echo "<div class='remember-me'>";
                        echo "<input type='checkbox' name='Cookies' id='remember-me'>";
                        echo "<label for='remember-me'>Remember me</label>";
                    echo "</div>";
                    echo "<div class='Register'>";
                        echo "<a onclick='formSignUp()'>Register</a>";
                    echo "</div>";
                    echo "<div onclick='PasswordLost.php'>";//change it like Up
                        echo "<a href='LostPass.php'>Forgot password?</a>";
                    echo "</div>";
                echo "</form>";
    }
