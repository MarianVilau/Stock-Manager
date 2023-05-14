<?php
ob_start();
require_once('includes/load.php');
if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/style_login.css">

</head>
<body>
<div class="login-container">
    <form method="post" action="auth.php" class="form-login">
        <div class="login-nav">
            <div class="login-nav__item active">
                Login
            </div>
            <img class="logo_name" src="images/M&M_logo.png" width="80px" height="80px" alt="Logo M&M">
        </div>
        <?php echo display_msg($msg); ?>

        <label for="username" class="login__label">
            Username
        </label>
        <input name="username" class="login__input" type="name" placeholder="Username">
        <label for="Password" class="login__label">
            Password
        </label>
        <input name= "password" class="login__input" type="password" placeholder="Password">

        <button  type="submit" class="login__submit" >Login</button>
    </form>
    <p class="login__copyright2">Copyright 2023 &copy; M&MTeam</p>
</div>


</body>
</html>
