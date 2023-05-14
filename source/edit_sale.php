<?php
$page_title = 'Edit sale';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(3);
?>
<?php
$sale = find_by_id('sales',(int)$_GET['id']);
if(!$sale){
    $session->msg("d","Missing product id.");
    redirect('sales.php');
}
?>
<?php $product = find_by_id('products',$sale['product_id']); ?>
<?php

if(isset($_POST['update_sale'])){
    $req_fields = array('title','quantity','price','total', 'date' );
    validate_fields($req_fields);
    if(empty($errors)){
        $p_id      = $db->escape((int)$product['id']);
        $s_qty     = $db->escape((int)$_POST['quantity']);
        $s_total   = $db->escape($_POST['total']);
        $date      = $db->escape($_POST['date']);
        $s_date    = date("Y-m-d", strtotime($date));

        $sql  = "UPDATE sales SET";
        $sql .= " product_id= '{$p_id}',qty={$s_qty},price='{$s_total}',date='{$s_date}'";
        $sql .= " WHERE id ='{$sale['id']}'";
        $result = $db->query($sql);
        if( $result && $db->affected_rows() === 1){
            update_product_qty($s_qty,$p_id);
            $session->msg('s',"Sale updated.");
            redirect('edit_sale.php?id='.$sale['id'], false);
        } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('sales.php', false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('edit_sale.php?id='.(int)$sale['id'],false);
    }
}

?>
<?php include_once('layouts/header.php'); ?>

<div class="title">
    <i class="uil uil-edit"></i>
    <span class="text">Edit Sale</span>
</div>

<?php echo display_msg($msg); ?>

<form method="post" action="edit_sale.php?id=<?php echo (int)$sale['id']; ?>" class="px-4 py-3 mb-8 bg-form rounded-lg shadow-md">

    <br>
    <input type="text" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="title" placeholder="Name(<?php echo remove_junk($product['name']); ?>)">
    <br>
    <br>
    <input type="text" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="quantity" placeholder="Quantity(<?php echo (int)$sale['qty']; ?>)">
    <br>
    <br>
    <input type="text" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="price" placeholder="Price per unit(<?php echo remove_junk($product['sale_price']); ?>)">
    <br>
    <br>
    <input type="text" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="total" placeholder="Total(<?php echo remove_junk($sale['price']); ?>)">
    <br>
    <br>
    <input type="text" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="date" placeholder="Date(<?php echo remove_junk($sale['date']); ?>)">
    <br>
    <br>
    <button type="submit" name="update_sale" class="bg-btn3 px-3 py-2 rescale rounded-lg focus:outline-none focus:shadow-outline-gray">
        <i class="uil uil-upload"></i>
        <span>Update sale</span>
    </button>

</form>

<?php include_once('layouts/footer.php'); ?>
