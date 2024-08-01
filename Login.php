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
              /* Cookies ?*/
                if ($_POST['Cookies']) {
                $queryUser = $pdo-> prepare('SELECT username FROM utilisateur WHERE email = ?');
                $queryUser->execute(array($_POST['email']));
                $user=$query2->fetchColumn();
                echo $_SESSION['username'];
                $queryRole = $pdo->prepare('SELECT role From utilisateur WHERE email = ?');
                $queryRole->execute(array($_POST['email']));
                $role=$queryRole->fetchColumn();
                $queryId = $pdo->prepare('SELECT id From utilisateur WHERE email = ?');
                $queryId->execute(array($_POST['email']));
                $Id=$queryId->fetchColumn();

                // retenir l'email de la personne connectée pendant 1 an 

                //Must Appear before Html tags
                setcookie(
                  'LOGGED_USER',
                  '$user',
                    [
                        //'expires' => 
                        time() + (365*24*3600),
                        'secure' => true,
                        'httponly' => true,
                    ]
                );
                setcookie(
                  'LOGGED_USER_ROLE',
                  '$role',
                    [
                        //'expires' => 
                        time() + 365*24*3600,
                        'secure' => true,
                        'httponly' => true,
                    ]
                );
                // faire la fonction en global v
                if (isset($_COOKIE['LOGGED_USER'])) {
                echo $_COOKIE['LOGGED_USER'];
                echo $_COOKIE['LOGGED_USER_ROLE'];}
                }
              
              header("Location : {url}");
              exit();

          } else {
              echo "Mot de passe incorrect";
          }
        
      }


      }
    }
  