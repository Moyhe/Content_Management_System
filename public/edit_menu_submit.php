<?php

session_start();

include_once '../includes/session.php';
include_once '../includes/connectiondb.php';
include_once '../includes/Func.php';
login_check();
if (isset($_POST['submit'])) {
    
    $id = $_SESSION['id'];
    $id1 = (int) $id; 
    $menu = check_length(checkEmpty(check_input($_POST['menu'])), 12, 4);
    $optradio = (int) $_POST['radio'];
    $rank = (int) $_POST['rank'];
    $menu2 = mysqli_real_escape_string($conn, $menu);

    if (!empty($errors)) {
        $_SESSION['errors'] =  $errors;
      header('Location: edit_menu.php');
      exit();
     }

    $sql = "UPDATE `website_navbar` SET
    `item_name`='{$menu2}',`rank`='{$rank}',`visible`='{$optradio}' WHERE id = $id1";

if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn) > 0 ) {

    $_SESSION['msg'] =  success_update_msg_menu();
    header('Location:manageContent.php');
    exit();
}else {

    $_SESSION['msg'] =  fail_update_msg_menu($conn);
    header('Location:edit_menu.php');
    exit();
}

}else {

    header('Location: edit_menu.php');
    exit();
}




?>