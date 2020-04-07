<?php
  session_start();
  if (isset($_SESSION['Nume']) && isset($_SESSION['Prenume']) && isset($_SESSION['materie1']) && isset($_SESSION['materie2'])
  && isset($_SESSION['Profil']) && isset($_SESSION['Domeniu']) && isset($_SESSION['Concurs']) && isset($_SESSION['Judet'])
  && isset($_SESSION['PozaUser']))
  {
    header("Location: localhost:4200/HP");
    exit();
  }
  elseif (isset($_COOKIE['select']) && isset($_COOKIE['validator'])){
    if(ctype_xdigit($_COOKIE['select']) && ctype_xdigit($_COOKIE['validator'])){
    require 'Back-End/pages/folderlogin/datacon.php';
    $mysql='SELECT * FROM auth WHERE selector=?';
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $mysql))
    {
        header("Location: ");
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "s", $_COOKIE['select']);
        mysqli_stmt_execute($stmt);
        $check = mysqli_stmt_get_result($stmt);
        if ($valori = mysqli_fetch_assoc($check))
        {

            $password_verify=password_verify($_COOKIE['validator'],$valori['validator']);
            if($password_verify===true){

              /*aici pun sesiunile*/
              $mysql="SELECT (Nume,Prenume,materie1,materie2,Profil,Domeniu,Judet,Concurs,PozaUser) FROM users WHERE idUser=".$valori['iduser'];
              $result=mysqli_query($connection,$mysql);
              if(!$result){
                header();
                exit();
              }
              else{
                $_SESSION['Nume']=$result['Nume'];
                $_SESSION['Prenume']=$result['Prenume'];
                $_SESSION['materie1']=$result['materie1'];
                $_SESSION['materie2']=$result['materie2'];
                $_SESSION['Profil']=$result['Profil'];
                $_SESSION['Domeniu']=$result['Domeniu'];
                $_SESSION['Concurs']=$result['Concurs'];
                $_SESSION['Judet']=$result['Judet'];
                $_SESSION['PozaUser']=$result['PozaUser'];

                /*aici se termina sesiunile*/

                /*aici incepe resetarea cookieurilor*/
                $selector=bin2hex(random_bytes(24));
                $token=bin2hex(random_bytes(64));
                $hash=password_hash($token,PASSWORD_DEFAULT);
                $mysql="UPDATE auth(validator,selector) VALUES (".$hash.",".$selector.")";
                mysqli_query($connection,$mysql);

                setcookie("select", $selector,$valori['data'],"/",'http://localhost',1);
                setcookie("validator",$token,$valori['data'],"/",'http://localhost',1);


              }

            }
            else {
              header("Location: ");
              exit();
            }
      }
      else {
        header("Location: ");
        exit();
      }
  }
}
  else {
    header();
    exit();
  }
}
  else {
    header();
    exit();
  }
 ?>
