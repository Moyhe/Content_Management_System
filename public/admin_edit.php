<?php
session_start();

include_once '../includes/session.php';
include_once '../includes/connectiondb.php';
include_once '../includes/Func.php';
login_check();
if (isset($_POST['submit'])) {
    
  
    $id = $_SESSION['id'];
    $id1 = (int)$id;
    $userName = mysqli_real_escape_string($conn, check_length(checkEmpty(check_input_admin($_POST['userName'])), 30, 4));
    $firstName = mysqli_real_escape_string($conn, check_length(checkEmpty(check_input_admin($_POST['firstName'])), 30, 4));
    $lastName = mysqli_real_escape_string($conn, check_length(checkEmpty(check_input_admin($_POST['lastName'])), 30, 4));
    $email = mysqli_real_escape_string($conn, check_length(checkEmpty(check_input_admin($_POST['email'])), 30, 4));
    $password = mysqli_real_escape_string($conn, checkEmpty(check_input_admin($_POST['password'])));
    $password1 = password_hash($password, PASSWORD_BCRYPT);

    if (!empty($errors)) {
        $_SESSION['errors'] =  $errors;
      header('Location: admins_manage.php');
      exit();
     }

    $sql = "UPDATE `admins` SET
`user_name`='$userName',`first_name`='$firstName',`Last_name`='$lastName',`email`='$email',`password`='$password1' WHERE `id`=$id1";

if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn) > 0 ) {

    $_SESSION['msg'] =  update_success_msg_admin();
    header('Location:admins_manage.php');
    exit();
}else {
    
    $_SESSION['msg'] =  update_fail_msg_admin();
    header('Location: admins_manage.php');
    exit();

}

} else {

    header('Location: admins_manage.php');
    exit();
}

?>