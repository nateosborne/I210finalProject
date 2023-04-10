<?php

require_once 'includes/header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Final Project</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/d2db57536d.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="home">
    <div class="hero">
        <div class="herocontainer">
            <div class="heroimg"></div>
            <div class="herotxt">
                <h1>The ultimate <br><span>Hip Hop</span> Pack.</h1>
                <div class="herobtn"><a href="packsdetails.php?id=1">MORE</a></div>
            </div>

        </div>
    </div>
</div>

<div class="soundscont">
    <div class="sounds">
        <div class="soundstxt">
            <a href="listpacks.php"><h1>SOUNDS</h1></a>
            <a href="listpacks.php"><p>DISCOVER NEW SOUNDS ></p></a>
            <a href="listpacks.php"><div class="vinyls"></div></a>
        </div>
    </div>
</div>

</body>
</html>

<?php
require_once 'includes/footer.php';
?>