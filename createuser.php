<?php

require_once 'includes/header.php';

?>

<div class="account">
    <div class="account-cont2">
        <div class="login2">
            <h1>Create Account</h1>
            <!--                <div class="inputs2">-->
            <!--                    <input name="fname" class="submit1" type="text" placeholder="First Name">-->
            <!--                    <input name="lname" class="submit1" type="text" placeholder="Last Name">-->
            <!--                    <input name="email" class="submit1" type="email" placeholder="Email">-->
            <!--                    <input name="password" class="submit1" type="text" placeholder="Password">-->
            <!--                </div>-->
            <form action="adduser.php" method="get" enctype="text/plain">
                <table class="newuser">
                    <tr>
                        <td><input name="fname" type="text" placeholder="First name" required/></td>
                    </tr>
                    <tr>
                        <td><input name="lname" type="text" placeholder="Last name" size="40" required/></td>
                    </tr>
                    <tr>
                        <td><input type="email" name="email" size="40" placeholder="Email" required/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="password" placeholder="Password" required/></td>
                    </tr>
                </table>
                <div class="userbuttons">
                    <input class="submit2" type="submit" name="Submit" id="Submit" value="Submit"/>
                </div>
            </form>
        </div>
    </div>
</div>



<?php
require_once 'includes/footer.php';
?>
