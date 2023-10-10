<?php
session_start();

include_once '../includes/session.php';
include_once '../includes/connectiondb.php';
include_once '../includes/Func.php';
login_check();

    $id_page = mysqli_real_escape_string($conn , $_GET["page"]);
    $id = (int) $id_page;

    if (!empty($errors)) {
        $_SESSION['errors'] =  $errors;
        header('Location: delete_page.php');
      exit();
     }

     $sql1 = "DELETE FROM `pages` WHERE id = {$id} LIMIT 1";
     $result1 = mysqli_query($conn, $sql1);
     if ($result1 && mysqli_affected_rows($conn) > 0 ) 
     {
        $_SESSION['msg'] =  success_delete_msg_menu();
        header('Location:manageContent.php');
        exit();
     }else {
        $_SESSION['msg'] =  fail_delete_msg_menu($conn);
       header('Location:delete_page.php');
        exit();
     }

 


?>