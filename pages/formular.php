<?php
    $pasiune=$_POST['pasiune'];
    $intensitate_pasiune=$_POST['intesitate_pasiune'];
    $job=$_POST['job'];
    $carti=$_POST['carti'];
    $judet=$_POST['judet'];
    $sport=$_POST['sport'];
    $stres=$_POST['stres'];
    $social=$_POST['social'];
    $materie=$_POST['materii'];

    if(empty($pasiune) || empty($intensitate_pasiune) || empty($job) || empty($carti) || empty($judet) || empty($sport) || empty($stres) || empty($social) || empty($materie)){
      header("Location: ./formularTemplate.php?error=invalidlink");
      exit();
    }
