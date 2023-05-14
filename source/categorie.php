<?php
$page_title = 'All categories';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);

$all_categories = find_all('categories')
?>
<?php
if(isset($_POST['add_cat'])){
    $req_field = array('categorie-name');
    validate_fields($req_field);
    $cat_name = remove_junk($db->escape($_POST['categorie-name']));
    if(empty($errors)){
        $sql  = "INSERT INTO categories (name)";
        $sql .= " VALUES ('{$cat_name}')";
        if($db->query($sql)){
            $session->msg("s", "Successfully Added New Category");
            redirect('categorie.php',false);
        } else {
            $session->msg("d", "Sorry Failed to insert.");
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
    <span class="text">Add New Category</span>
</div>

<?php echo display_msg($msg); ?>

<form method="post" action="categorie.php" class="px-4 py-3 mb-8 bg-form rounded-lg shadow-md">

    <span class="text-color">Category Name</span>
    <input type="text" class="block w-90 mt-1 text-sm border-gray text-gray form-input" name="categorie-name" placeholder="Category Name">

    <button type="submit" name="add_cat" class="bg-btn3 pull-right px-3 py-2 rescale rounded-lg focus:outline-none focus:shadow-outline-gray">
        <i class="uil uil-plus"></i>
        <a href="">Add Category</a>
    </button>
</form>

<div class="title">
    <i class="uil uil-list-ul"></i>
    <span class="text">All Categories</span>
</div>

<div class="min-w-0 overflow-hidden rounded-lg shadow-xs">
    <div class="min-w-0 overflow-x-auto">


        <table class="min-w-0 whitespace-no-wrap">
            <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-header uppercase border-b dark:border-gray-700 bg-gray-50 alt-color">
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Categories</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
            </thead>
            <tbody class="back-color divide-y dark:divide-gray-700 alt-color">
            <?php foreach ($all_categories as $cat):?>
            <tr class="text-gray text-gray">
                <td class="px-4 py-3"><?php echo count_id();?></td>

                <td class="px-4 py-3 text-sm">
                    <?php echo remove_junk(ucfirst($cat['name'])); ?>
                </td>

                <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                        <button
                            class="bg-btn1 flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg text-gray focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit"
                        >
                            <a href="edit_categorie.php?id=<?php echo (int)$cat['id'];?>">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                    ></path>
                                </svg>
                            </a>
                        </button>

                        <button
                            class="bg-btn2 flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg text-gray focus:outline-none focus:shadow-outline-gray"
                            aria-label="Delete"
                        >
                            <a href="delete_categorie.php?id=<?php echo (int)$cat['id'];?>">
                                <svg
                                    class="w-5 h-5"
                                    aria-hidden="true"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </a>
                        </button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>
