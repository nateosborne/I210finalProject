<?php

$page_title = "Delete a user account";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve user id from a querystring
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: user id was not found.";
    require_once ('includes/footer.php');
    exit();
}

$user_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//Define MySQL delete statement
$sql = "DELETE FROM users WHERE user_id=$user_id";
//Execute the query.
$query = @$conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
//confirm delete
echo "<div class='newusermsg'><h1>Account has been deleted</h1><div class='newusermsgbtn'><a href='listusers.php'>
<h4>Back to accounts</h4></a></div></div>";
$conn->close();

include ('includes/footer.php');