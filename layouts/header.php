<?php $user = current_user(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style_template.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css">

    <title><?php if (!empty($page_title))
            echo remove_junk($page_title);
        elseif (!empty($user))
            echo ucfirst($user['name']);
        else echo "Stock Management System"; ?></title>
</head>
<body>
<?php /** @var TYPE_NAME $session */
if ($session->isUserLoggedIn(true)): ?>


    <header id="header" class="content">
        <div class="header-content">
            <div class="pull-right clearfix">
                <ul class="info-menu list-inline list-unstyled">
                    <li class="profile">
                        <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
                            <img src="uploads/users/<?php echo $user['image']; ?>" alt="user-image"
                                 class="img-circle img-inline">
                            <span><?php echo remove_junk(ucfirst($user['name'])); ?> <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="profile.php?id=<?php echo (int)$user['id']; ?>">
                                    <i class="glyphicon glyphicon-user"></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="edit_account.php" title="edit account">
                                    <i class="glyphicon glyphicon-cog"></i>
                                    Settings
                                </a>
                            </li>
                            <li class="last">
                                <a href="logout.php">
                                    <i class="glyphicon glyphicon-off"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>

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
        </div>
    </nav>

    <script src="js/script_template.js"></script>


<?php endif; ?>


