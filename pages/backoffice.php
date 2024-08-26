<?php
session_start();

if (isset($_POST['logout'])) {

    session_unset();
    session_destroy();

    header("Location: form.php");
}

// delete button first table
include("../db.php");

if (isset($_POST["deletebtn"])) {

    $delete_this = $_POST["deletebtn"];

    $query = ("DELETE FROM utilisateur WHERE id= :id_element");
    $statement = $pdo->prepare($query);
    $data = [':id_element' => $delete_this];
    $statement->execute($data);
}

// admin btn
if (isset($_POST["adminbtn"])) {
    $admin_this = $_POST["adminbtn"];
    
    //  fetch the current role for the user
    $fetch_query = "SELECT role FROM utilisateur WHERE id = :id_element";
    $fetch_statement = $pdo->prepare($fetch_query);
    $fetch_statement->execute([':id_element' => $admin_this]);
    $current_role = $fetch_statement->fetchColumn();

    if ($current_role !== 'admin') {
        //  If the user is not an admin make admin
        $query = "UPDATE utilisateur SET role='admin' WHERE id = :id_element";
    } else {
        //  If the user is already an admin, remove admin role
        $query = "UPDATE utilisateur SET role = 'none' WHERE id = :id_element";
    }

    $statement = $pdo->prepare($query);
    $data = [':id_element' => $admin_this];
    $statement->execute($data);
}

// delete btn for second table
if (isset($_POST["deletebtn2"])) {

    $delete_this = $_POST["deletebtn2"];

    $query = ("DELETE FROM comments WHERE id= :id_element");
    $statement = $pdo->prepare($query);
    $data = [':id_element' => $delete_this];
    $statement->execute($data);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice</title>
    <link rel="stylesheet" href="../assets/mainstyle.css">
    <link rel="stylesheet" href="../assets/backofficestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../assets/images/minilogo.png" type="image/icon">

</head>

<body>
    <header>
        <nav>
            <div class="logodiv">
                <img src="../assets/images/logo.png">
                <h1>CATTOFLIX</h1>
                <p style="color: red;">Hello, <?php echo $_SESSION['username']; ?></p>
            </div>
            <div class="searchdiv">
                <input type="search" placeholder="Search for any movie">
            </div>
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
                    <?= '<li><a href="backoffice.php">Backoffice</a></li>' ?>
                <?php } ?>
            </ul>
        </div>
        <div class="logout-container">
            <form action="" method="post"><button type="submit" name="logout" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</button></form>
        </div>
    </aside>
    <div class="backoffice">
        <div class=" btndiv">
            <button data-table-id="table1" class="btn">Users</button>
            <button data-table-id="table2" class="btn">Comments</button>
        </div>
        <div class="tables">
            <table id="table1" class="table">
                <thead>
                    <colgroup>
                        <col style="width: 20%;">
                        <col style="width: 55%;">
                        <col style="width: 10%;">
                        <col style="width: 5%">
                        <col style="width: 5%">
                    </colgroup>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include("../db.php");

                    $query = ("SELECT * FROM utilisateur ORDER by id");

                    $statement = $pdo->prepare($query);
                    $statement->execute();

                    $results = $statement->fetchAll();

                    foreach ($results as $row) {
                    ?>
                        <tr>
                            <td><?= $row['username'];?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['role']; ?></td>
                            <td>
                                <form method="post">
                                    <button type="submit" name="deletebtn" value="<?= $row['id'] ?>" class="delete">Delete</button>
                                </form>
                            </td>
                            <td>
                                <form method="post">
                                    <button type="submit" name="adminbtn" value="<?= $row['id'] ?>" class="adminbtn">Adm</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <table id="table2" class="table">
                <thead>
                    <colgroup>
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%">
                        <col style="width: 70%">
                    </colgroup>
                    <tr>
                        <th>Username</th>
                        <th>Date</th>
                        <th>Video</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include("../db.php");

                    $query = ("SELECT * FROM comments ORDER by video_title");

                    $statement = $pdo->prepare($query);
                    $statement->execute();

                    $results = $statement->fetchAll();

                    foreach ($results as $row) {
                    ?>
                        <tr>
                            <td><?= $row['username']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td><?= $row['video_title']; ?></td>
                            <td><?= $row['messages']; ?></td>
                            <td>
                                <form method="post">
                                    <button type="submit" name="deletebtn2" value="<?= $row['id'] ?>" class="delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../feature/backofficescript.js"></script>
</body>

</html>