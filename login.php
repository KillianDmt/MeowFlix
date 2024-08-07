<?php
/* Il faut appeler session_start() sur chacune de vos pages AVANT d'écrire le moindre code HTML ou PHP (avant même la balise  <!DOCTYPE>  ). 

Si vous oubliez de lancer session_start()  , vous ne pourrez pas accéder à la variable superglobale   $_SESSION  */

include 'db.php';

if (isset($_POST['email'], $_POST['password'])) {
  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $email = validate($_POST["email"]);
  $password = validate($_POST["password"]);

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    header('Location: form.php?error=Invalid email&form=login');

  } else {
    $query = $pdo->prepare('SELECT password FROM utilisateur WHERE email = ?');
    $query->execute(array($email));

    $Password = $query->fetchColumn();

    if ($password == $Password) {

      session_start();
      $queryUser = $pdo->prepare('SELECT username FROM utilisateur WHERE email = ?');
      $queryUser->execute(array($email));
      $_SESSION['username'] = $queryUser->fetchColumn();
      echo $_SESSION['username'];
      $queryRole = $pdo->prepare('SELECT role From utilisateur WHERE email = ?');
      $queryRole->execute(array($email));
      $_SESSION['role'] = $queryRole->fetchColumn();



      /* Cookies ?*/
      if ($_POST['Cookies']) {
        $queryUser = $pdo->prepare('SELECT username FROM utilisateur WHERE email = ?');
        $queryUser->execute(array($email));
        $user = $queryUser->fetchColumn();
        echo $_SESSION['username'];
        $queryRole = $pdo->prepare('SELECT role From utilisateur WHERE email = ?');
        $queryRole->execute(array($email));
        $role = $queryRole->fetchColumn();
        $queryId = $pdo->prepare('SELECT id From utilisateur WHERE email = ?');
        $queryId->execute(array($email));
        $Id = $queryId->fetchColumn();

        // retenir l'email de la personne connectée pendant 1 an 

        //Must Appear before Html tags
        setcookie(
          'LOGGED_USER',
          '$user',
          [
            //'expires' => 
            time() + (365 * 24 * 3600),
            'secure' => true,
            'httponly' => true,
          ]
        );
        setcookie(
          'LOGGED_USER_ROLE',
          '$role',
          [
            //'expires' => 
            time() + 365 * 24 * 3600,
            'secure' => true,
            'httponly' => true,
          ]
        );
        // faire la fonction en global v
        if (isset($_COOKIE['LOGGED_USER'])) {
          echo $_COOKIE['LOGGED_USER'];
          echo $_COOKIE['LOGGED_USER_ROLE'];
        }
      }

      header('Location: main.php');
      exit();
    } else {
      header('Location: form.php?error=Password or Email incorrect&form=login');
    }
  }
}
