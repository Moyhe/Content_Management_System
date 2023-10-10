<?php
if (!isset($_SESSION))
{  
   session_start();
}


function msg() 
{
    if (isset($_SESSION['msg'])) {
        $mesg = $_SESSION['msg']; 
        $_SESSION['msg'] = null;
        return $mesg;
    }
    
   
}

function err() 
{
    if (isset($_SESSION['errors'])) {
        $message = $_SESSION['errors']; 
        $_SESSION['errors'] = null;
        return $message;
    }
    
   
}



?>