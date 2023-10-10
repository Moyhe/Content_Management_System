<?php 

function login_check() {
	if (!isset($_SESSION['admin_id'])) {
        header('Location: login.php');
        exit();
	}

}


function login_success_msg() {
		
		
    $msg   =  " <div class='alert alert-success' role='alert'>";
    $msg  .= "Success". "<br>" ;
    $msg  .= "<strong>welcome!</strong>" . $_SESSION['userName'] . "!";
    $msg  .= "</div>";


return $msg;


}
function login_fail_msg() {

    $msg   =  "<div class='alert alert-danger' role='alert'>";
    $msg  .= "Failed". "<br>" ;
    $msg  .= "<strong>please check your userName or password!</strong>";
    $msg  .= "</div>";


return $msg;

}








function error_msg_menu($conn) {

    $msg   =  " <div class='alert alert-success' role='alert'>";
    $msg  .= " New Record Added Successfully" . mysqli_error($conn);
    $msg  .= "<strong>Failed!</strong>";
    $msg  .= "</div>";


return $msg;
}

function fail_update_msg_menu($conn) {

    $msg   =  " <div class='alert alert-danger' role='alert'>";
    $msg  .= " Failed to update the record" . mysqli_error($conn);
    $msg  .= "<strong>Failed!</strong>";
    $msg  .= "</div>";


return $msg;
}


function fail_delete_msg_menu($conn) {

    $msg   =  " <div class='alert alert-danger' role='alert'>";
    $msg  .= " Failed to delete the record" . mysqli_error($conn);
    $msg  .= "<strong>Failed!</strong>";
    $msg  .= "</div>";


return $msg;
}



function success_msg_menu() {

$msg   =  " <div class='alert alert-success' role='alert'>";
$msg  .= " New Record Added Successfully";
$msg  .= "<strong>Success!</strong>";
$msg  .= "</div>";

return $msg;
}



function success_update_msg_menu() {

    $msg   =  " <div class='alert alert-success' role='alert'>";
    $msg  .= "Record updated Successfully";
    $msg  .= "<strong>Success!</strong>";
    $msg  .= "</div>";
    
    return $msg;
    }

    function success_delete_msg_menu() {

        $msg   =  " <div class='alert alert-success' role='alert'>";
        $msg  .= "Record Deleted Successfully";
        $msg  .= "<strong>Sorry!</strong>";
        $msg  .= "</div>";
        
        return $msg;
        }

        		
function success_msg_admin() {
			 
		
    $msg   =  " <div class='alert alert-success' role='alert'>";
    $msg  .= " Admin created successfully!!";
    $msg  .= "<strong>Success!</strong>";
    $msg  .= "</div>";

    return $msg;


}
function fail_msg_admin() {
 
    $msg   =  " <div class='alert alert-danger' role='alert'>";
    $msg  .= " You Can't create admin";
    $msg  .= "<strong>Failed!</strong>";
    $msg  .= "</div>";

    return $msg;


}


function success_delete_msg_admin() {


    $msg   =  " <div class='alert alert-success' role='alert'>";
    $msg  .= " Admin deleted successfully!!";
    $msg  .= "<strong>Success!</strong>";
    $msg  .= "</div>";

    return $msg;


}
function fail_delete_msg_admin() {
        

    $msg   =  " <div class='alert alert-danger' role='alert'>";
    $msg  .= " You can not delete this admin";
    $msg  .= "<strong>Failed!</strong>";
    $msg  .= "</div>";

    return $msg;


}

function check_input_admin($data)
		{
			$data = str_replace("_"," ",$data);
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			 
			return $data;
		}


function update_success_msg_admin() {


    $msg   =  " <div class='alert alert-success' role='alert'>";
    $msg  .= " Admin updated successfully!!";
    $msg  .= "<strong>Success!</strong>";
    $msg  .= "</div>";

    return $msg;



}
function update_fail_msg_admin() {
        

    $msg   =  " <div class='alert alert-danger' role='alert'>";
    $msg  .= "You Can not update this admin";
    $msg  .= "<strong>Failed!</strong>";
    $msg  .= "</div>";

    return $msg;

}

    

$errors = array();
function check_input($data)
{
   $data = str_replace("_", "", $data);
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   $data = ucfirst($data);

   return $data;
}

function check_length($data, $max, $min) 
    
{
    global $errors;

    if (strlen($data) < $min) {
      $errors['tooSmall'] = "input is too short, minimum is 4 characters(12 max)";
    } elseif(strlen($data) > $max ) {
        $errors['tooLong'] = "input is too long, maximum is 12 characters(4 min)";
    }else {

        return $data;
    }  
}

function checkEmpty($data) {
    global $errors;
    $data = trim($data);
     
    if (isset($data) === true && $data === "") {
        $errors['empty'] = "empty field!";
    } else {
      return $data;
    }
}

function errors_mesg($errors = array()) 
{
    if (!empty($errors)) {
        foreach ($errors as  $value) {
          
          
    echo  " <div class='alert alert-danger' role='alert'>";
    echo "<strong>Failed!</strong>". $value . "<br>";
    echo "</div>";
         
        }
    }
}



?>