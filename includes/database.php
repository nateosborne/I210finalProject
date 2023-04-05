<?php
//define parameters to connect the database
$host = "localhost";
$login = "phpuser";
$password = "phpuser";
$database = "final";

//connect to the database
$conn = @new mysqli($host, $login, $password, $database);

//var_dump($conn);

//connection error handler
if($conn->connect_errno){
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_errno;
    die("Connection to database failed: ($errno) $errmsg");
}