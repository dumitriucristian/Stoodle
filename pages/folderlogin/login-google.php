<?php
  session_start();
  require 'google-config.php';
  require 'datacon.php';

  if(isset($_GET['code'])){
    $token=$client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['acces_token']=$token;
    $auth=new Google_Service_Oauth2($client);
    $google_info=$auth->userinfo->get();
    $mail=$google_info['email'];
    $prenume=$google_info['given_name'];
    $nume=$google_info['family_name'];

    $_SESSION['mailGmail']=$mail;
    $mysql="SELECT mailGmail FROM users_gmail WHERE mailGmail='$mail';";
      $result=mysqli_query($connection,$mysql);
      if(mysqli_num_rows($result)>0){
        header('Location: ../homePage.php?login=succes');
        exit();
      }
      else {
        $mysql="INSERT INTO users_gmail(numeGmail,prenumeGmail,mailGmail) VALUES('$nume','$prenume','$mail');";
      if(mysqli_query($connection,$mysql)){
        header('Location: ../homePage.php?login=succes');
        exit();
      }
        else {
          header('Location:  ../login.php?error=mysqlerror');
          exit();
        }
      }
    }
  else {
    header('Location:  ../login.php?error=gmailconection');
    exit();
  }
