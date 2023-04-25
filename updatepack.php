<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$page_title = "Update pack details";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve, sanitize, and escape all fields from the form
$pack_id = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'pack_id', FILTER_SANITIZE_NUMBER_INT)));
$name = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'description', FILTER_SANITIZE_STRING)));
$size = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'size', FILTER_DEFAULT)));
$price = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'price', FILTER_DEFAULT)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'image', FILTER_DEFAULT)));

//Define MySQL update statement
$sql = "UPDATE packs SET
name='$name',
description='$description',
size='$size',
price='$price',
image='$image' WHERE pack_id=$pack_id";
//Execute the query.
$query = @$conn->query($sql);

$contents = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'contents', FILTER_DEFAULT)));
$sql = "UPDATE subfolders SET
contents='$contents' WHERE subfolder_id=$pack_id";
//Execute the query.
$query = @$conn->query($sql);


//execute the query


//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Connection Failed with: $errno, $errmsg<br/>\n";
    include ('includes/footer.php');
    exit;
}

echo "<div class='newusermsg'><h1>Packs has been updated.</h1><div class='newusermsgbtn'><a href='listpacks.php'>
<h4>Back to packs</h4></a></div></div>";
$conn->close();

include ('includes/footer.php');