<?php 


    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = $_POST["email"];
      $pass = $_POST["password"];

      if($email!="" && $pass!= "") {
        $servername="localhost";
        $username= "root";
        $pass= "";
        $dbname= "meowflix";
        $pdo;
        try {
          $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully"; // You can remove this line in production
      } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
          die(); // Stop script execution if connection fails
      }

        if (isset($_POST['email'], $_POST['password'])) {
          $query = $pdo->prepare('SELECT password FROM utilisateur WHERE email = ?');
          $query->execute(array($_POST['email']));
      
          $Password = $query->fetchColumn();
      
          if ($_POST['password'] == $Password) {
              echo "Connexion réussie";
          } else {
              echo "Mot de passe incorrect";
          }
        
      }


      }
    }
  