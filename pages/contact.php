<?php
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/navbar.css">
    <link rel="stylesheet" href="./CSS/contact.css">
    <link rel="stylesheet" href="./CSS/base.css">
    <script src="https://kit.fontawesome.com/0dfb644902.js" crossorigin="anonymous"></script>
    <title>Stoodle</title>
  </head>
  <body>

    <!-- SIDE NAVBAR -->
    <nav id="sidebar">

        <!-- HEADER -->
        <div class="sidebar-header">
            <img src="./Images/Icons/profile.png" alt="Profil Picture" style="width: 5em;">
            <p>@Username</p>
        </div>

        <!-- BODY -->
        <ul class="list-unstyled components">
            <li>
                <a href="./homePage.php">Acasa <img src="./Images/Icons/home.png" alt="icon"></a>
            </li>
            <li>
                <a href="./profile.php">Profil <img src="./Images/Icons/profile.png" alt="icon"></a>
            </li>
            <li>
                <a href="./contact.php">Contact <img src="./Images/Icons/home.png" alt="icon"></a>
            </li>
            <li>
                <a href="./news.php">Știri <img src="./Images/Icons/home.png" alt="icon"></a>
            </li>
            <li>
                <a href="./faq.php">Intrebari <img src="./Images/Icons/question.png" alt="icon"></a>
            </li>
        </ul>

        <a href="./folderlogin/deconectphp.php" class="button"> Deconectare</a>
    </nav>

    <!-- PAGE CONTENT-->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="container-fluid">
                <div id="sidebarCollapse" style="cursor: pointer;">

                    <!-- ID-URILE SUNT INVERSATE -->
                    <img src="./Images/Icons/open.png" id="close" alt="closingIcon">
                    <img src="./Images/Icons/close.png" id="open" alt="openingIcon">

                </div>
            </div>

            <div class="input-group md-form form-sm form-2 pl-0">
                <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <span class="input-group-text red lighten-3" id="basic-text1">
                        Cautare
                    </span>
                </div>  
            </div>

        </nav>

        <!-- CONTACT INFO -->
        <div id="showcase">
            <div id="content d-flex align-items-center">
                <div class="row justify-content-around">

                    <div class="card col-lg-4 justify-content-around align-items-center">
                        <img src="./Images/Grigo.jpg" alt="poza" style="width: 10em; margin-bottom: 1em;">
                        <h3 class="m-0">Grigorescu</h3>
                        <h4>Alexandru</h4>
                        <p>Phasellus quis eleifend quam, sed tincidunt felis. Nulla aliquet, tellus.</p>
                        <div class="socialMedia d-flex justify-content-around w-100">
                            <a href="https://www.facebook.com/grigorescu.alexandru.94" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/aleex_grigo/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="mailto:grigorescu.aleex@gmail.com?subject=Stoodle| Problema ta" target="_blank"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>

                    <div class="card col-lg-4 justify-content-around align-items-center">
                        <img src="./Images/Robert.jpg" alt="poza" style="width: 10em; margin-bottom: 1em;">
                        <h3 class="m-0">Plaiasu</h3>
                        <h4>Robert</h4>
                        <p>Phasellus quis eleifend quam, sed tincidunt felis. Nulla aliquet, tellus.</p>
                        <div class="socialMedia d-flex justify-content-around w-100">
                            <a href="https://www.facebook.com/robert.plaiasu" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/tridev_robert/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="mailto:robertplaiasu03@gmail.com?subject=Stoodle| Problema ta" target="_blank"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="./JS/navbar.js"></script>
    </body>
</html>
