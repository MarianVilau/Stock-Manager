<?php
$page_title = 'Edit categorie';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
//Display all catgories.
$categorie = find_by_id('categories',(int)$_GET['id']);
if(!$categorie){
    $session->msg("d","Missing categorie id.");
    redirect('categorie.php');
}
?>

<?php
if(isset($_POST['edit_cat'])){
    $req_field = array('categorie-name');
    validate_fields($req_field);
    $cat_name = remove_junk($db->escape($_POST['categorie-name']));
    if(empty($errors)){
        $sql = "UPDATE categories SET name='{$cat_name}'";
        $sql .= " WHERE id='{$categorie['id']}'";
        $result = $db->query($sql);
        if($result && $db->affected_rows() === 1) {
            $session->msg("s", "Successfully updated Categorie");
            redirect('categorie.php',false);
        } else {
            $session->msg("d", "Sorry! Failed to Update");
            redirect('categorie.php',false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('categorie.php',false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>

    <div class="title">
        <i class="uil uil-plus-circle"></i>
        <span class="text">Editing <?php echo remove_junk(ucfirst($categorie['name']));?></span>
    </div>

<?php echo display_msg($msg); ?>

    <form method="post" action="edit_categorie.php?id=<?php echo (int)$categorie['id'];?>" class="px-4 py-3 mb-8 bg-form rounded-lg shadow-md">

        <input type="text" class="block w-90 mt-1 text-sm border-gray text-gray form-input" name="categorie-name" placeholder="<?php echo remove_junk(ucfirst($categorie['name']));?>">

        <button type="submit" name="edit_cat" class="bg-btn3 pull-right px-3 py-2 rescale rounded-lg focus:outline-none focus:shadow-outline-gray">
            <i class="uil uil-upload"></i>
            <a href="">Update Categorie</a>
        </button>
    </form>

<?php include_once('layouts/footer.php'); ?>