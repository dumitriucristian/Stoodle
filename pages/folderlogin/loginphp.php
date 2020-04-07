<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=utf-8");
if (isset($_POST['loginsubmit']))
{
    require 'datacon.php';

    $mailuserid = $_POST['mailus'];
    $password = $_POST['passw'];
    $checkbox=$_POST['checkbox'];
    if (empty($mailuserid))
    {
        header("Location: ../login.php?error=emptymail");
        exit();
    }
    elseif (empty($password)) {
      header("Location: ../login.php?error=emptypass&mailuserid=".$mailuserid);
      exit();
    }
    elseif (!filter_var($mailuserid,FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../login.php?error=invalidmailuserid");
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $password))
    {
        header("Location: ../login.php?error=invalidpassw&mailuserid=" . $mailuserid);
        exit();
    }
    else
    {
        $mysql = "SELECT * FROM users WHERE mailUser=?;";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $mysql))
        {
            header("Location: ../login.php?error=sqlierror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $mailuserid);
            mysqli_stmt_execute($stmt);
            $check = mysqli_stmt_get_result($stmt);
            if ($valori = mysqli_fetch_assoc($check))
            {
                $password_verify = password_verify($password, $valori['pwdUsers']);
                if ($password_verify === false)
                {
                    header("Location: ../login.php?error=parolagresita&mailuserid=" . $mailuserid);
                    exit();
                }
                elseif ($password_verify === true)
                {
                  session_start();
                  $_SESSION['Nume']=$valori['Nume'];
                  $_SESSION['Prenume']=$valori['Prenume'];
                  $_SESSION['materie1']=$valori['materie1'];
                  $_SESSION['materie2']=$valori['materie2'];
                  $_SESSION['Profil']=$valori['Profil'];
                  $_SESSION['Domeniu']=$valori['Domeniu'];
                  $_SESSION['Concurs']=$valori['Concurs'];
                  $_SESSION['Judet']=$valori['Judet'];
                  $_SESSION['PozaUser']=$valori['PozaUser'];

                  if ($checkbox==1) {

                    $mysql="DELETE FROM auth WHERE userid=".$valori['idUser'];
                    mysqli_query($connection,$mysql);

                    $date=date("U")+ 60*60*24*30;
                    $selector=bin2hex(random_bytes(24));
                    $token=bin2hex(random_bytes(64));
                    $hash=password_hash($token,PASSWORD_DEFAULT);
                    $mysql="INSERT INTO auth(validator,selector,userid,data) VALUES (".$hash.",".$selector.",".$valori['idUser'].",".$date.")";
                    mysqli_query($connection,$mysql);
                    setcookie("select", $selector,$date,"/",'http://localhost',1);
                    setcookie("validator",$token,$date,"/",'http://localhost',1);
                  }

                    $file = '../../api/currentUser.txt';
                    class Person implements JsonSerializable
                    {
                        protected $nume;
                        protected $prenume;

                        public function __construct(array $data)
                        {
                            $this->prenume = $data['prenume'];
                            $this->nume = $data['nume'];
                        }

                        public function getPrenume()
                        {
                            return $this->prenume;
                        }

                        public function getNume()
                        {
                            return $this->nume;
                        }

                        public function jsonSerialize()
                        {
                            return
                            [
                                'prenume'   => $this->getPrenume(),
                                'nume' => $this->getNume()
                            ];
                        }
                    }
                    $person = new Person(array('prenume' => $valori['Prenume'], 'nume' => $valori['Nume']));
                    $person = json_encode($person);
                    file_put_contents($file, $person);
                    header("Location: http://localhost:4200/navbar/home");
                    exit();
                }
                else
                {
                    header("Location: ../login.php?error=fatalerrorsql");
                    exit();
                }
            }
            else
            {
                header("Location: ../login.php?error=nuUser");
                exit();
            }
        }
    }
}
else
{
    header("Location: http://localhost:4200/landing-page");
    exit();
}
