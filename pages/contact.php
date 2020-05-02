<?php
session_start();
if(empty($_SESSION['mailUser']) && empty($_SESSION['mailGmail'])){
    header("Location: ../indexpp.php");
    exit();
}
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

                    <div class="card text-center">
                        <img src="./Images/Grigo.jpg" alt="Poza cu Grigo">
                        <h3>Grigorescu Alexandru</h3>
                        <h6>Front-End Developer</h6>
                        <p>Ma consider o persoana joviala</p>
                    </div>

                    <div class="card text-center">
                        <img src="./Images/Robert.jpg" alt="Poza cu Robert">
                        <h3>Plaiasu Robert</h3>
                        <h6>Back-End Developer</h6>
                        <p>Imi place metal-ul</p>
                    </div>

                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="./JS/navbar.js"></script>
    </body>
</html>
