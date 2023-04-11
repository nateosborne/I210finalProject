<?php

$page_title = "Create a new user";

require_once 'includes/header.php';
require_once 'includes/database.php';

//retrieve, sanitize, and escape user's input from a form
$fname = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'fname', FILTER_SANITIZE_STRING)));
$lname = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'lname', FILTER_SANITIZE_STRING)));
$email = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL)));
$password = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'password', FILTER_DEFAULT)));


//define the MySQL insert statement
$sql = "INSERT INTO users VALUES (NULL, '$fname', '$lname', '$email',
'$password')";

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

echo "The new user account has been created.";
$conn->close();

include 'includes/footer.php';