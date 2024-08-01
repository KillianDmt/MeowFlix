<?php 
/* Il faut appeler session_start() sur chacune de vos pages AVANT d'écrire le moindre code HTML ou PHP (avant même la balise  <!DOCTYPE>  ). 

Si vous oubliez de lancer session_start()  , vous ne pourrez pas accéder à la variable superglobale   $_SESSION  */

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
              session_start();
              $queryUser = $pdo-> prepare('SELECT username FROM utilisateur WHERE email = ?');
              $queryUser->execute(array($_POST['email']));
              $_SESSION['username']=$query2->fetchColumn();
              echo $_SESSION['username'];
              $queryRole = $pdo->prepare('SELECT role From utilisateur WHERE email = ?');
              $queryRole->execute(array($_POST['email']));
              $_SESSION['role']=$queryRole->fetchColumn();
              header("Location : {url}");
              exit();

          } else {
              echo "Mot de passe incorrect";
          }
        
      }


      }
    }
  