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
      <form action="foldereset/newparolaphp.php" method="post">
            <div class="form-group d-flex flex-column">
                <a class="navbar-brand" href="../index.php" style="font-size: 2rem; font-weight: 700;">Stoodle</a>
                <?php
                if(isset($_GET['error'])){
                  if ($_GET['error']=="emptyfields") {
                    echo '<div class="alert alert-danger" role="alert">
                              Completeaza toate campurile!

                          </div>';
                  }
                  elseif ($_GET['error']=="invalidparola") {
                    echo '<div class="alert alert-danger" role="alert">
                              Parola trebuie sa contina doar litere si cifre!

                          </div>';
                  }
                  elseif ($_GET['error']=="micparola") {
                    echo '<div class="alert alert-danger" role="alert">
                          Parola trebuie sa aiba minim 6 caractere!

                          </div>';
                  }
                  elseif ($_GET['error']=="difparola") {
                    echo '<div class="alert alert-danger" role="alert">
                              Campula parola este diferit fata de confirmare parola!

                          </div>';
                  }
                  elseif ($_GET['error']=="aceeasiparola") {
                    echo '<div class="alert alert-danger" role="alert">
                              Parola este aceeasi cu cea veche!

                          </div>';
                  }
                  elseif ($_GET['error']=="mysqlerror") {
                    echo '<div class="alert alert-danger" role="alert">
                              Eroare baza de date!

                          </div>';
                  }
                }
                $select=$_GET['select'];
                $token=$_GET['valid'];
                if(empty($select)||empty($token)){
                    header("Location: ../login.php?error=invalidlink");
                    exit();
                }
                else{
                  if(ctype_xdigit($select)===true && ctype_xdigit($token)===true){

                    echo '
                    <h1 class="navbar-brand" style="padding: 0;">Introducerea noii parole</h1>
                    <input type="hidden" name="select" class="form-control" value='.$select.'>
                    <input type="hidden" name="token" class="form-control" value='.$token.'>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Noua parola</label>
                        <input type="password" name="resetparola" class="form-control" id="inputPassword3" placeholder="Noua parola">
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Confirmare parola</label>
                          <input type="password" name="resetconfirmareparola" class="form-control" id="inputPassword3" placeholder="Noua parola">
                        </div>
                      <button type="submit" name="submit-parola-reset" class="btn btn-info" style="float: right;">Trimite mail-ul</button>
                </div>
              </form>
                    ';

                  }
                }
                ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
