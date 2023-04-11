<?php

require_once 'includes/header.php';

?>

<div class="account">
    <div class="account-cont2">
            <div class="login2">
                <h1>Create Account</h1>
                <div class="inputs2">
                    <input name="fname" class="submit1" type="text" placeholder="First Name">
                    <input name="lname" class="submit1" type="text" placeholder="Last Name">
                    <input name="email" class="submit1" type="email" placeholder="Email">
                    <input name="password" class="submit1" type="text" placeholder="Password">
                </div>
            </div>
            <input class="submit" name="Submit" type="button" id="Submit" value="Submit">
    </div>
</div>

<!--<form action="adduser.php" method="get" enctype="text/plain">-->
<!--    <table class="newuser">-->
<!--        <tr>-->
<!--            <td>User Name: </td>-->
<!--            <td><input name="fname" type="text" required /></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>Full Name:</td>-->
<!--            <td><input name="lname" type="text" size="40" required /></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>Email:</td>-->
<!--            <td><input type="email" name="email" size="40" required /></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>Birth Date:</td>-->
<!--            <td><input type="text" name="password" required /> (yyyy-mm-dd)</td>-->
<!--        </tr>-->
<!---->
<!--    </table>-->
<!--    <input type="submit" name="Submit" id="Submit" value="Register" />-->
<!--</form>-->


<?php
require_once 'includes/footer.php';
?>
