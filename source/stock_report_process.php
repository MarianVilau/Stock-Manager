<?php
$page_title = 'Stock Report';
$results = '';
require_once('includes/load.php');
page_require_level(3);
?>
<?php
if(isset($_POST['submit'])){
    $req_dates = array('start-date','end-date');
    validate_fields($req_dates);

    if(empty($errors)):
        $start_date   = remove_junk($db->escape($_POST['start-date']));
        $end_date     = remove_junk($db->escape($_POST['end-date']));
        $results      = find_product_by_dates($start_date,$end_date);
    else:
        $session->msg("d", $errors);
        redirect('stock_report.php', false);
    endif;

} else {
    $session->msg("d", "Select dates");
    redirect('stock_report.php', false);
}
?>
<!doctype html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link rel="stylesheet" href="css/style_reports.css">
    <link rel="stylesheet" href="css/style_tabele.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="icon" type="image/x-icon" href="images/M&M_logo.png">
    <title>Print Report</title>
</head>
<body>
<?php if($results): ?>
    <div class="page-break" id="my-section">
        <div class="sale-head">
            <h1>M&M Store - Stock Report</h1>
            <strong><?php if(isset($start_date)){ echo $start_date;}?> TILL DATE <?php if(isset($end_date)){echo $end_date;}?> </strong>
        </div>

        <button type="button" onclick="window.print()" class="bg-btn3 px-3 py-2 rescale rounded-lg focus:outline-none focus:shadow-outline-gray">
            <i class="uil uil-print"></i>
            <span>Print</span>
        </button>
        <br><br>

        <table class="table table-border">
            <thead>
            <tr>
                <th>#</th>
                <th>Product Title</th>
                <th>Categories</th>
                <th>In-Stock</th>
                <th>Buying Price</th>
                <th>Selling Price</th>
                <th>Product Added Date</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($results as $result): ?>
                <tr>
                    <td class="text-right"><?php echo count_id();?></td>
                    <td class="text-right"><?php echo remove_junk($result['name']);?></td>
                    <td class="text-right"><?php echo remove_junk($result['categorie']);?></td>
                    <td class="text-right"><?php echo remove_junk($result['quantity']);?></td>
                    <td class="text-right"><?php echo remove_junk($result['buy_price']);?></td>
                    <td class="text-right"><?php echo remove_junk($result['sale_price']);?></td>
                    <td class="text-right"><?php echo remove_junk($result['date']);?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

<?php
else:
    $session->msg("d", "Sorry no sales has been found. ");
    redirect('stock_report.php', false);
endif;
?>
</body>
</html>
<?php if(isset($db)) { $db->db_disconnect(); } ?>
