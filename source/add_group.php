<?php
$page_title = 'Add Group';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
if(isset($_POST['add'])){

    $req_fields = array('group-name','group-level');
    validate_fields($req_fields);

    if(find_by_groupName($_POST['group-name']) === false ){
        $session->msg('d','<b>Sorry!</b> Entered Group Name already in database!');
        redirect('add_group.php', false);
    }elseif(find_by_groupLevel($_POST['group-level']) === false) {
        $session->msg('d','<b>Sorry!</b> Entered Group Level already in database!');
        redirect('add_group.php', false);
    }
    if(empty($errors)){
        $name = remove_junk($db->escape($_POST['group-name']));
        $level = remove_junk($db->escape($_POST['group-level']));
        $status = remove_junk($db->escape($_POST['status']));

        $query  = "INSERT INTO user_groups (";
        $query .="group_name,group_level,group_status";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$level}','{$status}'";
        $query .=")";
        if($db->query($query)){
            //sucess
            $session->msg('s',"Group has been creted! ");
            redirect('add_group.php', false);
        } else {
            //failed
            $session->msg('d',' Sorry failed to create Group!');
            redirect('add_group.php', false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('add_group.php',false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>

    <div class="title">
        <i class="uil uil-plus-circle"></i>
        <span class="text">Add New Group</span>
    </div>
    <?php echo display_msg($msg); ?>
    <form method="post" action="add_group.php" class="px-4 py-3 mb-8 bg-form rounded-lg shadow-md">
        <br>
        <input type="name" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="group-name" placeholder="Group Name">
        <br>
        <br>
        <input type="number" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="group-level" placeholder="Group Level">
        <br>
            <select class="block w-100 mt-1 text-sm text-gray border-gray form-input" name="status">
                <option>Status</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        <br>
        <button type="submit" name="add" class="bg-btn3 px-3 py-2 rescale rounded-lg focus:outline-none focus:shadow-outline-gray">
            <i class="uil uil-upload"></i>
            <span>Update</span>
        </button>
    </form>

<?php include_once('layouts/footer.php'); ?>