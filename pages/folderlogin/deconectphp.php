<?php
  if(isset($_SESSION['mailUser']))
  {
  session_start();
  session_unset();
  session_destroy();
  header("Location: ../../indexpp.php?logout=succes");
  exit();
}
  if (isset($_SESSION['mailGmail'])) {
    require_once 'google-config.php';
    unset($_SESSION['acces_token']);
    $client->revokeToken();
    session_destroy();
    header("Location: ../../indexpp.php?logout=succes");
    exit();
  }
