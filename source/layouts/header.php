<?php $user = current_user(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="images/M&M_logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_template.css">
    <link rel="stylesheet" href="css/style_tabele.css">
    <link rel="stylesheet" href="css/style_form.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>M&M Store</title>
</head>
<body>
<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="images/M&M_logo.png" alt="logo M&M">
        </div>

        <span class="logo_name">M&M Store</span>
    </div>

    <div class="menu-items">

        <ul class="nav-links">

            <?php if ($user['user_level'] === '1'): ?>
                <?php include_once("admin_menu.php"); ?>

            <?php elseif ($user['user_level'] === '2'): ?>
                <?php include_once('layouts/admin_menu.php'); ?>

            <?php elseif ($user['user_level'] === '3'): ?>
                <?php include_once('layouts/admin_menu.php'); ?>

            <?php endif; ?>
        </ul>
        <ul class="footer-links">
            <li class="mode">
                <a href="#">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>
                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>

            <li>
                <br>
                <a href="#">
                    <i class="uil uil-copyright"></i>
                    <span class="link-name">Copyright 2023<br>M&MTeam<span class="link-name">
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="content">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>

        <div class="action">
            <div class="profile" onclick="menuToggle();">
                <img src="images/profile.png">
            </div>
            <div class="menu_login">
                <ul>
                    <li>
                        <i class="uil uil-signout"></i>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function menuToggle(){
            const toggleMenu=document.querySelector('.menu_login');
            toggleMenu.classList.toggle('active');
        }
    </script>
