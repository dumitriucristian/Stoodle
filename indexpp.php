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
</head>
<body>
  <a href="./pages/login.php">Login</a>
  <br>
  <a href="./pages/register.php"> Register </a>
</body>
</html>
