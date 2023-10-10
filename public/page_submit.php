<?php
session_start();

include_once '../includes/session.php';
include_once '../includes/connectiondb.php';
include_once '../includes/Func.php';
login_check();
if (isset($_POST['submit'])) {
    
    $id = $_SESSION['id'];
    $id1 = (int) $id;
    $page = check_length(checkEmpty(check_input($_POST['page'])), 12, 4);
    $optradio = (int) $_POST['radio'];
    $sradio = (int) $_POST['sradio'];
    $rank = (int) $_POST['rank'];
    $content = $_POST['content'];
    $page2 = mysqli_real_escape_string($conn, $page);

    if (!empty($errors)) {
        $_SESSION['errors'] =  $errors;
      header('Location: create_page.php');
      exit();
     }

    $sql = "INSERT INTO `pages`(`item_name_id`, `page_name`, `content`, `rank`, `visible`, `status`) VALUES 
    ('$id1','$page2','$content','$rank','$optradio','$sradio')";

if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn) > 0 ) {

    $_SESSION['msg'] = success_msg_menu();
    header('Location: manageContent.php');
    exit();
}else {

    $_SESSION['msg'] =  error_msg_menu($conn);
    header('Location: create_page.php');
    exit();
}

} else {

    $_SESSION['msg'] =  error_msg_menu($conn);
    header('Location: create_page.php');
    exit();
}

?>