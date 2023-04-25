<?php

require_once('includes/header.php');
require_once('includes/database.php');

if (filter_has_var(INPUT_GET, "terms")) {
    $terms_str = filter_input(INPUT_GET, 'terms', FILTER_SANITIZE_STRING);
} else {
    echo "There was not search terms found.";
    include('includes/footer.php');
    exit;
}

//explode the search terms into an array
$terms = explode(" ", $terms_str);

//select statement using pattern search. Multiple terms are concatnated in the loop.
$sql = "SELECT * FROM packs WHERE 1";
foreach ($terms as $term) {
    $sql .= " AND name OR description LIKE '%$term%'";
}

//execute the query
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg.";
    $conn->close();
    include('includes/footer.php');
    exit;
}

echo "<h1 class='packsresultsh1'>Search results for: $terms_str</h1>";

//display results in a table
if ($query->num_rows == 0) {
    echo "Your search <i>'$terms_str'</i> did not match any packs in our inventory";
    include('includes/footer.php');
    exit;
}
?>
    <div class="listpacks">

<?php

while (($row = $query->fetch_assoc()) !== NULL) {
    echo "<div class='listpacks'>";
    echo "<div class='listpacks2'>";
    echo "<div class='listpacksimg'><img class='listpacksimg' src='images/" . $row['image'] ."?>' ></div>";
    echo "<h1 class='listpacksname'><a href=packsdetails.php?id=", $row['pack_id'], ">", $row['name'],
    "</a></h1>";
    echo "<div class='listpacksbtn'>";
    echo "<div class='packsbtn'><a style='color: white; text-decoration: none' href=packsdetails.php?id=", $row['pack_id'],
    "</a>MORE</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>
    </div>

<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

include('includes/footer.php');
