<?php
session_start();

include_once '../includes/session.php';
include_once '../includes/header.php';
include_once '../includes/footer.php';
include_once '../includes/connectiondb.php';
include_once '../includes/Func.php';
login_check();
if (isset($_GET['admin'])) {
 $admin_id_selected = $_GET['admin'];

} else {

    $admin_id_selected = null;
}

?>
<div class="container top">

<div class="row">
    <div class="col-sm-9">

 <?php echo msg(); ?>

 <?php 

 $error = err();
 errors_mesg($error);
 ?>

    </div>
</div>

<ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
  <li class="nav-item " role="presentation">
    <button class="btn btn-info me-3 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Admins</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="btn btn-success me-3" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Add Admin</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="btn btn-dark me-3" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Edit Admin</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="btn btn-danger me-3" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false">Delete Admin</button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">

  <div class="alert alert-dark text-center" role="alert">
 Admins information
</div>

  <table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">User Name</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>

  <?php

$sql = "SELECT * FROM `admins` WHERE 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {

    ?>

    <tr>
      <td><?php echo $row['user_name'] ?></td>
      <td><?php echo $row['first_name'] ?></td>
      <td><?php echo $row['Last_name'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['date'] ?></td>
    </tr>
    <?php

  }}
  ?>
  </tbody> 
</table>

  </div>


  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">

  <div class="row">
    <div class="col-sm-6">
    <form action="admin_new.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User Name</label>
    <input type="text" class="form-control" name="userName" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">First Name</label>
    <input type="text" class="form-control" name="firstName" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Last Name</label>
    <input type="text" class="form-control" name="lastName" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>

  <button type="submit" name="submit" class="btn btn-dark">Submit</button>
</form>
    </div>
  </div>

  </div>

  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
  <div class="row">
    <div class="col-sm-2 mt-5">
     <?php
$sql1 = "SELECT * FROM `admins` WHERE 1";
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result1) > 0) {
  while ($row1 = mysqli_fetch_assoc($result1)) {

    ?>
    <ul class="navbar-nav justify-content-end flex-grow-1 ms-4">
    <li class="nav-item">
    <a class="btn btn-dark" aria-current="page" href="admins_manage.php?admin=<?php echo htmlentities(mysqli_real_escape_string($conn, $row1['id']));?>"><?php echo mysqli_real_escape_string($conn, $row1['user_name']);?></a>
  </li>
    </ul>
    <br>
     <?php

  }}
    ?>
    </div>
    <div class="col-sm-10 mt-5">
   <?php 

if ($admin_id_selected) {
   $_SESSION['id'] = $admin_id_selected;
   $sql = "SELECT * FROM `admins` WHERE `id` =".$admin_id_selected;
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
     while ($row = mysqli_fetch_assoc($result)) {
   ?>
    <form action="admin_edit.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User Name</label>
    <input type="text" class="form-control" name="userName" value="<?php  echo $row['user_name'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">First Name</label>
    <input type="text" class="form-control" name="firstName" value="<?php  echo $row['first_name'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Last Name</label>
    <input type="text" class="form-control" name="lastName" value="<?php  echo $row['Last_name'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" value="<?php  echo $row['email'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">password</label>
    <input type="password" class="form-control" name="password" value="<?php  echo $row['password'] ?>" id="exampleInputPassword1">
  </div>

  <button type="submit" name="submit" class="btn btn-dark">update</button>
</form>
 
    </div>
    <?php
}}}

?>
  </div>

  </div>

  <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">

  
  <div class="alert alert-dark text-center" role="alert">
   Delete Admins
</div>

  <table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">User Name</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php

$sql = "SELECT * FROM `admins` WHERE 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {

    ?>

    <tr>
      <td><?php echo $row['user_name'] ?></td>
      <td><?php echo $row['first_name'] ?></td>
      <td><?php echo $row['Last_name'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['date'] ?></td>
<td> <a class="btn btn-danger" aria-current="page" href="admin_delete.php?admin=<?php echo htmlentities(mysqli_real_escape_string($conn, $row['id']));?>">Delete</a>
</td>
    </tr>
    <?php

  }}
  ?>
  </tbody> 
</table>



  </div>
</div>


</div>


