<?php
$page_title = 'My profile';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(3);
?>
<?php
$user_id = (int)$_GET['id'];
if(empty($user_id)):
    redirect('home.php',false);
else:
    $user_p = find_by_id('users',$user_id);
endif;
?>
<?php include_once('layouts/header.php'); ?>
<div class="sales-boxes">

