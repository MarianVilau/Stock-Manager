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



<?php require_once('layouts/footer.php') ?>