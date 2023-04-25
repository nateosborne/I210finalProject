<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login'])) {
    header("Location: account.php");
    exit();
}
//empty the shopping cart
$_SESSION['cart'] = '';
//display the header
require_once ('includes/header.php');

?>

    <div class='newusermsg'><h1>Thank you for shopping with us!</h1><div class='newusermsgbtn'><a href='home.php'>
                <h4>You will be notified when your items are shipped.</h4></a></div></div>


<?php
include ('includes/footer.php');
?>