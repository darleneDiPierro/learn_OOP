<?php
include('config/app.php');
$auth->isLoggedIn();
require_once('includes/navbar.php');
?>


<?php include('message.php'); ?>


<form action="" method="POST">
    <h1>Login</h1>
    <div>
        <label for="uname">Username</label>
        <input type="text" name="uname" id="uname">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
    <button type="submit" name="login_btn">Submit</button>
</form>