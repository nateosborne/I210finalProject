<?php

$page_title = "Create a new user";

require_once 'includes/header.php';
require_once 'includes/database.php';

//retrieve, sanitize, and escape user's input from a form
$fname = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'fname', FILTER_SANITIZE_STRING)));
$lname = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'lname', FILTER_SANITIZE_STRING)));
$email = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL)));
$password = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'password', FILTER_DEFAULT)));

$role = 2;

//define the MySQL insert statement
$sql = "INSERT INTO users VALUES (NULL, '$fname', '$lname', '$email',
'$password', '$role')";

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

echo "<div class='newusermsg'><h1>You have signed up!</h1><div class='newusermsgbtn'><a href='home.php'>
<h4>Continue browsing</h4></a></div></div>";
$conn->close();

include 'includes/footer.php';