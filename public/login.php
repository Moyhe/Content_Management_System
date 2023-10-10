<?php
session_start();

include_once '../includes/session.php';
include_once '../includes/headers.php';
include_once '../includes/footer.php';
include_once '../includes/connectiondb.php';
include_once '../includes/Func.php';


?>


<div class="container d-flex justify-content-center top">

<div class="row">
    <div class="col-sm-12">

 <?php echo msg(); ?>

 <?php 

 $error = err();
 errors_mesg($error);
 ?>

    </div>
</div>
</div>


<div class="content">

    <div class="container">
  
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="../public//static//images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Login</h3>
              <p class="mb-4">welcome to our website</p>
            </div>
            <form action="login_submit.php" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" name="userName" class="form-control" id="username">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">              
              </div>
               <br>

              <input type="submit" value="Log In" name="submit" class="btn text-white btn-block btn-dark">
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
