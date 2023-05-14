<?php
$page_title = 'Add Product';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
$all_categories = find_all('categories');
$all_photo = find_all('media');
?>
<?php
if(isset($_POST['add_product'])){
    $req_fields = array('product-title','product-categorie','product-quantity','buying-price', 'saleing-price' );
    validate_fields($req_fields);
    if(empty($errors)){
        $p_name  = remove_junk($db->escape($_POST['product-title']));
        $p_cat   = remove_junk($db->escape($_POST['product-categorie']));
        $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
        $p_buy   = remove_junk($db->escape($_POST['buying-price']));
        $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
        if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
            $media_id = '0';
        } else {
            $media_id = remove_junk($db->escape($_POST['product-photo']));
        }
        $date    = make_date();
        $query  = "INSERT INTO products (";
        $query .=" name,quantity,buy_price,sale_price,categorie_id,media_id,date";
        $query .=") VALUES (";
        $query .=" '{$p_name}', '{$p_qty}', '{$p_buy}', '{$p_sale}', '{$p_cat}', '{$media_id}', '{$date}'";
        $query .=")";
        $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
        if($db->query($query)){
            $session->msg('s',"Product added ");
            redirect('add_product.php', false);
        } else {
            $session->msg('d',' Sorry failed to added!');
            redirect('product.php', false);
        }

    } else{
        $session->msg("d", $errors);
        redirect('add_product.php',false);
    }

}

?>
<?php include_once('layouts/header.php'); ?>

<div class="title">
    <i class="uil uil-plus-circle"></i>
    <span class="text">Add New Product</span>
</div>
<?php echo display_msg($msg); ?>
<form method="post" action="add_product.php" class="px-4 py-3 mb-8 bg-form rounded-lg shadow-md">

    <br>
    <input type="text" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="product-title" placeholder="Product Title">

    <br>
    <div class="more-align">
        <select class="block w-50 mt-1 text-sm text-gray border-gray form-input" name="product-categorie">
            <option value="">Select Product Category</option>
            <?php  foreach ($all_categories as $cat): ?>
                <option value="<?php echo (int)$cat['id'] ?>">
                    <?php echo $cat['name'] ?></option>
            <?php endforeach; ?>
        </select>


        <select class="block w-50 mt-1 text-sm text-gray border-gray form-input" name="product-photo">
            <option value="">Select Product Photo</option>
            <?php  foreach ($all_photo as $photo): ?>
                <option value="<?php echo (int)$photo['id'] ?>">
                    <?php echo $photo['file_name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <br>
    <div class="more-align">
        <input type="text" class="block w-30 mt-1 text-sm border-gray text-gray form-input" name="product-quantity" placeholder="Product Quantity">
        <input type="text" class="block w-30 mt-1 text-sm border-gray text-gray form-input" name="buying-price" placeholder="Buying Price">
        <input type="text" class="block w-30 mt-1 text-sm border-gray text-gray form-input" name="saleing-price" placeholder="Selling Price">
    </div>

    <br>
    <button type="submit" name="add_product" class="bg-btn3 px-3 py-2 rescale rounded-lg focus:outline-none focus:shadow-outline-gray">
        <i class="uil uil-plus"></i>
        <span>Add Product</span>
    </button>

</form>

<?php include_once('layouts/footer.php'); ?>