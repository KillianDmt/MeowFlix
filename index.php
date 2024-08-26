<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    if (isset($_POST['logout'])) {

        session_unset();
        session_destroy();

        header("Location: pages/form.php");
    }

    if (isset($_POST["searchBar"])) {

        header("Location: pages/searchOut.php");
    }

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cattoflix</title>
        <link rel="stylesheet" href="assets/mainstyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="icon" href="assets\images\minilogo.png" type="image/icon">
    </head>

    <body>
        <header>
            <nav>
                <div class="logodiv">
                    <img src="assets\images\logo.png">
                    <h1>CATTOFLIX</h1>
                    <p style="color: red;">Hello, <?php echo $_SESSION['username']; ?></p>
                </div>


                <form action="pages/searchOut.php" method="POST" class="searchdiv">
                    <input type="search" method="POST" name="searchBar" placeholder="Search for any movie">
                </form>
            </nav>
        </header>
        <aside>
            <div class="sidebar-content1">
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
                    <li><a href="">CGU</a></li>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') { ?>
                        <?= '<li><a href="pages/backoffice.php">Backoffice</a></li>' ?>
                    <?php } ?>
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
                    include 'db.php';

                    $tags = 'birds'; // Par exemple, récupérer les vidéos du genre "action"
                    $stmt = $pdo->prepare('SELECT id, title, thumbnails, descr FROM video WHERE SearchTag = ?'); // 
                    $stmt->execute([$tags]);
                    $stmt->execute();
                    $videos = $stmt->fetchAll();


                    $X = 1;
                    foreach ($videos as $video) {
                        $title = "" . $video["title"] . "";
                        $description = "" . $video["descr"] . "";
                        $vid = "" . $video["id"] . "";
                        echo "<div class='item' data-title='$title' data-description='$description' data-video-url='https://www.youtube.com/embed/$vid' style='--position: $X'>";
                        echo "<img src='$video[thumbnails]'></p>";
                        echo "</div>";
                        $X++;
                    }

                    ?>
                </div>
            </div>

            <h2 id="titlecarousel2" class="row-title">Cats</h2>
            <div id="carousel2" class="slider" reverse="true" style="
                --width: 200px;
                --height: 200px;
                --quantity: 9;
            ">
                <div class="list">
                    <?php
                    include 'db.php';

                    $tags = 'cats'; // Par exemple, récupérer les vidéos du genre "action"
                    $stmt = $pdo->prepare('SELECT id, title, thumbnails, descr FROM video WHERE SearchTag = ?'); // 
                    $stmt->execute([$tags]);
                    $stmt->execute();
                    $videos = $stmt->fetchAll();


                    $X = 1;
                    foreach ($videos as $video) {
                        $title = "" . $video["title"] . "";
                        $description = "" . $video["descr"] . "";
                        $vid = "" . $video["id"] . "";
                        echo "<div class='item' data-title='$title' data-description='$description' data-video-url='https://www.youtube.com/embed/$vid' style='--position: $X'>";
                        echo "<img src='$video[thumbnails]'></p>";
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
                    include 'db.php';

                    $tags = 'fish'; // Par exemple, récupérer les vidéos du genre "action"
                    $stmt = $pdo->prepare('SELECT id, title, thumbnails, descr FROM video WHERE SearchTag = ?'); // 
                    $stmt->execute([$tags]);
                    $stmt->execute();
                    $videos = $stmt->fetchAll();


                    $X = 1;
                    foreach ($videos as $video) {
                        $title = "" . $video["title"] . "";
                        $description = "" . $video["descr"] . "";
                        $vid = "" . $video["id"] . "";
                        echo "<div class='item' data-title='$title' data-description='$description' data-video-url='https://www.youtube.com/embed/$vid' style='--position: $X'>";
                        echo "<img src='$video[thumbnails]'></p>";
                        echo "</div>";
                        $X++;
                    }

                    ?>
                </div>
            </div>

            <h2 id="titlecarousel2" class="row-title">Games</h2>
            <div id="carousel2" class="slider" reverse="true" style="
                --width: 200px;
                --height: 200px;
                --quantity: 9;
            ">
                <div class="list">
                    <?php
                    include 'db.php';

                    $tags = 'games%20for%20cats'; // Par exemple, récupérer les vidéos du genre "action"
                    $stmt = $pdo->prepare('SELECT id, title, thumbnails, descr FROM video WHERE SearchTag = ?'); // 
                    $stmt->execute([$tags]);
                    $stmt->execute();
                    $videos = $stmt->fetchAll();



                    $X = 1;
                    foreach ($videos as $video) {
                        $title = "" . $video["title"] . "";
                        $description = "" . $video["descr"] . "";
                        $vid = "" . $video["id"] . "";
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
                </div>
            </div>
            <div class="modal-body">
                <h2>Comments</h2>
                <form action="php/comment.php" method="post">
                    <input type="text" name="message" placeholder="Leave a comment here">
                    <input type="hidden" name="videotitle" value="">
                    <button type="submit" name="send" class="send">Send</button>
                </form>

                <div class="modal-comments">
                </div>
            </div>
        </div>
        <script src="feature/modal.js"></script>
    </body>

    </html>
<?php } else {
    header('Location: pages/form.php');
} ?>