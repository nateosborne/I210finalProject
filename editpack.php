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

//retrieve pack id from a query string
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: pack id was not found.";
    exit();
}
$pack_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//select statement
$sql = "SELECT packs.pack_id, packs.name, packs.description, packs.size, packs.price, packs.image, subfolders.contents FROM packs,
        subfolders WHERE packs.pack_id=subfolders.subfolder_id AND packs.pack_id=" . $pack_id;

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

    <div class="account">
        <div class="account-cont2">
            <div class="login2">
                <h1>Edit Pack</h1>

                <form name="editpack" action="updatepack.php" method="get">
                    <table class="newuser">
                        <tr>
                            <td><input name="pack_id" value="<?php echo $row['pack_id'] ?>" readonly="readonly"/></td>
                        </tr>
                        <tr>
                            <td><input name="name" value="<?php echo $row['name'] ?>" size="30" required/></td>
                        </tr>
                        <tr>
                            <td><input name="description" value="<?php echo $row['description'] ?>" size="30" required/>
                            </td>
                        </tr>
                        <tr>
                            <td><input name="contents" value="<?php echo $row['contents'] ?>" size="30" required/></td>
                        </tr>
                        <tr>
                            <td><input name="size" value="<?php echo $row['description'] ?>" size="30" required/></td>
                        </tr>
                        <tr>
                            <td><input name="price" value="<?php echo $row['price'] ?>" size="30" required/></td>
                        </tr>
                        <tr>
                            <td><input name="image" value="<?php echo $row['image'] ?>" size="30" required/></td>
                        </tr>

                    </table>
                    <br>
                    <div class="userbuttons">
                        <input class="submit" type="button"
                               onclick="window.location.href='packsdetails.php?id=<?php echo
                               $row['pack_id'] ?>'" value="Cancel">
                        <input class="submitblue" type="submit" value="Update">&nbsp;&nbsp;
                    </div>


                </form>
            </div>
        </div>
    </div>


<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once('includes/footer.php');
?>