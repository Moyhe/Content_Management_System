<?php
session_start();

include_once '../includes/session.php';
include_once '../includes/connectiondb.php';
include_once '../includes/Func.php';
login_check();
    $id = $_SESSION['id'];
    $id_menu = (int) $id;   
    $sql = "SELECT * FROM `pages` WHERE `pages`.`item_name_id`=".$id_menu;
    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)  > 0 ) {

    $_SESSION['msg'] =  fail_delete_msg_menu($conn);
    header('Location:delete_menu.php');
    exit();
}else {


    $id1 = (int) $id_menu;
    if (!empty($errors)) {
        $_SESSION['errors'] =  $errors;
        header('Location: delete_menu.php');
      exit();
     }

     $sql1 = "DELETE FROM `website_navbar` WHERE id = {$id1} LIMIT 1";
     $result1 = mysqli_query($conn, $sql1);
     if ($result1 && mysqli_affected_rows($conn) > 0 ) 
     {
        $_SESSION['msg'] =  success_delete_msg_menu();
        header('Location:manageContent.php');
        exit();
     }else {
        $_SESSION['msg'] =  fail_delete_msg_menu($conn);
       header('Location:delete_menu.php');
        exit();
     }

 
}

?>