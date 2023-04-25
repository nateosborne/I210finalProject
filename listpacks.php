<?php

require_once 'includes/header.php';
require_once 'includes/database.php';

//variables for a user’s login, name, and role
$login = '';
$role = 0;

//if the use has logged in, retrieve login, name, and role.
if (isset($_SESSION['login']) AND
    isset($_SESSION['role'])) {
    $login = $_SESSION['login'];
    $role = $_SESSION['role'];
}

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
    <!--        <div class="packslistcont">-->
    <!--            <table class="packsList">-->
    <!--                <tr class="packsListhead">-->
    <!--                    <th>Name</th>-->
    <!--                    <th>Description</th>-->
    <!--                    <th>Size</th>-->
    <!--                </tr>-->
    <!---->
    <!--                --><?php
//            //create a while loop here to insert one row for each pack.
//            //insert a row for each record from query result
//            while (($row = $query->fetch_assoc()) !== NULL) {
//                echo "<tr>";
//                echo "<td class='packslistname'><a href=packsdetails.php?id=", $row['pack_id'], ">", $row['name'],
//                "</a></td>";
//                echo "<td>" . $row['description'] . "</td>";
//                echo "<td>" . $row['size'] . "</td>";
//                echo "</tr>";
//            }
//            ?>
    <!--            </table>-->
    <!--        </div>-->

    <div class="listpacks">
        <?php
        //create a while loop here to insert one row for each pack.
        //insert a row for each record from query result
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

        if ($role == 1) {
            echo "<div><a href='createpack.php'>Add Pack</a></div>";
        }
        ?>
    </div>

<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

require_once 'includes/footer.php';

?>