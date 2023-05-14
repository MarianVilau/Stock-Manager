<?php
$page_title = 'Home Page';
require_once('includes/load.php');
if (!$session->isUserLoggedIn(true)) {
    redirect('index.php', false);
}

$c_categorie = count_by_id('categories');
$c_product = count_by_id('products');
$c_sale = count_by_id('sales');
$c_user = count_by_id('users');
?>
<?php include_once('layouts/header.php'); ?>

<br>
<div class="dash-content">
    <div class="title">
        <h1 class="text">Welcome User<br>Stock Management System
        <br>Browes around to find out the pages that you can access!</h1>
    </div>
</div>

<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-dashboard"></i>
            <span class="text">Dashboard</span>
        </div>

        <div class="boxes">
            <div class="box box1">
                <i class="uil uil-user"></i>
                <span class="text">Users</span>
                <span class="number"><?php echo $c_user['total']; ?></span>
            </div>
            <div class="box box2">
                <i class="uil uil-list-ul"></i>
                <span class="text">Categories</span>
                <span class="number"> <?php echo $c_categorie['total']; ?></span>
            </div>
            <div class="box box3">
                <i class="uil uil-apps"></i>
                <span class="text">Products</span>
                <span class="number"><?php echo $c_product['total']; ?></span>
            </div>
            <div class="box box4">
                <i class="uil uil-dollar-sign-alt"></i>
                <span class="text">Sales</span>
                <span class="number"><?php echo $c_sale['total']; ?></span>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>
