
<?php
$host = 'localhost'; // Adresse du serveur
$db = 'meowflix'; // Nom de la base de données
$user = 'root'; // Nom d'utilisateur
$pass = ''; // Mot de passe
$charset = 'utf8mb4'; // Jeu de caractères

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$genre = 'action'; // Par exemple, récupérer les vidéos du genre "action"
$stmt = $pdo->prepare('SELECT title, thumbnails, descr FROM videos');// WHERE genre = ?
//$stmt->execute([$genre]);
$stmt->execute();
$videos = $stmt->fetchAll();
?>

<?php 
$X=1;
foreach ($videos as $video) {

    echo "<div class='item' style='--position: $X'>";
    echo "<img src='$video[thumbnails]'></p>";
    echo "</div>";
    $X++;
}


 ?>