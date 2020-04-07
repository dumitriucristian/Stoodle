<?php

public function erore1($value,$msg)
{
  if(isset($_GET['error'])){
    if($_GET['error']==$value){
      echo $msg;
    }
  }
}


public function erore2($value,$msg)
{
  if(isset($_GET['error'])){
    if($_GET['error']==$value){
      echo '<div class="alert alert-danger" role="alert">
                '.$msg.'
            </div>';
    }
  }
}
public function succes($value,$msg)
{
  if(isset($_GET['succes'])){
    if($_GET['succes']==$value){
      echo '<div class="alert alert-danger" role="alert">
                '.$msg.'
            </div>';
    }
  }
}
public function UserJson()
{
  $user=array
  (
    "nume"=>$_SESSION['nume'];
    "prenume"=>$_SESSION['prenume'];
    "materie1"=>$_SESSION['materie1'];
    "materie2"=>$_SESSION['materie2'];
    "Profil"=>$_SESSION['Profil'];
    "Domeniu"=>$_SESSION['Domeniu'];
    "Concurs"=>$_SESSION['Concurs'];
    "Judet"=>$_SESSION['Judet'];
    "PozaUser"=>$_SESSION['PozaUser'];
  );

  print json_encode($user);

}
?>
