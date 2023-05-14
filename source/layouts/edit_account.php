<?php
$page_title = 'Edit Account';
require_once('includes/load.php');
page_require_level(3);
?>
<?php
//update user image
if(isset($_POST['submit'])) {
    $photo = new Media();
    $user_id = (int)$_POST['user_id'];
    $photo->upload($_FILES['file_upload']);
    if($photo->process_user($user_id)){
        $session->msg('s','photo has been uploaded.');
        redirect('edit_account.php');
    } else{
        $session->msg('d',join($photo->errors));
        redirect('edit_account.php');
    }
}
?>
<?php
//update user other info
if(isset($_POST['update'])){
    $req_fields = array('name','username' );
    validate_fields($req_fields);
    if(empty($errors)){
        $id = (int)$_SESSION['user_id'];
        $name = remove_junk($db->escape($_POST['name']));
        $username = remove_junk($db->escape($_POST['username']));
        $sql = "UPDATE users SET name ='{$name}', username ='{$username}' WHERE id='{$id}'";
        $result = $db->query($sql);
        if($result && $db->affected_rows() === 1){
            $session->msg('s',"Acount updated ");
            redirect('edit_account.php', false);
        } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('edit_account.php', false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('edit_account.php',false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>



<?php include_once('layouts/footer.php'); ?>
