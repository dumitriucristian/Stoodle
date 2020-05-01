<?php
require './folderlogin/datacon.php';
require './functii/functii.php';
//session_start();

class facultate {
    public $nume;
    public $universitate;
    public $judet;
    public $profil;
    public $compabilitate;
    public $link;
}

//GET USER INFO FROM DATABASE
$mail = $_SESSION['mailUser'];
$sql = "SELECT * FROM `users` WHERE `mailUser` = '$mail'";
$result = mysqli_query($connection,$sql);
$user = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user[] = $row;
    }
}
else
{
    echo "0 results";
}

//print_r($user*/

// GET COLLEGES FROM DATABASE
$sql = "SELECT * FROM `facultati`";
$result = mysqli_query($connection,$sql);
$myArray = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $myArray[] = $row;
    }
}
else
{
    echo "0 results";
}

$facultati = array();
// GET DATA
foreach ($myArray as $_facultate) {
    $temp = new facultate();
    $temp->nume = $_facultate['Numef'];
    $temp->universitate = $_facultate['Universitatea'];
    $temp->judet = $_facultate['Judet'];
    $temp->profil = $_facultate['Profil'];
    $temp->compabilitate = getCompability($_facultate, $user);
    $temp->link = $_facultate['link_facultate'];
    array_push($facultati, $temp);
}

//print json_encode($facultati);
//print_r($myArray
