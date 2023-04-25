<?php

require_once 'includes/header.php';

$message = "Please enter your email and password to login.";
//check the login status
$login_status = '';
if (isset($_SESSION['login_status']))
    $login_status = $_SESSION['login_status'];

//the user's last login attempt succeeded
if ($login_status == 1) {
    echo "<div class='newusermsg'><h1>You are logged in as " . $_SESSION['login'] . ".</h1><div class='newusermsgbtn'><a href='logout.php'>
<h4>Log Out</h4></a></div></div>";
    echo "<p></p>";
    include ('includes/footer.php');
    exit();
}
//the user has just registered
if ($login_status == 3) {
    echo "<p>Thank you for registering with us. Your account has been created.</p>";
    echo "<a href='logout.php'>Log out</a><br />";
    include ('includes/footer.php');
    exit();
}
//the user's last login attempt failed
if($login_status == 2) {
    $message = "Username or password invalid. Please try again.";
}

?>

<div class="account">
    <div class="account-cont">
        <div class="login">
            <form method='post' action='login.php'>
                <table>
                    <tr>
                        <td colspan="2"><?php echo $message; ?></br><br></td>
                    </tr>
                    <tr>
                        <td style="width: 80px">Email: </td>
                        <td><input type='text' name='email' required></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type='password' name='password' required></td>
                    </tr>
                    <tr>
                        <td colspan='2' style='padding: 10px 0 0 85px' class="bookstore-button">
                            <input type='submit' value='  Login  '>
                            <input type="submit" name="Cancel" value="Cancel" onclick="window.location.href = 'listpacks.php'" />
                        </td>
                    </tr>
                </table>
            </form>
<!--            <h1>Login</h1>-->
<!--            <div class="inputs">-->
<!--                <input class="submit1" type="email" placeholder="Email">-->
<!--                <input class="submit1" type="password" placeholder="Password">-->
<!--            </div>-->
<!--        </div>-->
        <div class="createact"><a href="createuser.php">Create account</a></div>
        <div class="createact"><a href="listusers.php">View accounts</a></div>
    </div>
</div>


<?php
require_once 'includes/footer.php';
?>
