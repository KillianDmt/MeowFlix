<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    if (isset($_POST['logout'])) {

        session_unset();
        session_destroy();

        header("Location: form.php");
    }

    if (isset($_POST["searchBar"])) {

        header("searchOut.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cattoflix</title>
    <link rel="stylesheet" href="assets/mainstyle.css"> 
    <link rel="stylesheet" href="assets/modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon"  href="assets\images\minilogo.png" type="image/icon">
  </head>
  <body>
    <header>
        <nav>
            <div class="logodiv">
                <img src="assets\images\logo.png">
                    <h1>CATTOFLIX</h1>
                    <p style="color: red;">Hello, <?php echo $_SESSION['username']; ?></p>
            </div>

            
            <form action="searchOut.php" method="POST" class="searchdiv">
                <input type="search" method="POST" name="searchBar" placeholder="Search for any movie">
                <!-- <button><i class="fa-solid fa-bars"></i></button> -->
            </form>
        </nav>
    </header>
    <aside>
        <div class="sidebar-content1">
            <!-- <img alt="logo" src="assets\images\logo.png"> -->
            <h1>Genres</h1>
            <ul>
                <li><a href="">Birds</a></li>
                <li><a href="">Fish</a></li>
                <li><a href="">Games</a></li>
                <li><a href="">Cathub</a></li>
            </ul>
        </div>
        <div class="sidebar-content2">
            <h1>Options</h1>
            <ul>
                <li><a href="">Search</a></li>
                <li><a href="">BackOffice</a></li>
                <li><a href="">CGU</a></li>
            </ul>
        </div>
        <div class="logout-container">
                <form action="" method="post"><button type="submit" name="logout" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</button></form>
        </div>
    </aside>
    <!-- <div> if u want the space to the right side just re-active this div-->
        <div class="featured">
            <div class="featured-content">
                <img src="https://via.placeholder.com/300x100?text=MONEY+HEIST" alt="logo" class="logo" />
                <div>
                    <span class="rating">8.8/10</span>
                    <span class="streams">2K+ Streams</span>
                </div>
            </div>
        </div>
        <main>
            <h2 id="titlecarousel1" class="row-title">Birds</h2>
            <div id="carousel1" class="slider" style="
                --width: 200px;
                --height: 200px;
                --quantity: 9;
            ">
                <div class="list">
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
                    
                    $tags = 'birds'; // Par exemple, récupérer les vidéos du genre "action"
                    $stmt = $pdo->prepare('SELECT title, thumbnails, descr FROM video WHERE SearchTag = ?');// 
                    $stmt->execute([$tags]);
                    $stmt->execute();
                    $videos = $stmt->fetchAll();


                    $X=1;
                    foreach ($videos as $video) {
                        //How to include modals in it ?
                        echo "<div class='item' style='--position: $X'>";
                        echo "<img src='$video[thumbnails]'></p>";
                        //include("./modal.php"); Séparer modal et button 
                        echo "</div>";
                        $X++;
                    }

                    ?>
                </div>
            </div>
            
            <h2 id="titlecarousel2"class="row-title">Cats</h2>
            <div id="carousel2" class="slider" reverse="true" style="
                --width: 200px;
                --height: 200px;
                --quantity: 9;
            ">
                <div class="list">
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
                    
                    $tags = 'cats'; // Par exemple, récupérer les vidéos du genre "action"
                    $stmt = $pdo->prepare('SELECT title, thumbnails, descr FROM video WHERE SearchTag = ?');// 
                    $stmt->execute([$tags]);
                    $stmt->execute();
                    $videos = $stmt->fetchAll();


                    $X=1;
                    foreach ($videos as $video) {
                        //How to include modals in it ?
                        echo "<div class='item' style='--position: $X'>";
                        echo "<img src='$video[thumbnails]'></p>";
                        //include("./modal.php"); Séparer modal et button 
                        echo "</div>";
                        $X++;
                    }

                    ?>
                </div>
            </div>
            <h2 id="titlecarousel1" class="row-title">Fish</h2>
            <div id="carousel1" class="slider" style="
                --width: 200px;
                --height: 200px;
                --quantity: 9;
            ">
                <div class="list">
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
                    
                    $tags = 'fish'; // Par exemple, récupérer les vidéos du genre "action"
                    $stmt = $pdo->prepare('SELECT id, title, thumbnails, descr FROM video WHERE SearchTag = ?');// 
                    $stmt->execute([$tags]);
                    $stmt->execute();
                    $videos = $stmt->fetchAll();


                    $X=1;
                    foreach ($videos as $video) {
                        //How to include modals in it ?
                        echo "<div class='item' style='--position: $X'>";
                        echo "<img src='$video[thumbnails]'></p>";
                        //include("./modal.php"); Séparer modal et button 
                        echo "</div>";
                        $X++;
                    }

                    ?>
               </div>
            </div>
            
            <h2 id="titlecarousel2"class="row-title">Games</h2>
            <div id="carousel2" class="slider" reverse="true" style="
                --width: 200px;
                --height: 200px;
                --quantity: 9;
            ">
                <div class="list">
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
                    
                    $tags = 'games%20for%20cats'; // Par exemple, récupérer les vidéos du genre "action"
                    $stmt = $pdo->prepare('SELECT id, title, thumbnails, descr FROM video WHERE SearchTag = ?');// 
                    $stmt->execute([$tags]);
                    $stmt->execute();
                    $videos = $stmt->fetchAll();



                    $X=1;
                    foreach ($videos as $video) {
                        $title="".$video["title"]."";
                        $description= "".$video["descr"]."";
                        $vid="".$video["id"]."";
                        echo "<div class='item' data-title='$title' data-description='$description' data-video-url='https://www.youtube.com/embed/$vid' style='--position: $X'>";
                        echo "<img src='$video[thumbnails]'></p>"; 
                        echo "</div>";
                        $X++;
                    }

                    ?>
                </div>
            </div>
        </main>
      </div>
    <!-- </div> -->

        <!-- modal -->
        <div class="modal">
            <button class="close-modal">X</button>
            <div class="modal-header">
                <div class="modal-video">
                    <iframe class="video-player" src="https://www.youtube.com/embed/yySWoxNgoQM?si=uZ7CAPVi3NlewpWd&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="modal-descriptions">
                    <h1 class="title">Insert title</h1>
                    <p class="author">channel name or author name</p>
                    <p>Here's the description of the videosdasd sdasda dasdsd adsad as sdsds sdsd sdsa dd asdsa dsadsdasd sadsa sdadsdsaaaaaaaaaaaaaaaa saaaaa. Here's the description of the videosdasd sdasda dasdsd adsad as sdsds sdsd sdsa dd asdsa dsadsdasd sadsa sdadsdsaaaw</p>
                </div>
            </div>
            <div class="modal-body">
                <h2>Comments</h2>
                <form action="" method="post">
                    <input type="text" name="message" placeholder="Leave a comment here">
                    <button type="submit" name="send" class="send">Send</button>
                </form>

                <div class="modal-comments">

                    <!-- start example of comment...we will generate them with php from the database so I know what I did is usless u.u-->
                    <?php if (isset($_POST['send'])) { ?>
                        <div class="comment">
                            <p class="date"><?= date('Y-m-d H:i:s'); ?></p>
                            <h3><?= $_SESSION['username']; ?>:</h3>
                            <p class="message-txt"><?= $_POST['message']; ?></p>
                        </div>
                        <div class="comment">
                            <p class="date"><?= date('Y-m-d H:i:s'); ?></p>
                            <h3><?= $_SESSION['username']; ?>:</h3>
                            <p class="message-txt"><?= $_POST['message']; ?></p>
                        </div>
                        <div class="comment">
                            <p class="date"><?= date('Y-m-d H:i:s'); ?></p>
                            <h3><?= $_SESSION['username']; ?>:</h3>
                            <p class="message-txt"><?= $_POST['message']; ?></p>
                        </div>
                        <div class="comment">
                            <p class="date"><?= date('Y-m-d H:i:s'); ?></p>
                            <h3><?= $_SESSION['username']; ?>:</h3>
                            <p class="message-txt"><?= $_POST['message']; ?></p>
                        </div>
                        <div class="comment">
                            <p class="date"><?= date('Y-m-d H:i:s'); ?></p>
                            <h3><?= $_SESSION['username']; ?>:</h3>
                            <p class="message-txt"><?= $_POST['message']; ?></p>
                        </div>
                    <?php }; ?>
                    <!-- end comment generated -->

                </div>
            </div>
        </div>
        <script src="feature\modal.js"></script>
  </body>
</html>
<?php } else {
    header('Location: form.php');
} ?>