<?php

//start session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//unset all the session variables
$_SESSION = array();
//delete the session cookie
setcookie(session_name(), "", time() - 3600);
//destroy the session
session_destroy();

$page_title = "PHP Online Bookstore Logout";
include ('includes/header.php');

?>

    <div class='newusermsg'><h1>You are now logged out. Thanks for visiting!</h1><div class='newusermsgbtn'><a href='home.php'>
                <h4>Continue browsing</h4></a></div></div>

<?php
include ('includes/footer.php');