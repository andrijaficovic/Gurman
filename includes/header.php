<?php session_start(); ?>
<?php require('./includes/db.php') ?>
<?php include('./includes/functions.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="recepti" />
    <meta name="author" content="Andrija Ficovic" />
    <title>Gurman.rs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="./css/styles.css" rel="stylesheet" />
</head>
<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#264653">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php"><img src="./images/gurman.png" alt="" height="40"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link text-white" href="index.php">Početna</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Recepti</a>
                            <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdownPortfolio">
                                <?php
                                //Prikaz svih kategorija iz baze
                                showAllCategories();
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link text-white" href="about.php">O nama</a></li>
                        <!-- <li class="nav-item"><a class="nav-link text-white" href="blog-home.php">Blog</a></li> -->
                        <li class="nav-item"><a class="nav-link text-white" href="faq.php">FAQ</a></li>
                        <?php
                        if (isset($_SESSION["username"])) {
                            echo "<li class='nav-item'nav-item'><a class='nav-link text-white' href='postavi_recept.php'>Postavi recept</a></li>";
                            echo "<li class=\"nav-item dropdown\">
                            <a class=\"nav-link dropdown-toggle text-white\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\"> <i class=\"bi bi-person-fill px-1\"></i>" . $_SESSION['username'] . "</a>
                            <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                                <li><a class=\"dropdown-item\" href=\"my_recipe.php\">Moji recepti</a></li>
                                <li><a class=\"dropdown-item\" href=\"delete_recipe.php\">Izbriši recepte</a></li>
                                <li>
                                    <hr class=\"dropdown-divider\">
                                </li>
                                <li><a class=\"dropdown-item\" href=\"logout.php\">Odjavi se</a></li>
                            </ul>
                        </li>";
                        } else {
                            echo "<li class='nav-item'><a class='nav-link text-white' href='login.php'>Prijavi se</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>