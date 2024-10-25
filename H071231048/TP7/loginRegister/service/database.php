<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "tp7";

$db = mysqli_connect($hostname, $username, $password, $database);

if($db->connect_error){
    echo "not connected";
    die("error;");
}
?> 



