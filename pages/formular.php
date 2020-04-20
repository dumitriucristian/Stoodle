<?php
  session_start();
  require './folderlogin/datacon.php';
  include 'array.php';
  if (isset($_POST['formularsubmit']))
{
    $pasiune=$_POST['pasiune'];
    $intensitate_pasiune=$_POST['intesitate_pasiune'];
    $job=$_POST['job'];
    $carti=$_POST['carti'];
    $judet=$_POST['judet'];
    $sport=$_POST['sport'];
    $stres=$_POST['stres'];
    $social=$_POST['social'];
    $materie1=$_POST['materie1'];
    $materie2=$_POST['materie2'];
    $materie3=$_POST['materie3'];

    function bolVal($val){
      if($val!=0 && $val!=1){
        header("Location: ./formularTemplate.php");
        exit();
      }
    }
    function arrayVal($val,$array){
      if(!array_search($val,$array,TRUE)){
        header("Location: ./formularTemplate.php");
        exit();
      }
    }

    if(empty($pasiune) || empty($intensitate_pasiune) || empty($job) || empty($carti) || empty($judet) || empty($sport) || empty($stres) || empty($social) || empty($materie1) || empty($materie2) || empty($materie3)){
      header("Location: ./formularTemplate.php?2");
      exit();
    }
    if ($intensitate_pasiune<6 && $intensitate_pasiune>0) {
      header("Location: ./formularTemplate.php?1");
      exit();
    }
    bolVal($sport);
    bolVal($stres);
    bolVal($social);
    bolVal($job);


    arrayVal($judet,$array_judet);
    arrayVal($materie1,$array_materie);
    arrayVal($materie2,$array_materie1);
    arrayVal($materie3,$array_materie1);
    arrayVal($carti,$array_carti);
    arrayVal($pasiune,$array_pasiune);



    $session=$_SESSION['mailUser'];
    $mysql="INSERT INTO users(Domeniu,domeniu_intensitate,job,materie1,materie2,materie3,carti,sociabil,sport,stres,Judet) VALUES(?,?,?,?,?,?,?,?,?,?,?,?) WHERE mailUser=?";
    $stmt=mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt,$mysql)){
      header("Location: ./formularTemplate.php?1");
      exit();
    }
    mysqli_stmt_bind_param($stmt,"ssssssssssss",$pasiune,$intensitate_pasiune,$job,$materie1,$materie2,$materie3,$carti,$social,$sport,$stres,$judet,$session);
    mysqli_stmt_execute($stmt);



}
else {
  header("Location: ./formularTemplate.php");
  exit();
}
