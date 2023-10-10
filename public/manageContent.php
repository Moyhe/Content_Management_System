<?php
session_start();

include_once '../includes/session.php';
include_once '../includes/header.php';
include_once '../includes/footer.php';
include_once '../includes/connectiondb.php';
include_once '../includes/Func.php';
login_check();
if (isset($_GET['menu'])) {
 $menu_id_selected = $_GET['menu'];
 $page_id_selected = null;
} elseif(isset($_GET['page'])) {
  $menu_id_selected = null;
  $page_id_selected = $_GET['page'];
}else {

  $menu_id_selected = null;
  $page_id_selected = null;
}

?>

<!--NavBar -->

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
        include_once '../includes/menu_functions.php';
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admins Tools
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
            
            <li><a class="dropdown-item" href="manageContent.php">Mangae Content</a></li>
              <li><a class="dropdown-item" href="admin.php">Admins</a></li>
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

<!--Accordion -->


<div class="container top">
<br>
  <div class="row">
  <div class="col-sm-3">
<div class="accordion" id="accordionExample">

<?php
$query = "SELECT * FROM `website_navbar` WHERE 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
   
?>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $row['id'];?>" aria-expanded="false" aria-controls="collapseOne">
      <ul class="navbar-nav justify-content-end  flex-grow-">
  <li class="nav-item">
  <a class="nav-link" aria-current="page" href="manageContent.php?menu=<?php echo mysqli_real_escape_string($conn, $row['id']);?>"><?php echo mysqli_real_escape_string($conn, $row['item_name']);?></a>
</li>
  </ul>
      </button>
    </h2>
    <?php
$query1 = "SELECT * FROM `pages` WHERE  1 AND `pages`.`item_name_id`=".$row['id'];
$result1 = mysqli_query($conn, $query1);

if (mysqli_num_rows($result1) > 0) {
  while ($row1 = mysqli_fetch_assoc($result1)) {

?>

<div id="collapseOne<?php echo $row['id'];?>" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">

      <ul class="navbar-nav justify-content-start flex-grow-1">
    <li class="nav-item">
    <a class="nav-link" aria-current="page" href="manageContent.php?page=<?php echo mysqli_real_escape_string($conn, $row1['id']);?>"><?php echo mysqli_real_escape_string($conn, $row1['page_name']);?></a>
  </li>
    </ul> 
     
  </div>
    </div>
<?php
  }
}
?>
    </div>
 <?php
   
  }
} else {
   echo "No Records";
}

mysqli_free_result($result);
?>
</div>

  </div>

  <div class="col-sm-9">

  <div class="row">
  
    <div class="col-sm-12">
  
 <?php echo msg(); ?>


    </div>
</div>

  <div class="card">
  <div class="card-header bg-secondary">

<?php 

if ($menu_id_selected) {
 
  $query = "SELECT * FROM `website_navbar` WHERE id=".$menu_id_selected;
  $result = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($result) > 0) {
     while ($row = mysqli_fetch_assoc($result)) {

      echo $row['item_name'];
  }
}
}elseif($page_id_selected) {
  $query1 = "SELECT * FROM `pages` WHERE  `id`=" . $page_id_selected;
  $result1 = mysqli_query($conn, $query1);
  
  if (mysqli_num_rows($result1) > 0) {
    while ($row1 = mysqli_fetch_assoc($result1)) {

      echo $row1['page_name'];

  ?>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p> <?php echo $row1['content'];  ?> </p>
      <?php 
          }
        }
    }
      ?>
    </blockquote>
  </div>
</div>

<div class="container mt-3">
  <div class="row">
  <div class="card ">
  <div class="card-header bg-secondary">
   Menu And Page Tools
  </div>
  <div class="card-body">

<div class="d-grid gap-2 d-md-block">
<span> <a type="button" class="btn btn-success" href="create_menu.php">Create New Menu</a></span>
<span> <a type="button" class="btn btn-dark" href="edit_menu.php">Edit Menu</a></span>
<span> <a type="button" class="btn btn-danger" href="delete_menu.php">Delete Menu</a></span>
<br><br>
<span> <a type="button" class="btn btn-success" href="create_page.php">Create New Page</a></span>
<span> <a type="button" class="btn btn-dark" href="edit_page.php">Edit Page</a></span>
<span> <a type="button" class="btn btn-danger" href="delete_page.php">Delete Page</a></span>
<span> <a type="button" class="btn btn-dark" href="admin.php">Admin page</a></span>

</div>


  
  </div>
  </div>
 </div>
</div>


</div>

  </div>
</div>
