<?php
function destroyCookie($select,$token){
    setcookie("select", $selector,-60*60*24*30,"/",'http://localhost',1);
    setcookie("validator",$token,-60*60*24*30,"/",'http://localhost',1);
}
session_start();
if (isset($_SESSION['mailUser']))
{
    header("Location: ./pages/homePage.php");
    exit();
}
elseif(isset($_COOKIE['select']) && isset($_COOKIE['validator'])){
    if(ctype_xdigit($_COOKIE['select']) && ctype_xdigit($_COOKIE['validator'])){
        require 'Back-End/pages/folderlogin/datacon.php';
        $mysql='SELECT * FROM auth WHERE selector=?';
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $mysql))
        {
            destroyCookie($_COOKIE['select'],$_COOKIE['validator']);

            header('Refresh: 1; url=indexpp.php');
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $_COOKIE['select']);
        mysqli_stmt_execute($stmt);
        $check = mysqli_stmt_get_result($stmt);
        if ($valori = mysqli_fetch_assoc($check))
        {

            $password_verify=password_verify($_COOKIE['validator'],$valori['validator']);
            if($password_verify===true){

                /*aici pun sesiunile*/
                $mysql="SELECT mailUser FROM users WHERE idUser=".$valori['iduser'];
                $result=mysqli_query($connection,$mysql);
                if(!$result){
                    destroyCookie($_COOKIE['select'],$_COOKIE['validator']);

                    header('Refresh: 1; url=indexpp.php');
                    exit();
                }
                else{
                    $_SESSION['mailUser']=$result['mailUser'];

                    /*aici se termina sesiunile*/

                    /*aici incepe resetarea cookieurilor*/
                    $selector=bin2hex(random_bytes(24));
                    $token=bin2hex(random_bytes(64));
                    $hash=password_hash($token,PASSWORD_DEFAULT);
                    $mysql="UPDATE auth(validator,selector) VALUES (".$hash.",".$selector.")";
                    mysqli_query($connection,$mysql);

                    setcookie("select", $selector,$valori['data'],"/",'http://localhost',1);
                    setcookie("validator",$token,$valori['data'],"/",'http://localhost',1);

                    header("Location: ./pages/homePage.php");
                    exit();
                }

            }
            else {
                destroyCookie($_COOKIE['select'],$_COOKIE['validator']);

                header('Refresh: 1; url=indexpp.php');
                exit();
            }
        }
        else {
            destroyCookie($_COOKIE['select'],$_COOKIE['validator']);

            header('Refresh: 1; url=indexpp.php');
            exit();
        }
    }
    else {
        destroyCookie($_COOKIE['select'],$_COOKIE['validator']);

        header('Refresh: 1; url=indexpp.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stoodle</title>
        <link rel="stylesheet" href="./pages/CSS/landing-page.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="text">
                            <p>
                                Stoodle e mai mult decât un site. Stoodle este un univers al elevilor, făcut tot de elevi. Pentru că cine înțelege mai bine nevoia de orientare dacă nu ei?! Ca idee unică în România, Stoodle impresionează prin mecanismul amplu prin care ajută tinerii să își găsească vocațiile și îi îndrumă spre studiile superioare, punând cap la cap informații despre utilizator.
                            </p>
                            <a href="./pages/login.php" class="button"> Incepe Aventura </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="text">
                            <p>
                                Viața ta începe în momentul în care începi să iei decizii. Decizii importante care îți marchează tot viitorul. Și sigur nu vrei să fie unele greșite. Pentru a fi sigur că te îndrepți spre reușită, ia cele mai bune decizii pentru tine, în funcție de aptitudinile pe care le ai.
                            </p>
                            <a href="./pages/login.php" class="button"> Incepe Aventura </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="text">
                            <p>
                                Gata, ai luat decizia. Sigur e cea mai bună pentru tine. Acum nu mai există șansa de a da greș. Ți-ai ales drumul și ești pregătit pentru a face ceea ce îți place, pentru a excela în domeniul în care te descurci cel mai bine.
                            </p>
                            <a href="./pages/login.php" class="button"> Incepe Aventura </a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>
