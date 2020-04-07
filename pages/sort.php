<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "stoodle";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_errno) {
        die("Connection failed: " . $conn->connect_error);
    }
    $mysql='SELECT * FROM facultati';
    if($result=$conn->query($mysql))
  {
    if ($result->num_rows > 0) {
       json_encode($result);
    }
    else
    {
        echo "0 results";
    }
  }
?>
