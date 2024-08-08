<?php

//Inscription

    // $servername = 'localhost';
    // $username = 'root';
    // $password = '';
    // $dbname = 'meowflix';
    // // Establish the connection
    // try {
    // $pdo = new PDO("mysql:host=$servername, dbname= $dbname", $username, $password);
    // } 
    // catch (PDOException $e) {
    //     echo $e->getMessage();
    // }
    include 'db.php';

    
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){

            header('Location: login2.php?error=Invalid email format&form=register');
            
        } else {
            function validate($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            $email = $_POST["email"];
            $username = validate($_POST["username"]);
            $password = validate($_POST["password"]);
            $role = "none";
        
            $query = $pdo ->prepare("INSERT INTO utilisateur (`email`, `username`, `password`, `role`) VALUES (?,?,?,?)");
            $query -> execute(array($email, $username, $password, $role)); //use of md5 to secure pass ? 
            echo "Inscription Reussie !";
            header ("main.php");
        }
    }


    // inclure caracters obligations


