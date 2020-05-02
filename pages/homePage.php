<?php
require './folderlogin/datacon.php';

session_start();
if(empty($_SESSION['mailUser']) && empty($_SESSION['mailGmail'])){
    header("Location: ../indexpp.php?12");
    exit();
}
if(isset($_SESSION['mailUser']))
{
  $mail = $_SESSION['mailUser'];
  $mysql="SELECT * FROM users WHERE mailUser=?";
}
if(isset($_SESSION['mailGmail']))
{
  $mail = $_SESSION['mailGmail'];
  $mysql="SELECT * FROM users_gmail WHERE mailGmail=?";
}
$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt, $mysql))
{
    header("Location: ../indexpp.php");
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $mail);
mysqli_stmt_execute($stmt);
$result= mysqli_stmt_get_result($stmt);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
if(empty($row['Profil'])){
    header("Location: ./formularTemplate.php");
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
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="#">
                <?php
                if (isset($row['prenumeGmail']))
                  print "Salut, ".$row['prenumeGmail'];
                if (isset($row['Prenume']))
                  print "Salut, ".$row['Prenume'];
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
                        <a onclick="formular();" class="nav-link">Formular</a>
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

        <!-- PAGE CONTENT -->
        <main class="container">
            <!-- CARD SHOWCASE -->
            <div id="showcase">
                <div class="row">

                    <?php
                    require './functii/facultati.php';
                    usort($facultati,function($first,$second){
                        return $first->compabilitate < $second->compabilitate;
                    });
                    // PRINT DATA
                    foreach ($facultati as $card) {
                    ?>
                    <!--Print the card-->
                    <div class="col card">
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
                        <div class="row-lg-3 fav text-center">
                            <buttton><i class="far fa-heart"></i> Adauga la favorite</buttton>
                        </div>
                        <div class="row-lg-3 extra text-center">
                            <a href="#">Afla mai mult</a>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </main>
        <!-- SCRIPTING -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="./JS/navbar.js"></script>
        <script src="./JS/homepage.js"></script>
    </body>
</html>
