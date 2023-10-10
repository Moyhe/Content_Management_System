<?php
session_start();
include_once '../includes/session.php';
include_once '../includes/connectiondb.php';
include_once '../includes/Func.php';


if (empty($errors)) {

    if (isset($_POST["submit"])) {
        
        $userName =  htmlentities($_POST["userName"]) ;
        $password =  htmlentities($_POST["password"] ) ;
     
        $userName1 =  mysqli_real_escape_string($conn , $userName) ;
        $password1 =  mysqli_real_escape_string($conn , $password) ;
        
         
        $sql = "SELECT  `id`, `user_name`,`password`  FROM `admins` WHERE `user_name`= '{$userName1}'  LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($result && mysqli_affected_rows($conn)>0) {
            
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['userName'] = $row['user_name'];
            
         
        if (password_verify($password1, $row['password'])) {
            
             
            $_SESSION['msg']=login_success_msg();
             header('Location: admin.php');
             exit();
        }else {
              $_SESSION['msg']=login_fail_msg();
              header('Location: login.php');
              exit();
             }
         
           
         } 
    else {
              $_SESSION['msg']=login_fail_msg();
              header('Location: login.php');
              exit();
             }
    
    }else{
        header('Location: login.php');
        exit();
    }
    }


?>