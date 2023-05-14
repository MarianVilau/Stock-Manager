<?php
  $page_title = 'Edit product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$product = find_by_id('products',(int)$_GET['id']);
$all_categories = find_all('categories');
$all_photo = find_all('media');
if(!$product){
  $session->msg("d","Missing product id.");
  redirect('product.php');
}
?>
<?php
 if(isset($_POST['product'])){
    $req_fields = array('product-title','product-categorie','product-quantity','buying-price', 'saleing-price' );
    validate_fields($req_fields);

   if(empty($errors)){
       $p_name  = remove_junk($db->escape($_POST['product-title']));
       $p_cat   = (int)$_POST['product-categorie'];
       $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
       $p_buy   = remove_junk($db->escape($_POST['buying-price']));
       $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
       if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
         $media_id = '0';
       } else {
         $media_id = remove_junk($db->escape($_POST['product-photo']));
       }
       $query   = "UPDATE products SET";
       $query  .=" name ='{$p_name}', quantity ='{$p_qty}',";
       $query  .=" buy_price ='{$p_buy}', sale_price ='{$p_sale}', categorie_id ='{$p_cat}',media_id='{$media_id}'";
       $query  .=" WHERE id ='{$product['id']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Product updated ");
                 redirect('product.php', false);
               } else {
                 $session->msg('d',' Sorry failed to updated!');
                 redirect('edit_product.php?id='.$product['id'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('edit_product.php?id='.$product['id'], false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>

<div class="title">
    <i class="uil uil-edit"></i>
    <span class="text">Edit Product</span>
</div>

    <?php echo display_msg($msg); ?>

<form method="post" action="edit_product.php?id=<?php echo (int)$product['id'] ?>" class="px-4 py-3 mb-8 bg-form rounded-lg shadow-md">

    <br>
    <input type="text" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="product-title" placeholder="Product Title(<?php echo remove_junk($product['name']);?>)">

    <br>
    <div class="more-align">
        <select class="block w-50 mt-1 text-sm text-gray border-gray form-input" name="product-categorie">
            <option value="">Select Product Category</option>
            <?php  foreach ($all_categories as $cat): ?>
                     <option value="<?php echo (int)$cat['id']; ?>" <?php if($product['categorie_id'] === $cat['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($cat['name']); ?>
            </option>
            <?php endforeach; ?>
        </select>


        <select class="block w-50 mt-1 text-sm text-gray border-gray form-input" name="product-photo">
            <option value="">Select Product Photo</option>
            <?php  foreach ($all_photo as $photo): ?>
                <option value="<?php echo (int)$photo['id'];?>" <?php if($product['media_id'] === $photo['id']): echo "selected"; endif; ?> >
                    <?php echo $photo['file_name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <br>
    <div class="more-align">
        <input type="text" class="block w-30 mt-1 text-sm border-gray text-gray form-input" name="product-quantity" placeholder="Product Quantity(<?php echo remove_junk($product['quantity']); ?>)">
        <input type="text" class="block w-30 mt-1 text-sm border-gray text-gray form-input" name="buying-price" placeholder="Buying Price(<?php echo remove_junk($product['buy_price']);?>)">
        <input type="text" class="block w-30 mt-1 text-sm border-gray text-gray form-input" name="saleing-price" placeholder="Selling Price(<?php echo remove_junk($product['sale_price']);?>)">
    </div>

    <br>
    <button type="submit" name="product" class="bg-btn3 px-3 py-2 rescale rounded-lg focus:outline-none focus:shadow-outline-gray">
        <i class="uil uil-upload"></i>
        <span>Update</span>
    </button>

</form>

<?php include_once('layouts/footer.php'); ?>
