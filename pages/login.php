
<?php
  include 'functii/functii.php';
  require_once './folderlogin/google-config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stoodle | Log-in System</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-lg-7">
            <div id="text">
                <h1>Stoodle</h1>
                <p>Fii liber. Fii independent.</p>
            </div>
        </div>
        <div class="col-lg-5 d-flex align-items-center justify-content-center content">
            <div class="conatiner">
                <h1>Continuă aventura</h1>
                <form action="folderlogin/loginphp.php" method="post">
                    <div class="form-group">
                      <?php

                      erore2("sqlierror","Eroare server!");
                      erore2("fatalerrorsql","Eroare aplicatie!");
                      succes("resetare","Parola a fost schimbata");

                       ?>
                        <label for="exampleInputEmail1">Email</label>
                        <?php
                        if(isset($_GET['mailuserid'])){
                          echo '<input type="email" name="mailus" class="form-control" value="'.$_GET['mailuserid'].'" id="exampleInputEmail1" aria-describedby="emailHelp">';
                        }
                        else {
                          echo '<input type="email" name="mailus" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">';
                        }
                         ?>
                        <small id="emailHelp" class="form-text text-muted  alert-note">
                          <?php
                          erore1("emptymail",'Completeaza campul !');
                          erore1("nuUser",'Email-ul nu a fot gasit!');
                          erore1("invalidmailuserid",'Email-ul este invalid!');
                           ?>
                </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Parolă</label>
                        <input type="password" name="passw" class="form-control" id="exampleInputPassword1">
                        <small id="emailHelp" class="form-text text-muted alert-note">
                          <?php
                          erore1("emptypass","Completeaza campul");
                          erore1("invalidpassw","Pentru parola se folosesc doar caractere a alfabetui englez!");
                          erore1("parolagresita","Combinatia email si parola este gresita");

                           ?>
              </small>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="checkbox" value="1" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Ține-mă minte.</label>
                    </div>
                    <button type="submit" name="loginsubmit" class="btn btn-primary">Loghaeză-te</button>
                </form>
                <a href="create.php">
                Nu ai cont? <span>Înregistrează-te</span>
            </a>
            </div>
        </div>
    </div>
</body>

</html>
