<?php 
 $servername="localhost";
 $username= "root";
 $pass= "";
 $dbname= "meowflix";
 $pdo;
 try {
   $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully"; // You can remove this line in production
} catch(PDOException $e) {
   echo "Connection failed: " . $e->getMessage();
   die(); // Stop script execution if connection fails
}