<?php

$page_title = "Create a new pack";

require_once 'includes/header.php';
require_once 'includes/database.php';

//retrieve, sanitize, and escape user's input from a form
$name = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'description', FILTER_SANITIZE_STRING)));
$size = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'size', FILTER_DEFAULT)));
$price = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'price', FILTER_DEFAULT)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'image', FILTER_DEFAULT)));


//define the MySQL insert statement
$sql = "INSERT INTO packs VALUES (NULL, '$name', '$description', '$size',
'$price', '$image')";
//execute the query
$query = @$conn->query($sql);

$contents = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'contents', FILTER_DEFAULT)));
//define the MySQL insert statement
$sql = "INSERT INTO subfolders VALUES (NULL, '$contents')";
//execute the query
$query = @$conn->query($sql);

//handle error
if(!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Insertion failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    include 'includes/footer.php';
    exit;
}

echo "<div class='newusermsg'><h1>You have added a new pack!</h1><div class='newusermsgbtn'><a href='listpacks.php'>
<h4>Continue browsing</h4></a></div></div>";
$conn->close();

include 'includes/footer.php';