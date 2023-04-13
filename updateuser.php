<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$page_title = "Update user details";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve, sanitize, and escape all fields from the form
$user_id = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_NUMBER_INT)));
$fname = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'fname', FILTER_SANITIZE_STRING)));
$lname = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'lname', FILTER_SANITIZE_STRING)));
$email = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL)));

//Define MySQL update statement
$sql = "UPDATE users SET
fname='$fname',
lname='$lname',
email='$email' WHERE user_id=$user_id";
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

echo "<div class='newusermsg'><h1>Account has been updated.</h1><div class='newusermsgbtn'><a href='listusers.php'>
<h4>Back to accounts</h4></a></div></div>";
$conn->close();

include ('includes/footer.php');