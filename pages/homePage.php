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
        <link rel="stylesheet" href="./CSS/homePage.css">
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

            <!-- SIDEBAR BODY -->
            <ul class="list-unstyled components">
                <li>
                    <a href="./homePage.php">Acasa <img src="./Images/Icons/home.png" alt="icon"></a>
                </li>
                <li>
                    <a href="./formularTemplate.php">Formular <img src="./Images/Icons/profile.png" alt="icon"></a>
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
                    <input class="form-control my-0 py-1 red-border" onkeyup="sort()"
                           type="text" placeholder="cauta" id="search_field" aria-label="Search">
                    <div class="input-group-append">
                        <span class="input-group-text red lighten-3" id="basic-text1">
                            Cautare
                        </span>
                    </div>
                </div>

            </nav>

            <!-- CARD SHOWCASE -->
            <div id="showcase">

                <div class="row justify-content-center">

                    <?php
                    // CONNECT TO THE DATABASE
                    require '../pages/folderlogin/datacon.php';

                    // GET DATA FROM DATABASE
                    $sql = "SELECT * FROM `facultati`";
                    $result = mysqli_query($connection,$sql);
                    $myArray = array();
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $myArray[] = $row;


                        }
                        // print_r ($myArray[0]['Numef'])
                    }
                    else
                    {
                        echo "0 results";
                    }

                    // PRINT DATA
                    foreach ($myArray as $card) {
                    ?>
                    <!--Print the card-->
                    <div class="col-3 card">
                        <!--Image Background-->
                        <div class="row-lg-4 backgrounded"></div>
                        <!--Print the proprities-->
                        <div class="row-lg-2 name">
                            <?php
                            echo $card['Numef'];
                            ?>
                        </div>
                        <div class="row-lg-3 prop text-center">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <?php
                        echo $card['Universitatea'];
                                        ?>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col">100 <i class="fas fa-percentage"></i></div>
                                    <div class="col">
                                        <?php
                        echo $card['Judet'];
                                        ?>
                                        <i class="fas fa-city"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <?php
                        echo $card['Profil'];
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
