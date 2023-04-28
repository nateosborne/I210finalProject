<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Final Project</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/d2db57536d.js" crossorigin="anonymous"></script>
</head>

<div class="nav">
    <a href="home.php"><div class="logo"></div></a>
    <div class="links">
        <a href="home.php">Home</a>
        <a href="listpacks.php">Packs</a>
    </div>
    <div class="icons">
        <a target="_self" href="searchpacks.php"><i class="fa-solid fa-magnifying-glass"></i>
        <a target="_self" href="account.php"><i class="fa-solid fa-circle-user"></i></a>
        <a target="_self" href="showcart.php"><i class="fa-solid fa-bag-shopping"></i></a>
    </div>
</div>