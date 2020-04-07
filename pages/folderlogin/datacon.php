<?php
 $server="localhost";
 $dbuser="root";
 $dbpass="";
 $dbname="stoodle";

 $connection=mysqli_connect($server,$dbuser,$dbpass,$dbname);
 if (!$connection) {
   die("Connection failed:  ".mysqli_connect_error());
 }
