<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cattoflix</title>
    <link rel="stylesheet" href="assets/mainstyle.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon"  href="assets\images\minilogo.png" type="image/icon">
  </head>
  <body>
    <header>
        <nav>
            <div class="logodiv">
                <img src="assets\images\logo.png">
                <h1>CATTOFLIX</h1>
            </div>
            <div class="searchdiv">
                <input type="search" placeholder="Search for any movie">
                <!-- <button><i class="fa-solid fa-bars"></i></button> -->
            </div>
        </nav>
    </header>
    <aside>
        <div class="sidebar-content1">
            <!-- <img alt="logo" src="assets\images\logo.png"> -->
            <h1>Genres</h1>
            <ul>
                <li><a href="">Birds</a></li>
                <li><a href="">Fish</a></li>
                <li><a href="">Wild</a></li>
                <li><a href="">Cathub</a></li>
            </ul>
        </div>
        <div class="sidebar-content2">
            <h1>Options</h1>
            <ul>
                <li><a href="">Something</a></li>
                <li><a href="">Something</a></li>
                <li><a href="">Something</a></li>
                <li><a href="">Something</a></li>
            </ul>
        </div>
        <div class="logout-container">
            <button class="logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </div>
    </aside>
    <!-- <div> if u want the space to the right side just re-active this div-->
        <div class="featured">
            <div class="featured-content">
                <img src="https://via.placeholder.com/300x100?text=MONEY+HEIST" alt="logo" class="logo"/>
                <div>
                    <span class="rating">IMDb 8.8/10</span>
                    <span class="streams">2B+ Streams</span>
                </div>
            </div>
        </div>
        <main>
            <h2 id="titlecarousel1" class="row-title">New this week</h2>
            <div id="carousel1" class="slider" style="
                --width: 200px;
                --height: 200px;
                --quantity: 9;
            ">
                <div class="list">
                    <div class="item" style="--position: 1"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 2"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 3"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 4"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 5"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 6"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 7"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 8"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 9"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                </div>
            </div>
            
            <h2 id="titlecarousel2"class="row-title">New this week</h2>
            <div id="carousel2" class="slider" reverse="true" style="
                --width: 200px;
                --height: 200px;
                --quantity: 9;
            ">
                <div class="list">
                    <div class="item" style="--position: 1"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 2"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 3"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 4"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 5"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 6"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 7"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 8"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 9"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                </div>
            </div>
            <h2 id="titlecarousel1" class="row-title">New this week</h2>
            <div id="carousel1" class="slider" style="
                --width: 200px;
                --height: 200px;
                --quantity: 9;
            ">
                <div class="list">
                    <div class="item" style="--position: 1"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 2"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 3"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 4"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 5"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 6"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 7"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 8"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 9"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                </div>
            </div>
            
            <h2 id="titlecarousel2"class="row-title">New this week</h2>
            <div id="carousel2" class="slider" reverse="true" style="
                --width: 200px;
                --height: 200px;
                --quantity: 9;
            ">
                <div class="list">
                    <div class="item" style="--position: 1"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 2"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 3"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 4"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 5"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 6"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 7"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 8"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                    <div class="item" style="--position: 9"><img src="https://via.placeholder.com/200x300?text=Movie+1" alt=""></div>
                </div>
            </div>
        </main>
      </div>
    <!-- </div> -->
  </body>
</html>
