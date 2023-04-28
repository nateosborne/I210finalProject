<?php

require_once 'includes/header.php';

$message = "Please enter your email and password to login.";
//check the login status
$login_status = '';
if (isset($_SESSION['login_status']))
    $login_status = $_SESSION['login_status'];

//variables for a user’s login, name, and role
$login = '';
$role = 0;

//if the use has logged in, retrieve login, name, and role.
if (isset($_SESSION['login']) AND
    isset($_SESSION['role'])) {
    $login = $_SESSION['login'];
    $role = $_SESSION['role'];
}

//the user's last login attempt succeeded
if ($login_status == 1) {
    echo "<div class='newusermsg'><h1>You are logged in as " . $_SESSION['login'] . ".</h1>
    <div class='newusermsgbtn'><a href='logout.php'><h4>Log Out</h4></a>";
    if ($role == 1) {
        echo "<div class='newusermsgbtn'><a href='listusers.php'>View Accounts</a></div>";
    }
    echo"</div></div>";


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

if ($role == 1) {
    echo "<a href='listusers.php'>View Accounts</a>";
}

?>

<div class="account">
    <div class="account-cont2">
        <div class="login2">
            <form method='post' action='login.php'>
                <table class="newuser">
                    <tr>
                        <td class="accountmsg" colspan="2"><?php echo $message; ?></br><br></td>
                    </tr>
                    <tr>
                        <td><input type='text' name='email' placeholder="Email" required></td>
                    </tr>
                    <tr>
                        <td><input type='password' name='password' placeholder="Password" required></td>
                    </tr>
                    <tr>
                        <td>
                            <input class="submit2" type='submit' value='  Login  '>
                            <input class="submit2" type="submit" name="Cancel" value="Cancel" onclick="window.location.href = 'listpacks.php'" />
                        </td>
                    </tr>
                </table>
            </form>
        <div class="createact"><a href="createuser.php">Create account</a></div>
        </div>
    </div>
</div>

    <?php
    require_once 'includes/footer.php';
    ?>
