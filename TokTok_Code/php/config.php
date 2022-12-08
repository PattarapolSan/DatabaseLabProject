<?php
$hostname = "localhost";
$authname = "root";
$pass = "";
$dbname = "TokTokFinal";
session_start();
$conn = mysqli_connect($hostname, $authname, $pass, $dbname);
if($conn->connect_errno){
    echo $conn->connect_errno.": ".$conn->connect_error;
 }
?>