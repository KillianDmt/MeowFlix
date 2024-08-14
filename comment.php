<?php
session_start();


include 'db.php';

if (isset($_POST['send']) && isset($_SESSION['username'])) {
    $message = htmlspecialchars($_POST['message']);
    $videotitle = $_POST['videotitle'];
    $username = $_SESSION['username'];
    $date = date('Y-m-d');


    $stmt = $pdo->prepare("INSERT INTO comments (date, username, video_title, messages) VALUES (:date, :username, :video_title, :messages)");
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':video_title', $videotitle);
    $stmt->bindParam(':messages', $message);
    
    $stmt->execute();

    header("Location: main.php"); 
    exit();
}
?>