<?php
session_start();
if (!isset($_SESSION['mailUser'])){
  header("Location: ../indexpp.php");
  exit();
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- MY CSS -->
        <link rel="stylesheet" href="./CSS/navbar.css">
        <link rel="stylesheet" href="./CSS/homePage.css">
        <link rel="stylesheet" href="./CSS/base.css">

        <!-- FONT AWESOME -->
        <script src="https://kit.fontawesome.com/0dfb644902.js" crossorigin="anonymous"></script>
        <title>Stoodle</title>
    </head>

    <body>
        <!-- SIDE BAR -->
        <nav id="sidebar">
            <!-- HEADER -->
            <div class="sidebar-header">
                <img src="./Images/Icons/profile.png" alt="Profil Picture" style="width: 50%;">
                <p>
                    <?php
                    require './folderlogin/datacon.php';
                    $mail = $_SESSION['mailUser'];
                    $sql = "SELECT * FROM `users` WHERE `mailUser` = '$mail'";
                    $result = mysqli_query($connection,$sql);
                    $myArray = array();
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            print "@".$row['Prenume'];
                        }
                    }
                    else
                    {
                        echo "0 results";
                    }
                    ?>
                </p>
            </div>


            <!-- SIDEBAR BODY -->
            <ul class="list-unstyled components">
                <li>
                    <a href="./homePage.php">Acasa</a>
                </li>
                <li>
                    <a href="./formularTemplate.php">Formular</a>
                </li>
                <li>
                    <a href="./contact.php">Contact</a>
                </li>
                <li>
                    <a href="./news.php">Știri</a>
                </li>
                <li>
                    <a href="./faq.php">Intrebari</a>
                </li>
            </ul>
            <a href="./folderlogin/deconectphp.php" class="button"> Deconectare</a>

        </nav>
        <!-- PAGE CONTENT -->
        <div id="content">

            <nav class="navbar bg-light w-100" style="z-index: 1">

                <img src="./Images/Icons/open.png" id="sidebarCollapse" alt="closingIcon">

                <input onkeyup="sort()" class="form-control w-50"
                       type="text" placeholder="cauta" id="search_field" aria-label="Search">

            </nav>

            <!-- CARD SHOWCASE -->
            <div id="showcase" class="mt-5">

                <div class="row justify-content-center">

                    <?php
                    require './functii/facultati.php';
                    usort($facultati,function($first,$second){
                        return $first->compabilitate < $second->compabilitate;
                    });
                    // PRINT DATA
                    foreach ($facultati as $card) {
                    ?>
                    <!--Print the card-->
                    <div class="col-lg-3 card">
                        <!--Image Background-->
                        <div class="row-lg-4 backgrounded"></div>
                        <!--Print the proprities-->
                        <div class="row-lg-2 name">
                            <?php
                        echo $card->nume;
                            ?>
                        </div>
                        <div class="row-lg-3 prop text-center">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <?php
                        echo $card->universitate;
                                        ?>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col">
                                        <?php
                        echo $card->compabilitate
                                        ?>
                                        <i class="fas fa-percentage"></i></div>
                                    <div class="col">
                                        <?php
                            echo $card->judet;
                                        ?>
                                        <i class="fas fa-city"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <?php
                        echo $card->profil;
                                        ?>
                                        <i class="fas fa-code-branch"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-lg-3 extra text-center">
                            <a href="#">Afla mai mult</a>
                        </div>
                    </div>
                    <?php } ?>

                </div>

            </div>

        </div>
        <!-- SCRIPTING -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="./JS/navbar.js"></script>
        <script src="./JS/homepage.js"></script>
    </body>
</html>
