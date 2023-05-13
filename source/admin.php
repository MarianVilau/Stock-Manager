<?php
$page_title = 'Admin Home Page';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
$c_categorie = count_by_id('categories');
$c_product = count_by_id('products');
$c_sale = count_by_id('sales');
$c_user = count_by_id('users');
$products_sold = find_higest_saleing_product('10');
$recent_products = find_recent_product_added('10');
$recent_sales = find_recent_sale_added('10');
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/x-icon" href="images/M&M_logo.png">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style_tabele.css">
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

    <div class="dash-content">
        <div class="overview">

            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">HIGHEST SELLING PRODUCTS</div>

                    <table class="min-w-0 whitespace-no-wrap overflow-hidden rounded-lg shadow-xs">
                        <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-header uppercase border-b dark:border-gray-700 bg-gray-50 alt-color">
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Total Sold</th>
                            <th class="px-4 py-3">Total Quantity</th>
                        </tr>
                        </thead>
                        <tbody class="back-color divide-y dark:divide-gray-700 alt-color">
                        <?php foreach ($products_sold as $product_sold): ?>
                            <tr class="text-gray text-gray">
                                <td class="px-4 py-3"><?php echo remove_junk(first_character($product_sold['name'])); ?></td>
                                <td class="px-4 py-3"><?php echo (int)$product_sold['totalSold']; ?></td>
                                <td class="px-4 py-3"><?php echo (int)$product_sold['totalQty']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br>
                    <button type="submit" name="see_all"
                            class=" bg-btn3 pull-right px-3 py-2 rescale2 rounded-lg focus:outline-none focus:shadow-outline-gray">
                        <i class="uil uil-eye"></i>
                        <a href="product.php">See All</a>
                    </button>
                </div>

                <div class="top-sales box">
                    <div class="title">RECENTLY ADDED PRODUCTS</div>
                    <ul class="top-sales-details">
                        <?php foreach ($recent_products as $recent_product): ?>
                            <li>
                                <?php if ($recent_product['media_id'] === '0'): ?>
                                    <img src="uploads/products/no_image.png" width="40px" height="40px" alt="">
                                <?php else: ?>
                                    <img src="uploads/products/no_image.png/<?php echo $recent_product['image']; ?>"
                                         width="40px" height="40px" alt="">
                                <?php endif; ?>
                                <span class="product"><?php echo remove_junk(first_character($recent_product['name'])); ?></span>
                                <span class="price">RON <?php echo (int)$recent_product['sale_price']; ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>


<?php require_once('layouts/footer.php') ?>