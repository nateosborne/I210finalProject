<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = array();
}

//if pack id cannot be found, terminate script.
if (!filter_has_var(INPUT_GET, 'id')) {
    $error = "Pack id not found. Operation cannot proceed.<br><br>";
    header("Location: error.php?m=$error");
    die();
}

//retrieve book id and make sure it is a numeric value.
$pack_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!is_numeric($pack_id)) {
    $error = "Invalid pack id. Operation cannot proceed.<br><br>";
    header("Location: error.php?m=$error");
    die();
}

if (array_key_exists($pack_id, $cart)) {
    $cart[$pack_id] = $cart[$pack_id] + 1;
} else {
    $cart[$pack_id] = 1;
}

//update the session variable
$_SESSION['cart'] = $cart;

//redirect to the showcart.php page.
header('Location: showcart.php');