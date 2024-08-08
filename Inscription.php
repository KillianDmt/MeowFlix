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
    function emailExists($email) 
        // Supposons que $db est votre connexion à la base de données
        $query = "SELECT COUNT(*) FROM utilisateurs WHERE email = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    
    
    // Lors de l'inscription
    if (emailExists($email)) {
        echo "Cette adresse e-mail est déjà utilisée.";
    } else {
        // Procédez à l'inscription
    }

    // inclure caracters obligations


