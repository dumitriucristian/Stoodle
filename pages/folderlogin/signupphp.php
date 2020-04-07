<?php
 if(isset($_POST['signupsubmit'])){

   require 'datacon.php';
   $nume=$_POST['nume'];
   $prenume=$_POST['prenume'];
   $email=$_POST['email'];
   $email_repeat=$_POST['confirmail'];
   $password=$_POST['passw'];
   $password_repeat=$_POST['passw-repeat'];
   $checkbox=$_POST['checkbox'];

  if(empty($nume)){
     header("Location: ../create.php?error=emptyfieldnume&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
     exit();
   }
  elseif(empty($prenume)){
    header("Location: ../create.php?error=emptyfieldprenume&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
    exit();
      }
  elseif(empty($email)){
      header("Location: ../create.php?error=emptyfieldemail&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
      exit();
         }
  elseif(empty($email_repeat)){
      header("Location: ../create.php?error=emptyfieldemailrepeat&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
      exit();
            }
  elseif(empty($password)){
    header("Location: ../create.php?error=emptyfieldpass&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
    exit();
               }
  elseif(empty($password_repeat)){
          header("Location: ../create.php?error=emptyfieldpassrepeat&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
          exit();
                  }
   elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     header("Location: ../create.php?error=invalidmail&nume=".$nume."&prenume=".$prenume."&confirmail=".$email_repeat);
     exit();
   }
   elseif (!filter_var($email_repeat, FILTER_VALIDATE_EMAIL)) {
     header("Location: ../create.php?error=invalidmailrepeat&nume=".$nume."&prenume=".$prenume."&email=".$email);
     exit();
   }
   elseif (!preg_match("/^[a-zA-Z]*$/", $nume)) {
     header("Location: ../create.php?error=invalidnume&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
     exit();
   }
   elseif (!preg_match("/^[a-zA-Z]*$/", $prenume)) {
     header("Location: ../create.php?error=invalidprenume&nume=".$nume."&email=".$email."&confirmail=".$email_repeat);
     exit();
   }
   elseif (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
     header("Location: ../create.php?error=invalidpassw&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
     exit();
   }
   elseif (!preg_match("/^[a-zA-Z0-9]*$/", $password_repeat)) {
     header("Location: ../create.php?error=invalidpasswrepeat&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
     exit();
   }
   elseif (strlen($nume)>24) {
     header("Location: ../create.php?error=marenume&email=".$email."&prenume=".$prenume."&confirmail=".$email_repeat);
     exit();
   }
   elseif (strlen($prenume)>24) {
     header("Location: ../create.php?error=mareprenume&email=".$email."&nume=".$nume."&confirmail=".$email_repeat);
     exit();
   }
   elseif (strlen($password)<8) {
     header("Location: ../create.php?error=micpassw&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
     exit();
   }
   elseif (strlen($password)>32) {
     header("Location: ../create.php?error=marepassw&email=".$email."&nume=".$nume."&confirmail=".$email_repeat);
     exit();
   }
   elseif (strpos(strtolower($nume),strtolower($password))!==false) {
     header("Location: ../create.php?error=identicpasswnume&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
     exit();
   }
   elseif (strpos(strtolower($password),strtolower($nume))!==false) {
     header("Location: ../create.php?error=identicpasswnume&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
     exit();
   }
   elseif (strpos(strtolower($prenume),strtolower($password))!==false) {
     header("Location: ../create.php?error=identicpasswprenume&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
     exit();
   }
   elseif (strpos(strtolower($password),strtolower($prenume))!==false) {
     header("Location: ../create.php?error=identicpasswprenume&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
     exit();
   }
   elseif ($email!==$email_repeat) {
     header("Location: ../create.php?error=mailother&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
     exit();
  }
   elseif ($password!==$password_repeat) {
     header("Location: ../create.php?error=passwdother&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
     exit();
 }
 elseif ($checkbox!=1) {
   header("Location: ../create.php?error=check&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
   exit();
}

       else{
        $mysql="SELECT mailUser FROM users WHERE mailUser=?";
        $stmt=mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt,$mysql)) {
          header("Location: ../create.php?error=mysqlerror");
          exit();
        }

        else{
          mysqli_stmt_bind_param($stmt,"s",$email);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          $rezultat_email=mysqli_stmt_num_rows($stmt);

          if($rezultat_email>0){
            header("Location: ../create.php?error=mailluat&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
            exit();
          }

          else {
              require("../foldereset/PHPMailer/src/PHPMailer.php");
              require("../foldereset/PHPMailer/src/SMTP.php");
              require("../foldereset/PHPMailer/src/Exception.php");

              $select=bin2hex(random_bytes(12));
              $token=random_bytes(32);

              $link="http://localhost/Stoodle/Back-End/pages/paginaintrebari.php?select=".$select."&valid=".bin2hex($token);
              $end=date("U")+24*60*60;

              $mysql="DELETE FROM users_verificare WHERE mailVerificare=?;";
              $stmt=mysqli_stmt_init($connection);
              if (!mysqli_stmt_prepare($stmt,$mysql)) {
                header("Location: ../reset.php?error=mysqlerror2");
                exit();
              }
              else {
                mysqli_stmt_bind_param($stmt,"s",$email);
                mysqli_stmt_execute($stmt);
                }



                $mysql="INSERT INTO users_verificare(numeVerificare,prenumeVerificare,mailVerificare,parolaVerificare,selectVerificare,tokenVerificare,expireVerificare) VALUES(?,?,?,?,?,?,?);";
                $stmt=mysqli_stmt_init($connection);
                if (!mysqli_stmt_prepare($stmt,$mysql)) {
                  header("Location: ../reset.php?error=mysqlerror1");
                  exit();
                }
                else {
                  $parola=password_hash($password,PASSWORD_DEFAULT);
                  $hash=password_hash($token, PASSWORD_DEFAULT);
                  mysqli_stmt_bind_param($stmt,"sssssss",$nume,$prenume,$email,$parola,$select,$hash,$end);
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
                  $mail->Subject='Crearea contului Stoodle';
                  $mail->Body='
                  <a href="http://localhost/Stoodle/Back-End/pages/paginainterbari.php"><p style="font-size: 2rem; font-weight: 700; font-family: "Raleway", sans-serif;">Stoodle</p></a>
                  </br>
                  <p>Bine ati venit in familia Stoodle , sper să fiți multumiți  de serviciile oferite de Stoodle in descoperirea facultatii potrivite pentru tine!
                  Daca nu dumneavoastra ati dorit sa va faceti cont puteti ignora acest mail.</p>
                  </br><p>Aici este link-ul pentru a va creea contul: <a href="'.$link.'">'.$link.'</a></p>';
                  $mail->AddAddress($email);
                  $mail->Send();



              /*trimitere mail*/



              header("Location: ../login.php?succes=register");
              exit();
          }
      }
    }
    mysqli_stmt_close($stmt1);
    mysqli_stmt_close($stmt2);
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
  else {
    header("Location: ../create.php");
    exit();
  }
