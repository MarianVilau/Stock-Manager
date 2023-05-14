<?php
$page_title = 'Edit User';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
$e_user = find_by_id('users',(int)$_GET['id']);
$groups  = find_all('user_groups');
if(!$e_user){
    $session->msg("d","Missing user id.");
    redirect('users.php');
}
?>

<?php
//Update User basic info
if(isset($_POST['update'])) {
    $req_fields = array('name','username','level');
    validate_fields($req_fields);
    if(empty($errors)){
        $id = (int)$e_user['id'];
        $name = remove_junk($db->escape($_POST['name']));
        $username = remove_junk($db->escape($_POST['username']));
        $level = (int)$db->escape($_POST['level']);
        $status   = remove_junk($db->escape($_POST['status']));
        $sql = "UPDATE users SET name ='{$name}', username ='{$username}',user_level='{$level}',status='{$status}' WHERE id='{$db->escape($id)}'";
        $result = $db->query($sql);
        if($result && $db->affected_rows() === 1){
            $session->msg('s',"Acount Updated ");
            redirect('edit_user.php?id='.(int)$e_user['id'], false);
        } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('edit_user.php?id='.(int)$e_user['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('edit_user.php?id='.(int)$e_user['id'],false);
    }
}
?>
<?php
// Update user password
if(isset($_POST['update-pass'])) {
    $req_fields = array('password');
    validate_fields($req_fields);
    if(empty($errors)){
        $id = (int)$e_user['id'];
        $password = remove_junk($db->escape($_POST['password']));
        $h_pass   = sha1($password);
        $sql = "UPDATE users SET password='{$h_pass}' WHERE id='{$db->escape($id)}'";
        $result = $db->query($sql);
        if($result && $db->affected_rows() === 1){
            $session->msg('s',"User password has been updated ");
            redirect('edit_user.php?id='.(int)$e_user['id'], false);
        } else {
            $session->msg('d',' Sorry failed to updated user password!');
            redirect('edit_user.php?id='.(int)$e_user['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('edit_user.php?id='.(int)$e_user['id'],false);
    }
}

?>
<?php include_once('layouts/header.php'); ?>

    <div class="title">
        <i class="uil uil-key-skeleton"></i>
        <span class="text">Change <?php echo remove_junk(ucwords($e_user['name'])); ?> password</span>
    </div>
<?php echo display_msg($msg); ?>
    <form method="post" action="edit_user.php?id=<?php echo (int)$e_user['id'];?>" class="px-4 py-3 mb-8 bg-form rounded-lg shadow-md">

        <label class="text-color">Password</label>
        <input type="password" class="block w-90 mt-1 text-sm border-gray text-gray form-input" name="password" placeholder="Type user new password">

        <button type="submit" name="update-pass" class="bg-btn3 pull-right px-3 py-2 rescale rounded-lg focus:outline-none focus:shadow-outline-gray">
            <i class="uil uil-exchange"></i>
            <span>Change</span>
        </button>

    </form>

    <div class="title">
        <i class="uil uil-plus-circle"></i>
        <span class="text">Update <?php echo remove_junk(ucwords($e_user['name'])); ?> Account</span>
    </div>
<?php echo display_msg($msg); ?>
    <form method="post" action="add_user.php" class="px-4 py-3 mb-8 bg-form rounded-lg shadow-md">

        <br>
        <input type="text" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="name" placeholder="Name(<?php echo remove_junk(ucwords($e_user['name'])); ?>)">
        <br>
        <br>
        <input type="text" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="username" placeholder="User Name(<?php echo remove_junk(ucwords($e_user['username'])); ?>)">
        <br>
        <br>
        <select class="block w-100 mt-1 text-sm text-gray border-gray form-input">
            <option>User Role</option>
            <?php foreach ($groups as $group ):?>
                <option <?php if($group['group_level'] === $e_user['user_level']) echo 'selected="selected"';?> value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_name']);?></option>
            <?php endforeach;?>
        </select>
        <br>
        <br>
        <select class="block w-100 mt-1 text-sm text-gray border-gray form-input">
            <option>Status</option>
            <option <?php if($e_user['status'] === '1') echo 'selected="selected"';?>value="1">Active</option>
            <option <?php if($e_user['status'] === '0') echo 'selected="selected"';?> value="0">Inactive</option>
        </select>
        <br>
        <br>
        <button type="submit" name="update" class="bg-btn3 px-3 py-2 rescale rounded-lg focus:outline-none focus:shadow-outline-gray">
            <i class="uil uil-upload"></i>
            <span>Update</span>
        </button>


    </form>

<?php include_once('layouts/footer.php'); ?>