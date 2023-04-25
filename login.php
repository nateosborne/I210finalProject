<?php

//include code from database.php
require_once('includes/database.php');

//start session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//create variable login status.
$_SESSION['login_status'] = 2;
$email = $passcode = "";

//retrieve user name and password from the form in the login form
if (filter_has_var(INPUT_POST, 'username') || filter_has_var(INPUT_POST, 'password')) {
    $email = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));
    $password = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
}

//validate user name and password against a record in the users table in the database. If they are valid, create session variables.
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$query = @$conn->query($sql);
if ($query->num_rows) {
//It is a valid user. Need to store the user in session variables.
    $row = $query->fetch_assoc();
    $_SESSION['login'] = $email;
    $_SESSION['role'] = $row['role'];
    $_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
    $_SESSION['login_status'] = 1;
}




//close the connection
$conn->close();

//redirect to the loginform.php page
header("Location: account.php");
