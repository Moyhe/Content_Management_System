<?php session_start(); ?>
<?php 

include_once('../includes/session.php');
include_once('../includes/Func.php');
 


$_SESSION['admin_id'] = null;
$_SESSION['admin_username'] = null;

header('Location: login.php');
exit();

?>