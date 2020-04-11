<?php

if(isset($_POST['submit-parola-reset'])){
  $select=$_POST['select'];
  $token=$_POST['token'];
  $parola=$_POST['resetparola'];
  $confparola=$_POST['resetconfirmareparola'];


  /*empty fields*/
  function emptyVar($var){
    if(empty($var)){
      header("Location: ../newparola.php?error=emptyfield&select=".$select."&valid=".$token);
      exit();
    }
  }
  function validateVarParola($var,$msg){
    if(!preg_match("/^[a-zA-Z]*$/", $var)) {
      $msg="Location: ../newparola.php?error=invalid".$msg;
       header($msg);
       exit();
    }
    if (strlen($var)<8) {
      $msg="Location: ../newparola.php?error=mic".$msg;
       header($msg);
       exit();
    }
    if(strlen($var)>48) {
      $msg="Location: ../newparola.php?error=mare".$msg;
       header($msg);
       exit();
    }
  }


  emptyVar($parola);
  emptyVar($confparola);

  validateVarParola($parola,"parola");
  validateVarParola($confparola,"confirmareparola");

  elseif ($parola !== $confparola) {
    header("Location: ../newparola.php?error=difparola&select=".$select."&valid=".$token);
    exit();
  }

  $date=date("U");

  require_once '../folderlogin/datacon.php';
  $mysql="SELECT * FROM resetare WHERE expireReset>=? AND selectReset =?";
  $stmt=mysqli_stmt_init($connection);
  if (!mysqli_stmt_prepare($stmt,$mysql)) {
    header("Location: ../newparola.php?error=mysqlerror&select=".$select."&valid=".$token);
    exit();
  }
    mysqli_stmt_bind_param($stmt,"ss",$date,$select);
    mysqli_stmt_execute($stmt);
    $rezultat=mysqli_stmt_get_result($stmt);
    if(!$rand=mysqli_fetch_assoc($rezultat)){
      $mysql="DELETE FROM resetare WHERE selectReset=?;";
      $stmt=mysqli_stmt_init($connection);
      if (!mysqli_stmt_prepare($stmt,$mysql)) {
        header("Location: ../newparola.php?error=mysqlerror&select=".$select."&valid=".$token);
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt,"s",$select);
        mysqli_stmt_execute($stmt);
      header("Location: ../reset.php?error=expire");
      exit();
    }
  }
      $ok=password_verify($token,$rand['tokenReset']);
      if($ok===false){
        header("Location: ../newparola.php?error=anothertoken");
        exit();
      }
      elseif($ok===true){

        $mysql="SELECT * FROM users WHERE mailUser=?;";
        $stmt=mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt,$mysql)) {
          header("Location: ../newparola.php?error=mysqlerror&select=".$select."&valid=".$token);
          exit();
        }
          mysqli_stmt_bind_param($stmt,"s",$rand['mailReset']);
          mysqli_stmt_execute($stmt);
          $rezultat=mysqli_stmt_get_result($stmt);
          if(!$var=mysqli_fetch_assoc($rezultat)){
            header("Location: ../reset.php?error=nouser");
            exit();
          }

          else{
            $mysql="SELECT * FROM users WHERE pwdUsers=?";
            $stmt=mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt,$mysql)) {
              header("Location: ../newparola.php?error=mysqlerror&select=".$select."&valid=".$token);
              exit();
            }
              $hash=password_hash($parola, PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt,"s",$hash);
              mysqli_stmt_execute($stmt);
              $rezultat=mysqli_stmt_get_result($stmt);
              if($var=mysqli_fetch_assoc($rezultat)){
                header("Location: ../newparola.php?error=aceeasiparola&select=".$select."&valid=".$token);
                exit();
              }
            else{
            $mysql="UPDATE users SET pwdUsers=? WHERE mailUser=?";
            $stmt=mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt,$mysql)) {
              header("Location: ../newparola.php?error=mysqlerror&select=".$select."&valid=".$token);
              exit();
            }
              $hash=password_hash($parola,PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt,"ss",$hash,$rand['mailReset']);
              mysqli_stmt_execute($stmt);

              $mysql="DELETE FROM resetare WHERE mailReset=?;";
              $stmt=mysqli_stmt_init($connection);
              if (!mysqli_stmt_prepare($stmt,$mysql)) {
                header("Location: ../newparola.php?error=mysqlerror&select=".$select."&valid=".$token);
                exit();
              }
                mysqli_stmt_bind_param($stmt,"s",$rand['mailReset']);
                mysqli_stmt_execute($stmt);
                header("Location: ../login.php?succes=resetare");
                exit();
            }
          }

        }
    }
  else{
    header("Location: ../login.php");
  }
?>
