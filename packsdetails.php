<?php

require_once('includes/header.php');
require_once('includes/database.php');


//retrieve pack id from a query string
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: pack id was not found.";
    exit();
}
$pack_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//select statement
$sql = "SELECT packs.name, packs.description, packs.size, subfolders.contents FROM packs,
        subfolders WHERE packs.pack_id=subfolders.author_id AND packs.pack_id=" . $pack_id;

//execute the query
$query = @$conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
//handle zero message
if(!$query->num_rows) {
    echo "There was no messages posted by the user.";
    $conn->close();
    echo "<p><a href='listpacks.php'>Back to Users</a></p>";
    exit;
}

//display results in a table
?>
    <div class="packlistback">
    <div class="packslistcont">
    <table class="packsList">
        <tr class="packsListhead">
            <th>Pack Name</th>
            <th>Description</th>
            <th>Contents</th>
            <th>Size</th>
        </tr>

        <?php
        //create a while loop here to insert one row for each message.
        while(($row = $query->fetch_assoc()) !== NULL){
            echo "<tr>";
            echo "<td class='packslistname'>", $row['name'], "</td>";
            echo "<td>", $row['description'], "</td>";
            echo "<td>", $row['contents'], "</td>";
            echo "<td>", $row['size'], "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    </div>
    </div>

    <p><a href="listpacks.php">Back to Packs</a></p>

<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();
?>