<?php

// $server = "sql110.infinityfree.com";
// $username = "if0_37127177";
// $password = "wrVjDdEVZU1e";
// $dbname = "if0_37127177_mujolx";

$server = "";
$username = "";
$password = "";
$dbname = "";
$con=mysqli_connect('localhost','root','','olxstore');
// $con=mysqli_connect($server, $username,$password,$dbname);
 if(!$con){
    die(mysqli_error($conn));
}
 ?>