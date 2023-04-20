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
$sql = "SELECT packs.pack_id, packs.name, packs.description, packs.size, subfolders.contents FROM packs,
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
<!--    <div class="packlistback">-->
<!--    <div class="packslistcont">-->
<!--    <table class="packsList">-->
<!--        <tr class="packsListhead">-->
<!--            <th>Pack Name</th>-->
<!--            <th>Description</th>-->
<!--            <th>Contents</th>-->
<!--            <th>Size</th>-->
<!--        </tr>-->
<!---->
<!--        --><?php
//        //create a while loop here to insert one row for each message.
//        while(($row = $query->fetch_assoc()) !== NULL){
//            echo "<tr>";
//            echo "<td class='packslistname'>", $row['name'], "</td>";
//            echo "<td>", $row['description'], "</td>";
//            echo "<td>", $row['contents'], "</td>";
//            echo "<td>", $row['size'], "</td>";
//            echo "</tr>";
//        }
//        ?>
<!--    </table>-->
<!--    </div>-->
<!--    </div>-->

<!--    <div class="hero">-->
        <?php
        //create a while loop here to insert one row for each pack.
        //insert a row for each record from query result
        while (($row = $query->fetch_assoc()) !== NULL) {
            echo "<div class='hero'>";
            echo "<div class='herocontainer'>";
            echo "<div class='heroimg2'></div>";
            echo "<div class='herotxt2'><h1>", $row['name'],"</h1>";
            echo "<a href='addtocart.php?id=$pack_id'",
            "<div class='addtocart'>ADD TO CART</div></a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class='packdetails'>";
            echo "<div class='packdetailscont'><h2>The Sounds of</h2><h1>",
                $row['name'],"</h1><p>", $row['description'],"</p><br><h2>Contents include:</h2><p>",
                $row['contents'],"</p><h2>Size: ",
            $row['size'],"</h2><p>";
            echo "<div class='back'><a href='listpacks.php'>< Back to packs</a></div>";
            echo "</div>";
            echo "</div>";

        }
        ?>
<!--    </div>-->


<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

require_once 'includes/footer.php';

?>