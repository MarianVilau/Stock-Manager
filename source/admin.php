<?php
require_once("includes/load.php");
//$user = current_user();
//page_require_level(1);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/x-icon" href="images/M&M_logo.png">
        <link rel="stylesheet" href="css/main.css">
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
                    <span class="number">50,120</span>
                </div>
                <div class="box box2">
                    <i class="uil uil-list-ul"></i>
                    <span class="text">Categories</span>
                    <span class="number">20,120</span>
                </div>
                <div class="box box3">
                    <i class="uil uil-apps"></i>
                    <span class="text">Products</span>
                    <span class="number">10,120</span>
                </div>
                <div class="box box4">
                    <i class="uil uil-dollar-sign-alt"></i>
                    <span class="text">Sales</span>
                    <span class="number">10,120</span>
                </div>
            </div>
        </div>
    </div>

    <div class="dash-content">
        <div class="overview">
            <div class="title">

                <span class="text"> </span>
            </div>

            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">HIGHEST SELLING PRODUCTS</div>
                    <div class="sales-details">
                        <ul class="details">
                            <li class="topic">Date</li>
                            <li><a href="#">02 Jan 2021</a></li>
                            <li><a href="#">02 Jan 2021</a></li>
                            <li><a href="#">02 Jan 2021</a></li>
                            <li><a href="#">02 Jan 2021</a></li>
                            <li><a href="#">02 Jan 2021</a></li>
                            <li><a href="#">02 Jan 2021</a></li>
                            <li><a href="#">02 Jan 2021</a></li>
                        </ul>
                        <ul class="details">
                            <li class="topic">Customer</li>
                            <li><a href="#">Alex Doe</a></li>
                            <li><a href="#">David Mart</a></li>
                            <li><a href="#">Roe Parter</a></li>
                            <li><a href="#">Diana Penty</a></li>
                            <li><a href="#">Martin Paw</a></li>
                            <li><a href="#">Doe Alex</a></li>
                            <li><a href="#">Aiana Lexa</a></li>
                            <li><a href="#">Rexel Mags</a></li>
                            <li><a href="#">Tiana Loths</a></li>
                        </ul>
                        <ul class="details">
                            <li class="topic">Sales</li>
                            <li><a href="#">Delivered</a></li>
                            <li><a href="#">Pending</a></li>
                            <li><a href="#">Returned</a></li>
                            <li><a href="#">Delivered</a></li>
                            <li><a href="#">Pending</a></li>
                            <li><a href="#">Returned</a></li>
                            <li><a href="#">Delivered</a></li>
                            <li><a href="#">Pending</a></li>
                            <li><a href="#">Delivered</a></li>
                        </ul>
                        <ul class="details">
                            <li class="topic">Total</li>
                            <li><a href="#">$204.98</a></li>
                            <li><a href="#">$24.55</a></li>
                            <li><a href="#">$25.88</a></li>
                            <li><a href="#">$170.66</a></li>
                            <li><a href="#">$56.56</a></li>
                            <li><a href="#">$44.95</a></li>
                            <li><a href="#">$67.33</a></li>
                            <li><a href="#">$23.53</a></li>
                            <li><a href="#">$46.52</a></li>
                        </ul>
                    </div>
                    <div class="button">
                        <a href="#">See All</a>
                    </div>
                </div>

                <div class="top-sales box">
                    <div class="title">TRECENTLY ADDED PRODUCTS</div>
                    <ul class="top-sales-details">
                        <li>
                            <a href="#">
                                <img src="images/sunglasses.jpg" alt="">
                                <span class="product">Vuitton Sunglasses</span>
                            </a>
                            <span class="price">$1107</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/jeans.jpg" alt="">
                                <span class="product">Hourglass Jeans </span>
                            </a>
                            <span class="price">$1567</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/nike.jpg" alt="">
                                <span class="product">Nike Sport Shoe</span>
                            </a>
                            <span class="price">$1234</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/scarves.jpg" alt="">
                                <span class="product">Hermes Silk Scarves.</span>
                            </a>
                            <span class="price">$2312</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/blueBag.jpg" alt="">
                                <span class="product">Succi Ladies Bag</span>
                            </a>
                            <span class="price">$1456</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/bag.jpg" alt="">
                                <span class="product">Gucci Womens's Bags</span>
                            </a>
                            <span class="price">$2345</span>
                        <li>
                            <a href="#">
                                <img src="images/addidas.jpg" alt="">
                                <span class="product">Addidas Running Shoe</span>
                            </a>
                            <span class="price">$2345</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/shirt.jpg" alt="">
                                <span class="product">Bilack Wear's Shirt</span>
                            </a>
                            <span class="price">$1245</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <script src="script.js"></script>
    </div>


<?php require_once('layouts/footer.php') ?>