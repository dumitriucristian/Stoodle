<?php
  require 'google-login/vendor/autoload.php';

  $client=new Google_Client();
  $client->setClientid('411161507969-6bk1iio0lpuuca4t2h6nucd7drh4ogfi.apps.googleusercontent.com');
  $client->setClientSecret('koisloW_hMA1IBqOq1ic9w4p');
  $client->setRedirectUri('http://localhost/Stoodle/Back-end/pages/folderlogin/login-google.php');
  $client->addScope('email');
  $client->addScope('profile');
  session_start();
