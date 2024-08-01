<?php

//Inscription

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'meowflix';
    // Establish the connection
    try {
    $pdo = new PDO("mysql:host=$servername, dbname= $dbname", $username, $password);
    } 
    catch (PDOException $e) {
        echo $e->getMessage();
    }
    
    if (isset($_POST["ok"])) {
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $role = "none";
    
        $query = $pdo ->prepare("INSERT INTO utilisateur (`email`, `username`, `password`, `admin`) VALUES (?,?,?,?)");
        $query -> execute(array($email, $username, $password, $role)); //use of md5 to secure pass ? 
        echo "Inscription Reussie !";
        header ("index.php");
    }

    // inclure caracters obligations


