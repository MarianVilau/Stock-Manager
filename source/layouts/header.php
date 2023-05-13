<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="images/M&M_logo.png" alt="logo M&M">
        </div>

        <span class="logo_name">M&M Store</span>
    </div>

    <div class="menu-items">

        <ul class="nav-links">

            <!--?php if ($user['user_level'] === '1'): ?>
                 admin menu -->
                <?php include_once("admin_menu.php"); ?>
            <!--
            ?php elseif ($user['user_level'] === '2'): ?>
                !-- Special user
                ?php include_once('layouts/admin_menu.php'); ?>

            ?php elseif ($user['user_level'] === '3'): ?>
                !-- User menu
                ?php include_once('layouts/admin_menu.php'); ?-->

            <!--?php endif; ?-->
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

        <div class="action">
            <div class="profile" onclick="menuToggle();">
                <img src="images/profile.png">
            </div>
            <div class="menu_login">
                <ul>
                    <li>
                        <i class="uil uil-user"></i>
                        <a href="#">My Profile</a>
                    </li>
                    <li>
                        <i class="uil uil-setting"></i>
                        <a href="#">Settings</a>
                    </li>
                    <li>
                        <i class="uil uil-signout"></i>
                        <a href="..\old files\login.html">Logout</a>
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


