<?php

require_once 'includes/header.php';

?>

<div class="account">
    <div class="account-cont2">
        <div class="login2">
            <h1>Create Pack</h1>

            <form action="addpack.php" method="get" enctype="text/plain">
                <table class="newuser">
                    <tr>
                        <td><input name="name" type="text" placeholder="Name" required/></td>
                    </tr>
                    <tr>
                        <td><input name="description" type="text" placeholder="Description" size="40" required/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="contents" placeholder="Contents" required/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="size" size="40" placeholder="Size" required/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="price" placeholder="Price" required/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="image" placeholder="Image url" required/></td>
                    </tr>
                </table>
                <div class="userbuttons">
                    <input class="submit2" type="submit" name="Submit" id="Submit" value="Add Pack"/>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once 'includes/footer.php';
?>
