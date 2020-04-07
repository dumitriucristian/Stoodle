<?php
  include 'functii/functii.php';
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
        <div class="col-lg-4">
            <div id="text">
                <h1>Stoodle</h1>
                <p>Fii liber. Fii independent.</p>
            </div>
        </div>
        <div class="col-lg-8 d-flex align-items-center justify-content-center content">
            <div class="conatiner">
                <h1>Începe aventura</h1>
                <form action="folderlogin/signupphp.php" method="post">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="exampleInputEmail1">Nume de familie</label>
                            <?php
                            if(isset($_GET['nume'])){
                              echo '<input type="text" name="nume" class="form-control" aria-describedby="emailHelp" value="'.$_GET['nume'].'">';
                            }
                            else {
                              echo '<input type="text" name="nume" class="form-control" aria-describedby="emailHelp">';
                            }
                             ?>
                            <small class="form-text text-muted alert-note">
                                <?php
                                erore1("emptyfieldnume","Completeaza toate campurile!");
                                erore1("invalidnume","Se pot folosi doar litere ale alfabetui englez!");
                                erore1("marenume","Numele este prea lung");
                                 ?>
                            </small>
                        </div>
                        <div class="col-lg-6">
                            <label for="exampleInputEmail1">Prenume</label>
                            <?php
                            if(isset($_GET['prenume'])){
                              echo '<input type="text" name="prenume" class="form-control" value="'.$_GET['prenume'].'"aria-describedby="emailHelp">';
                            }
                            else {
                              echo '<input type="text" name="prenume" class="form-control" aria-describedby="emailHelp">';
                            }
                             ?>
                            <small>
                              <?php

                              erore1("emptyfieldprenume","Completeaza toate campurile!");
                              erore1("invalidprenume","Se pot folosi doar litere ale alfabetui englez!");
                              erore1("mareprenume","Numele este prea lung");

                              ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="exampleInputEmail1">Email</label>
                            <?php
                            if(isset($_GET['email'])){
                              echo '<input type="email" name="email" class="form-control" value="'.$_GET['email'].'" aria-describedby="emailHelp">';
                            }
                            else {
                              echo '<input type="email" name="email" class="form-control" aria-describedby="emailHelp">';
                            }
                             ?>
                            <small class="form-text text-muted">
                              <?php

                              erore1("emptyfieldemail","Completeaza toate campurile!");
                              erore1("invalidmail","Email-ul este invalid");
                              erore1("mailother","Email-ul si confirmare email");
                              erore1("mailluat","Adresa de email este deja inregistrata!");

                               ?>
                            </small>
                        </div>
                        <div class="col-lg-6">
                            <label for="exampleInputEmail1">Confirmare Email</label>
                            <?php
                            if(isset($_GET['confirmail'])){
                              echo '<input type="email" name="confirmail" class="form-control" value="'.$_GET['confirmail'].'" aria-describedby="emailHelp">';
                            }
                            else {
                              echo '<input type="email" name="confirmail" class="form-control" aria-describedby="emailHelp">';
                            }
                             ?>
                            <small class="form-text text-muted alert-note">
                                <?php

                                erore1("emptyfieldemailrepeat","Completeaza toate campurile!");
                                erore1("invalidmailrepeat","Email-ul este invalid!");

                                 ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="exampleInputPassword1">Parolă</label>
                            <input type="password" name="passw" class="form-control">
                            <small class="form-text text-muted">
                    <?php
                    erore1("emptyfieldpass","Completeaza toate campurile!");
                    erore1("invalidpassw","Pentru parola se pot folosi doar cifre si litere ale alfabetului englez!");
                    erore1("micpassw","Parola este prea sccurta trebuie sa aiba minim 8 caractere!");
                    erore1("marepassw","Parola este prea lunga poate sa aiba maxim 32 de caractere!");
                    erore1("identicpasswnume","Parola este asemanatoare  cu numele!");
                    erore1("identicpasswprenume","Parola este asemanatoare  cu prenumele!");
                    erore1("passwdother","Parola este diferita fata de cofiramre parola!");
                     ?>
              </small>
                        </div>
                        <div class="col-lg-6">
                            <label for="exampleInputPassword1"> Confirmare Parolă</label>
                            <input type="password" name="passw-repeat" class="form-control">
                            <small class="form-text text-muted alert-note">
                              <?php
                              erore1("emptyfieldpassrepeat","Completeaza toate campurile!");
                              erore1("invalidpasswrepeat","Pentru parola se pot folosi doar cifre si litere ale alfabetului englez!");
                              ?>

                            </small>
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="checkbox" value="1" id="exampleCheck1">
                        <label class="form-check-label"  for="exampleCheck1">
                            Sunt de acord cu <a href="terms.html" style="color: rgba(25, 74, 196, 1);">termeni și condiițiile</a> propuse de stoodle.
                        </label>
                        <small class="form-text text-muted alert-note">
                            <?php
                            erore1("check","Bifeaza casuta de mai sus!");
                             ?>
                        </small>
                    </div>
                    <button type="submit" name="signupsubmit" class="btn btn-primary">Creează cont</button>
                </form>
                <a href="login.html">
                Ai deja cont? <span>Conectează-te</span>
            </a>
            </div>
        </div>
    </div>
</body>

</html>
