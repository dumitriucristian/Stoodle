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

    <!-- PAGE CONTENT -->
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

        <!-- CARD SHOWCASE -->
        <div id="showcase" style="margin: 0 3rem;">
            <?php
                $array = array(
                    (object) array(
                        "enunt" => "Ce sunt florile?",
                        "raspuns" => "Masini de pompieri!"
                    ),
                    (object) array(
                        "enunt" => "Ce sunt florile?",
                        "raspuns" => "Masini de pompieri!"
                    ),
                    (object) array(
                        "enunt" => "Ce sunt florile?",
                        "raspuns" => "Masini de pompieri!"
                    ),
                    (object) array(
                        "enunt" => "Ce sunt florile?",
                        "raspuns" => "Masini de pompieri!"
                    ),
                    (object) array(
                        "enunt" => "Ce sunt florile?",
                        "raspuns" => "Masini de pompieri!"
                    ),
                );
                foreach ($array as $intrebare){
                    echo "
                        <div style='margin: 2rem 0'>
                            <h1 style='margin: 0'>".$intrebare->enunt." </h1>
                            <p>".$intrebare->raspuns." </p>
                        </div>
                    ";
                }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="./JS/navbar.js"></script>
    </body>
</html>
