<?php
session_start();

include_once '../includes/session.php';
include_once '../includes/connectiondb.php';
include_once '../includes/Func.php';
login_check();
if (isset($_POST['submit'])) {
    
  
    $menu = check_length(checkEmpty(check_input($_POST['menu'])), 12, 4);
    $optradio = (int) $_POST['radio'];
    $rank = (int) $_POST['rank'];
    $menu2 = mysqli_real_escape_string($conn, $menu);

    if (!empty($errors)) {
        $_SESSION['errors'] =  $errors;
      header('Location: create_menu.php');
      exit();
     }

    $sql = "INSERT INTO `website_navbar`(`item_name`, `rank`, `visible`) 
    VALUES ( '{$menu2}', '{$rank}', '{$optradio}')";

if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn) > 0 ) {

    $_SESSION['msg'] =  success_msg_menu();
    header('Location:manageContent.php');
    exit();
}

} else {

    $_SESSION['msg'] =  error_msg_menu($conn);
    header('Location: create_menu.php');
    exit();
}

?>