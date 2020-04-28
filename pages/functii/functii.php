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


function comparare($valoare,$valoare_user,$materii_biologie,$materii_straine,$materii_matematica,$materii_informatica,$materii_antreprenor,$materii_psihologie,$materii_geografie)
{
  if($valoare_user == $valoare)
        return $suma= 5;
  elseif(in_array($valoare,$materii_straine) && in_array($valoare_user,$materii_straine))
    return $suma= 3;
  elseif(in_array($valoare,$materii_biologie) && in_array($valoare_user,$materii_biologie))
    return $suma= 3;
  elseif(in_array($valoare,$materii_matematica) && in_array($valoare_user,$materii_matematica))
    return $suma= 3;
  elseif(in_array($valoare,$materii_informatica) && in_array($valoare_user,$materii_informatica))
    return $suma= 3;
  elseif(in_array($valoare,$materii_antreprenor) && in_array($valoare_user,$materii_antreprenor))
    return $suma= 3;
  elseif(in_array($valoare,$materii_psihologie) && in_array($valoare_user,$materii_psihologie))
    return $suma= 3;
  elseif(in_array($valoare,$materii_geografie) && in_array($valoare_user,$materii_geografie))
    return $suma= 3;
  else
    return $suma=0;
}



function getCompability($array, $user)
{
    $materii_biologie=array("Chimie","Biologie","Fizica","Matematica");
    $materii_straine=array("Engleza","Franceza","Germana","Spaniola","Latina");
    $materii_matematica=array("Matematica","Fizica","Informatica");
    $materii_informatica=array("TIC","Informatica");
    $materii_antreprenor=array("ATP","Economie","Educatie civica");
    $materii_psihologie=array("Psihologie","Sociologie");
    $materii_geografie=array("Geografie","Istorie");


    $compability_couter = 0;
    $number_imapartire = 80;
    if($user[0]['Domeniu'] == $array['pasiune_facultati'])
        $compability_couter += 8*$user[0]['domeniu_intensitate'];
    if($user[0]['job'] == $array['job'])
        $compability_couter += 5;
    if($user[0]['carti'] == $array['carti'])
        $compability_couter += 5;
    if($user[0]['sociabila'] == $array['sociabil'])
        $compability_couter += 5;
    if($user[0]['sport'] == $array['sport'])
        $compability_couter += 5;
    if($user[0]['stres'] == $array['stres'])
        $compability_couter += 5;

    $compability_couter += comparare($array['materie1'],$user[0]['materie1'],$materii_biologie,$materii_straine,$materii_matematica,$materii_informatica,$materii_antreprenor,$materii_psihologie,$materii_geografie);
    $compability_couter += comparare($array['materie2'],$user[0]['materie2'],$materii_biologie,$materii_straine,$materii_matematica,$materii_informatica,$materii_antreprenor,$materii_psihologie,$materii_geografie);
    $compability_couter += comparare($array['materie3'],$user[0]['materie3'],$materii_biologie,$materii_straine,$materii_matematica,$materii_informatica,$materii_antreprenor,$materii_psihologie,$materii_geografie);

    return floor(($compability_couter/$number_questions) * 100);
}




?>
