<?php
session_start();
include_once '../includes/session.php';
include_once '../includes/footer.php';
include_once '../includes/header.php';
include_once '../includes/Func.php';
include_once '../includes/connectiondb.php';


login_check();

?>

  <nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="admin.php">CMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">CMS</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          
        
        <?php    
        
         require_once ('../includes/functions.php');
        
        ?>
        
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admins Tools
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">     
            <li><a class="dropdown-item" href="manageContent.php">Mangae Content</a></li>
              <li><a class="dropdown-item" href="admins_manage.php">Admins Manage</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="log_out.php">Log Out</a></li>
            </ul>
          </li>
         </ul>
      </div>
    </div>
  </div>
</nav>



<div class="container top">


</div>


<div class="container top">
<div class="row d-flex justify-content-center">
    <div class="col-sm-6">

 <?php echo msg(); ?>

 <?php 

 $error = err();
 errors_mesg($error);
 ?>

    </div>
</div>
  <div class="row">
  <div class="card ">
  <div class="card-header bg-secondary">
   welcome <?php echo htmlentities($_SESSION['userName']); ?>
  </div>
  <div class="card-body">

<div class="d-grid gap-2 d-md-block">
<span> <a type="button" class="btn btn-success" href="manageContent.php">Mangae Content</a></span>
<span> <a type="button" class="btn btn-dark" href="admins_manage.php">Admins Manage</a></span>
<span> <a type="button" class="btn btn-danger" href="log_out.php">Log Out</a></span>

</div>


  
  </div>
  </div>
 </div>
</div>

