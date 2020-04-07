<?php
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");
require("PHPMailer/src/Exception.php");



if(isset($_POST['submit-reset'])){

  $select=bin2hex(random_bytes(12));
  $token=random_bytes(32);

  $link="http://localhost/stoodledarnu%20definitiv/pages/newparola.php?select=".$select."&valid=".bin2hex($token);
  $end=date("U")+60*60;

  if (empty($_POST['mailreset'])) {
    header("Location: ../reset.php?error=emptymail");
    exit();
  }
  elseif (!filter_var($_POST['mailreset'], FILTER_VALIDATE_EMAIL)) {
    header("Location: ../reset.php?error=numail");
    exit();
  }
  require_once '../folderlogin/datacon.php';
  $email=$_POST['mailreset'];
  $mysql="SELECT mailUser FROM users WHERE mailUser=?";
  $stmt=mysqli_stmt_init($connection);
  if (!mysqli_stmt_prepare($stmt,$mysql)) {
    header("Location: ../reset.php?error=mysqlerror");
    exit();
  }
  else{
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $useri=mysqli_stmt_num_rows($stmt);
    if($useri==0){
      header("Location: ../reset.php?error=nucont");
      exit();
    }
  $mysql="DELETE FROM resetare WHERE mailReset=?;";
  $stmt=mysqli_stmt_init($connection);
  if (!mysqli_stmt_prepare($stmt,$mysql)) {
    header("Location: ../reset.php?error=mysqlerror");
    exit();
  }
  else {
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);
    }


  $mysql="INSERT INTO resetare(mailReset,selectReset,tokenReset,expireReset) VALUES(?,?,?,?);";
  $stmt=mysqli_stmt_init($connection);
  if (!mysqli_stmt_prepare($stmt,$mysql)) {
    header("Location: ../reset.php?error=mysqlerror");
    exit();
  }
  else {
    $hash=password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss",$email,$select,$hash,$end);
    mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connection);

    /*  trimitere mail */


    /*
    FUNCTIA DIN PHP MAIL SE FOLOSESTE DOAR DACA AI UN MAIL SERVER ALTFEL NU VA FUNCTIONA ADICA TREBUIE SA AI SITE UL HOSTAT


    $subiect='Resetarea parolei pentru contul tau Stoodle';

    $header=
    '
    <a href="http://localhost/stoodledarnu%20definitiv/"><p style="font-size: 2rem; font-weight: 700; font-family: 'Raleway', sans-serif;">Stoodle</p></a>
    ';

    $mesaj=
    '
    <p>Am primit o cerere de resetare a parolei.Link-ul pentru a va reseta parola este mai jos.
    Daca nu dumneavoastra ati facut aceasta cerere puteti ignora acest mail.</p>
    </br><p>Aici este link-ul depentru a reseta parola:<a href="'.$link.'">'.$link.'</a></p>
    ';

    mail($email,$subiect,$mesaj,$header);

    */

    /*Gmail mail sender care este limitat la 100 de mail-uri pe zi*/
    $mail=new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP(true);
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host="ssl://smtp.gmail.com";
    $mail->Port='465';
    $mail->isHTML(true);
    $mail->Username='phprobertplaiasu03@gmail.com';
    $mail->Password='testgmail1234';
    $mail->SetFrom('phprobertplaiasu03@gmail.com');
    $mail->Subject='Resetarea parolei a contului Stoodle';
    $mail->Body='
    <a href="http://localhost/stoodledarnu%20definitiv/"><p style="font-size: 2rem; font-weight: 700; font-family: "Raleway", sans-serif;">Stoodle</p></a>
    </br>
    <p>Am primit o cerere de resetare a parolei.Link-ul pentru a va reseta parola este mai jos.
    Daca nu dumneavoastra ati facut aceasta cerere puteti ignora acest mail.</p>
    </br><p>Aici este link-ul pentru a reseta parola: <a href="'.$link.'">'.$link.'</a></p>';
    $mail->AddAddress($email);
    $mail->Send();

    header("Location: ../reset.php?resetmail=succes");
}
}
else {
  header("Location: ../login.php");
}
