<?php
$page_title = 'Edit Group';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
$e_group = find_by_id('user_groups',(int)$_GET['id']);
if(!$e_group){
    $session->msg("d","Missing Group id.");
    redirect('group.php');
}
?>
<?php
if(isset($_POST['update'])){

    $req_fields = array('group-name','group-level');
    validate_fields($req_fields);
    if(empty($errors)){
        $name = remove_junk($db->escape($_POST['group-name']));
        $level = remove_junk($db->escape($_POST['group-level']));
        $status = remove_junk($db->escape($_POST['status']));

        $query  = "UPDATE user_groups SET ";
        $query .= "group_name='{$name}',group_level='{$level}',group_status='{$status}'";
        $query .= "WHERE ID='{$db->escape($e_group['id'])}'";
        $result = $db->query($query);
        if($result && $db->affected_rows() === 1){
            //sucess
            $session->msg('s',"Group has been updated! ");
            redirect('edit_group.php?id='.(int)$e_group['id'], false);
        } else {
            //failed
            $session->msg('d',' Sorry failed to updated Group!');
            redirect('edit_group.php?id='.(int)$e_group['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('edit_group.php?id='.(int)$e_group['id'], false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>
    <div class="title">
        <i class="uil uil-plus-circle"></i>
        <span class="text">Edit Group</span>
    </div>
    <?php echo display_msg($msg); ?>
    <form method="post" action="edit_group.php?id=<?php echo (int)$e_group['id'];?>" class="px-4 py-3 mb-8 bg-form rounded-lg shadow-md">

        <br>
        <input type="name" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="group-name" placeholder="Group Name(<?php echo remove_junk(ucwords($e_group['group_name'])); ?>)">
        <br>
        <br>
        <input type="number" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="group-level" placeholder="Group Level(<?php echo (int)$e_group['group_level']; ?>)">
        <br>
        <select class="block w-100 mt-1 text-sm text-gray border-gray form-input" name="status">
            <option>Status</option>
            <option <?php if($e_group['group_status'] === '1') echo 'selected="selected"';?> value="1"> Active </option>
            <option <?php if($e_group['group_status'] === '0') echo 'selected="selected"';?> value="0">Inactive</option>
        </select>

        <br>
        <button type="submit" name="update" class="bg-btn3 px-3 py-2 rescale rounded-lg focus:outline-none focus:shadow-outline-gray">
            <i class="uil uil-upload"></i>
            <span>Update</span>
        </button>

    </form>

<?php include_once('layouts/footer.php'); ?>