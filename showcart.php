<?php
/*
 * Author: Louie Zhu
 * Date: Jun 22, 2015
 * File: bookdetails.php
 * Description: this script displays details of a particular book.
 *
 */

$page_title = "Shopping Cart";
require_once('includes/header.php');
require_once('includes/database.php');
?>
    <h2 class="carth2">My Shopping Cart</h2>
<?php


if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    echo "<h2 class='carth'>Your shopping cart is empty.<br><br></h2>";
    include('includes/footer.php');
    exit();
}


//proceed since the cart is not empty
$cart = $_SESSION['cart'];

?>
    <table class="tablecart">
        <tr>
            <th style="width: 200px"></th>
            <th style="width: 200px">Name</th>
            <th style="width: 60px">Price</th>
            <th style="width: 60px">Quantity</th>
        </tr>
        <?php
        //insert code to display the shopping cart content

        //select statement
        $sql = "SELECT pack_id, image, name, price FROM packs WHERE 0";

        foreach (array_keys($cart) as $pack_id) {
            $sql .= " OR pack_id=$pack_id";
        }

        //execute the query
        $query = $conn->query($sql);

        $ovrtotal = 0;

        //fetch packs and display them in a table
        while ($row = $query->fetch_assoc()) {
            $pack_id = $row['pack_id'];
            $name = $row['name'];
            $price = $row['price'];
            $qty = $cart[$pack_id];
            $total = $qty * $price;
            $ovrtotal += $total;
            echo "<tr>",
                "<td><img class='cartimage' src='images/" . $row['image'] . "?>' ></td>",
            "<td><a href='packsdetails.php?id=$pack_id'>$name</a></td>",
            "<td>$$price</td>",
            "<td>$qty</td>",
            "</tr>";
        }
        ?>
    </table>
<?php
echo "<div class='total'>Total:<div class='totalnum'>&nbsp$$ovrtotal</div></div>";
?>
    <br>
    <div class="totalbtns">
        <div class="totalbtns2">
            <input type="button" value="Cancel" onclick="window.location.href = 'listpacks.php'"/>
            <input class="checkout" type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
        </div>
    </div>
    <br><br>

<?php
include('includes/footer.php');
