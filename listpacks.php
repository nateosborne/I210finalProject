<?php

require_once 'includes/header.php';
require_once 'includes/database.php';

//SQL statement for select
$sql = "SELECT * FROM packs";

//run the SQL statement
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
//display results in a table
?>
    <div class="packlistback">
        <div class="packslistcont">
            <table class="packsList">
                <tr class="packsListhead">
                    <th>Pack ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Size</th>
                </tr>

                <?php
                //create a while loop here to insert one row for each pack.
                //insert a row for each record from query result
                while (($row = $query->fetch_assoc()) !== NULL) {
                    echo "<tr>";
                    echo "<td>" . $row['pack_id'] . "</td>";
                    echo "<td class='packslistname'><a href=packsdetails.php?id=", $row['pack_id'], ">", $row['name'],
                    "</a></td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['size'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>

<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();
