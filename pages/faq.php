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
        <div id="search">
            <input onkeyup="sort()" class="form-control w-75"
                   type="text" placeholder="cauta" id="search_field" aria-label="Search">
        </div>

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
