<?php

$servername="localhost";
$username= "root";
$password= "";
$dbname= "meowflix";

try {
  $pdo = new PDO("mysql:host=$servername, dbname= $dbname", "$username", "$password");
  } 
  catch (PDOException $e) {
      echo $e->getMessage();
} 