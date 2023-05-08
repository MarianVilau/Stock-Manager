<?php
require_once("includes/load.php");
$user = current_user();
page_require_level(1);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/x-icon" href="images/M&M_logo.png">
        <link rel="stylesheet" href='css/style_template.css'>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <title>M&M Store</title>
    </head>
<body>
<?php require_once('layouts/header.php') ?>

    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-dashboard"></i>
                <span class="text">Dashboard</span>
            </div>

            <div class="boxes">
                <a href="users.php">
                    <div class="box box1">
                        <i class="uil uil-user"></i>
                        <span class="text">Users</span>
                        <span class="number">50,120</span>
                    </div>
                </a>
                <a href="categorie.php">
                    <div class="box box2">
                        <i class="uil uil-list-ul"></i>
                        <span class="text">Categories</span>
                        <span class="number">20,120</span>
                    </div>
                </a>
                <a href="product.php">
                    <div class="box box3">
                        <i class="uil uil-apps"></i>
                        <span class="text">Products</span>
                        <span class="number">10,120</span>
                    </div>
                </a>

                <a href="sales.php">
                    <div class="box box4">
                        <i class="uil uil-dollar-sign-alt"></i>
                        <span class="text">Sales</span>
                        <span class="number">10,120</span>
                    </div>
                </a>
            </div>
        </div>
    </div>


<?php require_once('layouts/footer.php') ?>