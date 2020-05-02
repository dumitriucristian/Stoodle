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
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="#"> 
                <?php
                require './folderlogin/datacon.php';
                $mail = $_SESSION['mailUser'];
                $sql = "SELECT * FROM `users` WHERE `mailUser` = '$mail'";
                $result = mysqli_query($connection,$sql);
                $myArray = array();
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        print "Salut, ".$row['Prenume'];
                    }
                }
                else
                {
                    echo "0 results";
                }
                ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">☰</span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="flex-direction: row-reverse;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="./homePage.php" class="nav-link">Acasa</a>
                    </li>
                    <li class="nav-item">
                        <a href="./formularTemplate.php" class="nav-link">Formular</a>
                    </li>
                    <li class="nav-item">
                        <a href="./contact.php" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="./news.php" class="nav-link">Știri</a>
                    </li>
                    <li class="nav-item">
                        <a href="./faq.php" class="nav-link">Intrebari</a>
                    </li>
                    <li class="nav-item">
                        <a href="./folderlogin/deconectphp.php" class="nav-link"> Deconectare</a>
                    </li>
                </ul>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="./JS/navbar.js"></script>
    </body>
</html>
