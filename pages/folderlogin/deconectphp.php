<?php
session_start();
  if(isset($_SESSION['mailUser']))
  {
  session_unset();
  session_destroy();
  setcookie("select", $selector,-60*60*24*30,"/");
  setcookie("validator",$token,-60*60*24*30,"/");
  header("Location: ../../indexpp.php?logout=succes");
  exit();

}
  if (isset($_SESSION['mailGmail'])) {
    require_once 'google-config.php';
    unset($_SESSION['acces_token']);
    $client->revokeToken();
    session_destroy();
    setcookie("select", $selector,-60*60*24*30,"/");
    setcookie("validator",$token,-60*60*24*30,"/");
    header("Location: ../../indexpp.php?logout=succes");
    exit();
  }
