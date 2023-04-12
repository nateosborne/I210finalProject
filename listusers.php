<?php

$page_title = "List users";

require_once('includes/header.php');
require_once('includes/database.php');

//SQL statement for select
$sql = "SELECT * FROM users";

//run the SQL statement
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    require_once('includes/footer.php');
    exit;
}
//display results in a table
?>

    <div class="userslistcont">
    <table class="usersList">
        <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>

        <?php
        //create a while loop here to insert one row for each user.
        //insert a row for each record from query result
        while(($row = $query->fetch_assoc()) !== NULL){
            echo "<tr>";
            echo "<td>" . $row['user_id'] . "</td>";
            echo "<td><a href=userdetails.php?id=", $row['user_id'], ">", $row['fname'],
            "</a></td>";;
            echo "<td>" . $row['lname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";

            echo"</tr>";
        }
        ?>
    </table>
    </div>

<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once('includes/footer.php');