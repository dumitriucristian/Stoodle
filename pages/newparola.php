<?php
include 'functii/functii.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Stoodle | Resetare Parola</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="./CSS/login.css">
        <link rel="stylesheet" href="./CSS/base.css">
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
            <div class="col-lg-5 d-flex align-items-center justify-content-center" id="content">
                <div class="conatiner">
                    <form action="">
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
                        <button type="submit" name="signupsubmit" class="button">Creează cont</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>
