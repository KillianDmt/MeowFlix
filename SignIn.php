<?php
// Authentification
    function formAuth ($message) {
        echo "<form action='backoffice.php' method='POST'>\n";
        echo "<table>\n";
        echo "<tr>";
        echo "<td>Username : </td>";
        echo "<td><input type='text' name='username'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Password : </td>";
        echo "<td><input type='password' name='password' ></td>";
        echo "</tr>";
        echo "</table>";
        echo "<input type='submit' name='connexion' value='connexion' />\n";
        echo "</form>\n";

        // Is it the way V
        echo "<a href='ForgotPassword.php'>Lost Credentials...</a>\n";
        echo "<a href='signin.php'> Register </a>\n";
    
        if ($message) echo"<p>Wrong Logins</p>\n";
    }
