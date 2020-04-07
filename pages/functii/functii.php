<?php

function erore1($value,$msg)
{
  if(isset($_GET['error'])){
    if($_GET['error']==$value){
      echo $msg;
    }
  }
}

function erore2($value,$msg)
{
  if(isset($_GET['error'])){
    if($_GET['error']==$value){
      echo '<div class="alert alert-danger" role="alert">
                '.$msg.'
            </div>';
    }
  }
}
function succes($value,$msg)
{
  if(isset($_GET['succes'])){
    if($_GET['succes']==$value){
      echo '<div class="alert alert-danger" role="alert">
                '.$msg.'
            </div>';
    }
  }
}
?>
