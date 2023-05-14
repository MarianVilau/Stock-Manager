<?php
  $page_title = 'Add Sale';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
if(isset($_POST['add_sale'])){
    $req_fields = array('s_id','quantity','price','total', 'date' );
    validate_fields($req_fields);
    if(empty($errors)){
        $p_id      = $db->escape((int)$_POST['s_id']);
        $s_qty     = $db->escape((int)$_POST['quantity']);
        $s_total   = $db->escape($_POST['total']);
        $date      = $db->escape($_POST['date']);
        $s_date    = make_date();

        $sql  = "INSERT INTO sales (";
        $sql .= " product_id,qty,price,date";
        $sql .= ") VALUES (";
        $sql .= "'{$p_id}','{$s_qty}','{$s_total}','{$s_date}'";
        $sql .= ")";

        if($db->query($sql)){
            update_product_qty($s_qty,$p_id);
            $session->msg('s',"Sale added. ");
            redirect('add_sale.php', false);
        } else {
            $session->msg('d',' Sorry failed to add!');
            redirect('add_sale.php', false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('add_sale.php',false);
    }
}

?>
<?php include_once('layouts/header.php'); ?>


    <div class="title">
        <i class="uil uil-plus-circle"></i>
        <span class="text">Add New Sale</span>
    </div>

<?php echo display_msg($msg); ?>

    <form method="post" action="add_sale.php" class="px-4 py-3 mb-8 bg-form rounded-lg shadow-md">

        <br>
        <input type="text" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="s_id" placeholder="Product ID">
        <br>
        <br>
        <input type="text" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="quantity" placeholder="Quantity">
        <br>
        <br>
        <input type="text" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="price" placeholder="Price per unit">
        <br>
        <br>
        <input type="text" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="total" placeholder="Total">
        <br>
        <br>
        <input type="text" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="date" placeholder="Date(dd-mm-yyyy)">
        <br>
        <br>
        <button type="submit" name="add_sale" class="bg-btn3 px-3 py-2 rescale rounded-lg focus:outline-none focus:shadow-outline-gray">
            <i class="uil uil-plus"></i>
            <span>Add Sale</span>
        </button>

    </form>

<?php include_once('layouts/footer.php'); ?>