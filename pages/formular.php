<?php
  session_start();
  require './folderlogin/datacon.php';
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
    $materie=$_POST['materii'];


    $array_judet=array("Alba","Arad ","Arges","Bacau","Bihor","Bistrita-Nasaud","Botosani","Braila","Brasov","Buzau","Calarasi","Caras-Severin","Cluj","Constanta","Covasna","Dambovta",
  "Dolj","Galati","Giurgiu","Gorj","Harghita","Hunedoara","Ialomita","Iasi","Ilfov","Maramures","Mehedinti","Mures","Neamt","Olt","Prahova","Salaj","Satu-Mare","Sibiu","Suceava","Teleorman",
  "Timis","Tulcea","Valcea","Vaslui","Vrancea");
    $array_materie=array("Limba si literatura romana","Engleza","Franceza","Germana","Spaniola","Matematica","Fizica","Educatie fizica","Religie","Informatica","TIC","Educatie civica","Desen","Muzica",
  "Biologie","Chimie","Istorie","Geografie","Economie","ATP","Latina","Psihologie","Sociologie");
    $array_carti=array("Culinare","Arte,tehnica","Enciclopedii","Biografii,memorii","Lingvistica","Limbi straine","Teatru","Poezie","Fictine","Atlase,ghiduri turistice","Istorie","Religie",
  "Religie","Filozofie","Psihologie","Stiinte sociale,politica","Marketing si comunicare","Business si economie","Drept","Medicina","Stiinte exacte.Matematica","Natura si mediu","Tehnica si tehnologie",
  "Computere si internet","Dezvoltare personala","Lifestyle,sport");
    $array_pasiune=array("Medicina","Matematica","Agricultura","Ecologie","Programare","Literatura","Muzica","Desen","Arhitectura","Astronomie","Fizica","Sport","Religie","Economie",
  "Business","Politica","Limbi straine","Filozofie","Drept","Biologie","Geografie","Geologie","Istorie","Jurnalism","Psihologie","Design","Constructii","Serviciul militar","Actorie","Regie","Editare video/sunet",
  "Chimie","Animale","Limba romana","Serviciul","Calculatoare","Electronica","Electricitate","Cibernetica","Inginerie Aerospatila","Serviciul in cadrul politiei");
    function boolVal($val){
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

    if(empty($pasiune) || empty($intensitate_pasiune) || empty($job) || empty($carti) || empty($judet) || empty($sport) || empty($stres) || empty($social) || empty($materie)){
      header("Location: ./formularTemplate.php");
      exit();
    }
    if ($intensitate_pasiune<6 && $intensitate_pasiune>0) {
      header("Location: ./formularTemplate.php");
      exit();
    }
    boolVal($sport);
    boolVal($stres);
    boolVal($social);
    boolVal($job);


    arrayVal($judet,$array_judet);
    arrayVal($materie,$array_materie);
    arrayVal($carti,$array_carti);
    arrayVal($pasiune,$array_pasiune);

    $session=$_SESSION['mailUser'];
    $mysql="INSERT INTO users(Domeniu,domeniu_intensitate,job,materie1,materie2,materie3,carti,sociabil,sport,stres,Judet) VALUES() WHERE mailUser='$session'";

}
else {
  header("Location: ./formularTemplate.php");
  exit();
}
