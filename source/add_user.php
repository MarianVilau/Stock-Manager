<?php
$page_title = 'Add User';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
$groups = find_all('user_groups');
?>
<?php
if(isset($_POST['add_user'])){

    $req_fields = array('full-name','username','password','level' );
    validate_fields($req_fields);

    if(empty($errors)){
        $name   = remove_junk($db->escape($_POST['full-name']));
        $username   = remove_junk($db->escape($_POST['username']));
        $password   = remove_junk($db->escape($_POST['password']));
        $user_level = (int)$db->escape($_POST['level']);
        $password = sha1($password);
        $query = "INSERT INTO users (";
        $query .="name,username,password,user_level,status";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$username}', '{$password}', '{$user_level}','1'";
        $query .=")";
        if($db->query($query)){
            //sucess
            $session->msg('s',"User account has been creted! ");
            redirect('add_user.php', false);
        } else {
            //failed
            $session->msg('d',' Sorry failed to create account!');
            redirect('add_user.php', false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('add_user.php',false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>


<div class="title">
    <i class="uil uil-plus-circle"></i>
    <span class="text">Add New User</span>
</div>
<?php echo display_msg($msg); ?>
<form method="post" action="add_user.php" class="px-4 py-3 mb-8 bg-form rounded-lg shadow-md">

    <br>
    <input type="text" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="full-name" placeholder="Full Name">
    <br>
    <br>
    <input type="text" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="username" placeholder="Username">
    <br>
    <br>
    <input type="password" class="block w-100 mt-1 text-sm border-gray text-gray form-input" name="password" placeholder="Password">
    <br>
    <br>
    <select class="block w-100 mt-1 text-sm text-gray border-gray form-input" name="level">
        <option>User Role</option>
        <?php foreach ($groups as $group ):?>
            <option value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_name']);?></option>
        <?php endforeach;?>
    </select>
    <br>
    <br>
    <button type="submit" name="add_user" class="bg-btn3 px-3 py-2 rescale rounded-lg focus:outline-none focus:shadow-outline-gray">
        <i class="uil uil-upload"></i>
        <span>Add User</span>
    </button>

</form>

<?php include_once('layouts/footer.php'); ?>
