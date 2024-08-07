<?php

//Inscription

include 'db.php';

if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["username"])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST["email"]);
    $username = validate($_POST["username"]);
    $password = validate($_POST["password"]);

    if (empty($email)) {
        header('Location: form.php?error=Email is required&form=register');
        exit();
    } elseif (empty($username)) {
        header('Location: form.php?error=Username is required&form=register');
        exit();
    } elseif (empty($password)) {
        header('Location: form.php?error=Password is required&form=register');
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: form.php?error=Invalid email format&form=register');
        exit();
    } else {
        $role = "none";

        $query = $pdo->prepare("INSERT INTO utilisateur (`email`, `username`, `password`, `role`) VALUES (?,?,?,?)");
        $query->execute(array($email, $username, $password, $role));
        header('Location: main.php');
        exit();
    }
} else {
    header('Location: form.php?error=All fields are required&form=register');
    exit();
}

