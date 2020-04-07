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
        <form action="./folderlogin/signupphp.php" method="post">
            <div class="form-group d-flex flex-column">
                <a class="navbar-brand" href="../index.php" style="font-size: 2rem; font-weight: 700;">Stoodle</a>
                <h1 class="navbar-brand" style="padding: 0;">Creare cont</h1>
            </div>
            <?php
              if (isset($_GET['error'])) {
                if ($_GET['error']=="emptyfields") {
                  echo '<div class="alert alert-danger" role="alert">
                            Completeaza toate campurile!
                        </div>';
                }
                elseif ($_GET['error']=="invaliduseridemail") {
                  echo '<div class="alert alert-danger" role="alert">
                            Caracatere doar ale alfabetului englez si cifre(0-9),iar adresa de e-mail trebuie sa fie de tipul exemplu@domeniu.com!
                        </div>';
                }
                elseif ($_GET['error']=="mareuserid") {
                  echo '<div class="alert alert-danger" role="alert">
                            Numele de utilizator trebuie sa aiba 6-24 de caractere!
                        </div>';
                }
                elseif ($_GET['error']=="micuserid") {
                  echo '<div class="alert alert-danger" role="alert">
                            Numele de utilizator trebuie sa aiba intre 6-24 caractere!
                        </div>';
                }
                elseif ($_GET['error']=="invalidmail") {
                  echo '<div class="alert alert-danger" role="alert">
                            Adresa de e-mail trebuie sa fie de tipul exemplu@domeniu.com!
                        </div>';
                }
                elseif ($_GET['error']=="invaliduserid") {
                  echo '<div class="alert alert-danger" role="alert">
                            Caracatere doar ale alfabetului englez si cifre(0-9)!
                        </div>';
                }
                elseif ($_GET['error']=="invalidpassw") {
                  echo '<div class="alert alert-danger" role="alert">
                            Parola trebuie sa contina doar caracterelele alfabetului englez si cifre(0-9)!
                        </div>';
                }
                elseif ($_GET['error']=="micpassw") {
                  echo '<div class="alert alert-danger" role="alert">
                            Parola trebuie sa contina mai mult de 5 caractere!
                        </div>';
                }
                elseif ($_GET['error']=="identicpassw") {
                  echo '<div class="alert alert-danger" role="alert">
                            Parola se regaseste in numele de utilizator!
                        </div>';
                }
                elseif ($_GET['error']=="passwdother") {
                  echo '<div class="alert alert-danger" role="alert">
                            Campurile parola si repeta parola sunt diferite!
                        </div>';
                }
                elseif ($_GET['error']=="mysqlerror") {
                  echo '<div class="alert alert-danger" role="alert">
                            Eroare server!
                        </div>';
                }
                elseif ($_GET['error']=="useridluat") {
                  echo '<div class="alert alert-danger" role="alert">
                            Numele este folosit de alt utilizator!
                        </div>';
                }
                elseif ($_GET['error']=="mailluat") {
                  echo '<div class="alert alert-danger" role="alert">
                            Adresa de e-mail este deja folosita!
                        </div>';
                }
                elseif ($_GET['error']=="invalidlink") {
                  echo '<div class="alert alert-danger" role="alert">
                            Link-ul este invalid!
                        </div>';
                }
                elseif ($_GET['error']=="expire") {
                  echo '<div class="alert alert-danger" role="alert">
                            Link-ul a expirat !
                        </div>';
                }
                elseif ($_GET['error']=="alttoken") {
                  echo '<div class="alert alert-danger" role="alert">
                            Link-ul utilizat este gresit!
                        </div>';
                }

              }

             ?>
             <div class="form-group">
               <label for="inputEmail4">Nume</label>
               <?php
               if (isset($_GET['nume'])) {
                 echo '<input type="text" name="nume" class="form-control" id="inputEmail3" placeholder="Nume" value="'.$_GET['nume'].'">';
               }
               else {
                 echo '<input type="text" name="nume" class="form-control" id="inputEmail3" placeholder="Nume">';
               }
                ?>
             </div>
              <div class="form-group">
                <label for="inputEmail4">Prenume</label>
                <?php
                if (isset($_GET['prenume'])) {
                  echo '<input type="text" name="prenume" class="form-control" id="inputEmail3" placeholder="Username" value="'.$_GET['prenume'].'">';
                }
                else {
                  echo '<input type="text" name="prenume" class="form-control" id="inputEmail3" placeholder="Username">';
                }
                 ?>
              </div>
            <div class="form-group">
              <label for="inputAddress">Email</label>
              <?php
              if (isset($_GET['email'])) {
                echo '<input type="email" name="email"class="form-control" id="inputAddress" placeholder="Email" value="'.$_GET['email'].'">';
              }
              else {
                echo '<input type="email" name="email"class="form-control" id="inputAddress" placeholder="Email">';
              }
               ?>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Parola</label>
                  <input type="password" name="passw"class="form-control" id="inputEmail4" placeholder="Parola">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Confirmare Parola</label>
                  <input type="password" name="passw-repeat" class="form-control" id="inputPassword4" placeholder="Confirmare parola">
                </div>
              </div>
              <button type="submit" name="signupsubmit" class="btn btn-primary">Sign in</button>
              </form>
            </div>



    <!-- SCRIPTING -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
