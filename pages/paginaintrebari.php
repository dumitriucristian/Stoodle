<?php

require_once './folderlogin/datacon.php';

$select=$_GET['select'];
$token=$_GET['valid'];
$date=date("U");

if(empty($select)||empty($token)){
    header("Location: ../register.php?error=invalidlink");
    exit();
}
  if(ctype_xdigit($select)===true && ctype_xdigit($token)===true){

    $mysql="SELECT * FROM users_verificare WHERE expireVerificare>=? AND selectVerificare =?";
    $stmt=mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt,$mysql))
   {
      header("Location: ../paginaintebari.php?error=mysqlerror");
      exit();
    }
      mysqli_stmt_bind_param($stmt,"ss",$date,$select);
      mysqli_stmt_execute($stmt);
      $rezultat=mysqli_stmt_get_result($stmt);
      if(!$rand=mysqli_fetch_assoc($rezultat))
      {
        $mysql="DELETE FROM users_verificare WHERE selectVerificare=?;";
        $stmt=mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt,$mysql))
        {
          header("Location: ../paginaintebari.php?error=mysqlerror");
          exit();
        }
          mysqli_stmt_bind_param($stmt,"s",$select);
          mysqli_stmt_execute($stmt);
          header("Location: ../register.php?error=expire");
          exit();
    }
      $ok=password_verify($token,$rand['tokenVerificare']);
      if($ok===false){
        header("Location: ../register.php?error=alttoken");
        exit();
      }
      elseif($ok===true)
      {

        $mysql="INSERT INTO users(Nume,Prenume,mailUser,pwdUsers) VAlUES(?,?,?,?) ";
        $stmt=mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt,$mysql)) {
          header("Location: ../paginaintebari.php?error=mysqlerror&select=".$select."&valid=".$token);
          exit();
        }
          mysqli_stmt_bind_param($stmt,"ssss",$rand['numeVerificare'],$rand['prenumeVerificare'],$rand['mailVerificare'],$rand['parolaVerificare']);
          mysqli_stmt_execute($stmt);

          $mysql="DELETE FROM users_verificare WHERE mailVerificare=".$rand['mailVerificare'].";";
          mysqli_query($connection,$mysql);

    }
    else {
        header("Location: ../register.php?error=eroaregenerala");
        exit();
    }
}
else {
  header("Location: ../register.php?error=eroaregenerala");
  exit();
}
