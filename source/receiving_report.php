<?php
$page_title = 'Receiving Report';
require_once('includes/load.php');
page_require_level(3);
?>

<?php include_once('layouts/header.php'); ?>

<div class="title">
    <i class="uil uil-calendar-alt"></i>
    <span class="text">Date Range</span>
</div>

<form class="px-4 py-3 mb-8 bg-form rounded-lg shadow-md" method="post" action="receiving_report_process.php">
    <input type="text" class="block w-30 mt-1 text-sm border-gray text-gray form-input" name="start-date" placeholder="From">
    <input type="text" class="block w-30 mt-1 text-sm border-gray text-gray form-input" name="end-date" placeholder="To">

    <button type="submit" name="submit" class="bg-btn3 pull-right px-3 py-2 rescale rounded-lg focus:outline-none focus:shadow-outline-gray">
        <i class="uil uil-file-medical-alt"></i>
        <span>Generate Report</span>
    </button>
</form>





<?php include_once ('layouts/footer.php'); ?>
