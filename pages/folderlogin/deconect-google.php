<?php

  require_once 'google-config.php';
  unset($_SESSION['acces_token']);
  $client->revokeToken();
  session_destroy();
  header("Location: ../../index.php?logout=succes");
