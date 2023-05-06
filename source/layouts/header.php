<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="../images/M&M_logo.png" alt="logo M&M">
        </div>

        <span class="logo_name">M&M Store</span>
    </div>

    <div class="menu-items">

        <ul class="nav-links">

            <?php if ($user['user_level'] === '1'): ?>
                <!-- admin menu -->
                <?php include_once('layouts/admin_menu.php'); ?>

            <?php elseif ($user['user_level'] === '2'): ?>
                <!-- Special user -->
                <?php include_once('layouts/admin_menu.php'); ?>

            <?php elseif ($user['user_level'] === '3'): ?>
                <!-- User menu -->
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
        </ul>
    </div>
</nav>

<div class="content">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>


        <!--<img src="images/profile.jpg" alt="">-->
    </div>



