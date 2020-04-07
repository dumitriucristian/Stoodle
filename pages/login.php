<?php
  require_once __DIR__ .'/folderlogin/google-config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <title>Stoodle | Creare cont</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body style="overflow: hidden; position: absolute; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">

    <div id="container">
        <form action="folderlogin/loginphp.php" method="post">
            <div class="form-group d-flex flex-column">
                <a class="navbar-brand" href="../index.php" style="font-size: 2rem; font-weight: 700;">Stoodle</a>
                <h1 class="navbar-brand" style="padding: 0;">Conectare</h1>
            </div>
            <?php
            if (isset($_GET['error'])){
              if ($_GET['error']=="emptyfields") {
                echo '<div class="alert alert-danger" role="alert">
                          Completeaza toate campurile!
                      </div>';
              }
              elseif ($_GET['error']=="invalidpassw") {
                echo '<div class="alert alert-danger" role="alert">
                          Poti folosi doar caracterele alfabetului englez(a-Z) si cifre (0-9)!
                      </div>';
              }
              elseif ($_GET['error']=="sqlierror") {
                echo '<div class="alert alert-danger" role="alert">
                          Eroare server!
                      </div>';
              }
              elseif ($_GET['error']=="parolagresita") {

                echo '<div class="alert alert-danger" role="alert">
                          Parola este gresita!

                      </div>';
              }
              elseif ($_GET['error']=="fatalerrorsql") {
                echo '<div class="alert alert-danger" role="alert">
                          Eroare baza de date!
                      </div>';
              }
              elseif ($_GET['error']=="nuUser") {
                echo '<div class="alert alert-danger" role="alert">
                          Numele de utilizator/e-mail-ul nu a fot gasit!
                      </div>';
              }
}
              elseif(isset($_GET['register'])) {
              if($_GET['register']=="succes") {
                echo '<div class="alert alert-success" role="alert">
                          Contul a fost inregistrat cu succes acum va puteti conecta!
                      </div>';
            }
          }
              elseif (isset($GET['resetare'])) {
                if($_GET['resetare']=="succes") {
                  echo '<div class="alert alert-success" role="alert">
                            Parola a fost schimbata!
                        </div>';
              }
              }

               ?>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">ID</label>
              <div class="col-sm-10">
                <?php

                if (isset($_GET['mailuserid'])) {
                  echo '<input type="text" name="mailus" class="form-control" id="inputEmail3" placeholder="Email / Username" value="'.$_GET['mailuserid'].'">';
                }
                else {
                  echo '<input type="text" name="mailus" class="form-control" id="inputEmail3" placeholder="Email / Username">';
                }

                 ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Parola</label>
              <div class="col-sm-10">
                <input type="password" name="passw" class="form-control" id="inputPassword3" placeholder="Parola Ta">
              </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <?php
                      echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
                     ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <span>Nu ai cont? </span>
                    <a href="create.php">Crează-ti</a>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                     <a href=reset.php>ai uitat parola</a>
                </div>
            </div>
            <div class="form-group d-flex flex-row-reverse">
              <div class="col-sm-10" style="padding: 0">
                <button type="submit"  name="loginsubmit"class="btn btn-info" style="float: right;">Conecteaza-te</button>
              </div>
            </div>
        </form>
    </div>

    <!-- SCRIPTING -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
