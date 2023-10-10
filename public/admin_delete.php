<?php
session_start();

include_once '../includes/session.php';
include_once '../includes/connectiondb.php';
include_once '../includes/Func.php';
login_check();

    $id_admin = mysqli_real_escape_string($conn , $_GET["admin"]);
    $id = (int) $id_admin;

    if (!empty($errors)) {
        $_SESSION['errors'] =  $errors;
        header('Location: admins_manage.php');
      exit();
     }

     $sql1 = "DELETE FROM `admins` WHERE id = {$id} LIMIT 1";
     $result1 = mysqli_query($conn, $sql1);
     if ($result1 && mysqli_affected_rows($conn) > 0 ) 
     {
        $_SESSION['msg'] =  success_delete_msg_admin();
        header('Location:admins_manage.php');
        exit();
     }else {
        $_SESSION['msg'] =  fail_delete_msg_admin();
       header('Location:admins_manage.php');
        exit();
     }

 


?>