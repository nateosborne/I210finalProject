<?php
/** Author: Louie Zhu
 *  Date: 10/30/2014
 *  Description: This PHP script retrieves a user id from a url querystring.
 *  It then retrieves details of the specified user from the users table in the databate.
 *  At the end, it displays user details in a HTML table.
 */

$page_title = "Edit users details";

require_once('includes/header.php');
require_once('includes/database.php');

//retrieve user id from a query string
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: user id was not found.";
    require_once ('includes/footer.php');
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

    <h2>Edit User Details</h2>

    <form name="edituser" action="updateuser.php" method="get">
        <table class="userdetails">
            <tr>
                <th>User ID</th>
                <td><input name="user_id" value="<?php echo $row['user_id'] ?>" readonly="readonly" /></td>
            </tr>
            <tr>
                <th>First name</th>
                <td><input name="fname" value="<?php echo $row['fname'] ?>" size="30" required /></td>
            </tr>
            <tr>
                <th>Last name</th>
                <td><input name="lname" value="<?php echo $row['lname'] ?>" size="30" required /></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="email" value="<?php echo $row['email'] ?>" size="40" required /></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Update">&nbsp;&nbsp;
        <input type="button" onclick="window.location.href='userdetails.php?id=<?php echo
        $row['user_id'] ?>'" value="Cancel">

    </form>

    <p><a href="listusers.php">Back to Users</a></p>

<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once('includes/footer.php');
?>