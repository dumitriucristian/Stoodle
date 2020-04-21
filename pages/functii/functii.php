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

function getCompability($array, $user){
    $compability_couter = 0;
    $number_questions = 9;
    if($user[0]['Domeniu'] == $array['pasiune_facultati'])
        $compability_couter += 1;
    if($user[0]['job'] == $array['job'])
        $compability_couter += 1;
    if($user[0]['materie1'] == $array['materie1'])
        $compability_couter += 1;
    if($user[0]['materie2'] == $array['materie2'])
        $compability_couter += 1;
    if($user[0]['materie3'] == $array['materie3'])
        $compability_couter += 1;
    if($user[0]['carti'] == $array['carti'])
        $compability_couter += 1;
    if($user[0]['sociabila'] == $array['sociabil'])
        $compability_couter += 1;
    if($user[0]['sport'] == $array['sport'])
        $compability_couter += 1;
    if($user[0]['stres'] == $array['stres'])
        $compability_couter += 1;
    return ($compability_couter/$number_questions) * 100;
}



























?>
