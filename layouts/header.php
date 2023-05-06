<?php $user = current_user(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style_template.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title><?php if (!empty($page_title))
            echo remove_junk($page_title);
        elseif (!empty($user))
            echo ucfirst($user['name']);
        else echo "Stock Management System"; ?></title>
</head>
<body>
<?php if ($session->isUserLoggedIn(true)): ?>

    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/M&M_logo.png" alt="logo M&M">
            </div>

            <span class="logo_name">M&M Store</span>
        </div>

        <?php /** @var TYPE_NAME $user */
        if ($user['user_level'] === '1'): ?>
            <!-- admin menu -->
            <?php include_once('layouts/admin_menu.php'); ?>

        <?php elseif ($user['user_level'] === '2'): ?>
            <!-- Special user -->
            <?php include_once('layouts/admin_menu.php'); ?>

        <?php elseif ($user['user_level'] === '3'): ?>
            <!-- User menu -->
            <?php include_once('layouts/admin_menu.php'); ?>

        <?php endif; ?>

        <ul class="footer-links">
            <li class="mode"><a href="#">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>
                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>
        </ul>

    </nav>

    <div class="content">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <label>
                    <input type="text" placeholder="Search here...">
                </label>
            </div>

            <!--<img src="images/profile.jpg" alt="">-->
        </div>
    </div>
    <script src="js/script_template.js"></script>

<?php endif; ?>


