<?php
/** Author: Louie Zhu
 *  Date: 10/30/2014
 *  Description: This PHP script retrieves a user id from a url querystring.
 *  It then retrieves details of the specified user from the users table in the databate.
 *  At the end, it displays user details in a HTML table.
 */

$page_title = "Users details";

require_once('includes/header.php');
require_once('includes/database.php');

//retrieve user id from a query string
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: user id was not found.";
    require_once('includes/footer.php');
    exit();
}
$user_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//select statement
$sql = "SELECT * FROM users WHERE user_id=" . $user_id;

//execute the query
$query = @$conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    //include the footer
    require_once('includes/footer.php');
    exit;
}
//pull a row
$row = $query->fetch_assoc();

//display results in a table
?>

    <div class="userslistcont">
        <table class="usersDetails">
            <tr>
                <th>User ID</th>
                <td> <?= $row['user_id'] ?></td>
            </tr>
            <tr>
                <th>First name</th>
                <td> <?= $row['fname'] ?></td>
            </tr>
            <tr>
                <th>Last name</th>
                <td> <?= $row['lname'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td> <?= $row['email'] ?></td>
            </tr>
        </table>
    </div>

    <div class="userdetailsbtns">
        <div class="userbtns">
            <a class="userdetailsbtn" href="edituser.php?id=<?php echo $row['user_id'] ?>">Edit</a>
            &nbsp;&nbsp;
            <a class="userdetailsbtn" href="deleteuser.php?id=<?php echo $row['user_id'] ?>">Delete</a>
            &nbsp;&nbsp;<a class="userdetailsbtn" href="listusers.php">Cancel</a>
        </div>
    </div>

    <p><a href="listusers.php">Back to Users</a></p>

<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once('includes/footer.php');
?>