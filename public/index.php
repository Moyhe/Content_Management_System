<?php

include_once '../includes/footer.php';
include_once '../includes/header.php';
include_once '../includes/connectiondb.php';



if (isset($_GET['menu'])) {
    $menu_id_selected = urlencode($_GET['menu']) ;
    $page_id_selected = null;
   } elseif(isset($_GET['page'])) {
     $menu_id_selected = null;
     $page_id_selected = urlencode($_GET['page']) ;
   }else {
   
     $menu_id_selected = null;
     $page_id_selected = null;
   }



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
        
        include_once '../includes/functions.php';
        
        ?>
        
        </ul>
      </div>
    </div>
  </div>
</nav>



<div class="container top">

<div class="row">

<div class="col">

<div class="card">
 

<?php 

if ($menu_id_selected) {
 
  $query = "SELECT * FROM `website_navbar` WHERE `visible`=1 AND  id=".$menu_id_selected;
  $result = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($result) > 0) {
     while ($row = mysqli_fetch_assoc($result)) {
      if ( htmlentities($row['item_name']) == 'Home') {
        ?>
        

            <div class="card" >
            <div class="card-header bg-info">
        Home
      </div>

  <img src="../public/images/php-tutorials.png" style="height: 500px;" class="card-img-top" alt="No Photo">
  <div class="card-body">
    <p class="card-text">
      
    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
     Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
     It has survived not only five centuries,
     but also the leap into electronic typesetting, 
    remaining essentially unchanged. 
    It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
     and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum

    </p>
  </div>
</div>
        <?php
      }elseif(htmlentities($row['item_name']) == 'About') {
       
        ?>
      <div class="card" >
            <div class="card-header bg-info">
        About
      </div>

  <img src="../public/images/PHP.jpg" style="height: 500px;" class="card-img-top" alt="No Photo">
  <div class="card-body">
    <p class="card-text">
      
    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
     Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
     It has survived not only five centuries,
     but also the leap into electronic typesetting, 
    remaining essentially unchanged. 
    It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
     and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum

    </p>
  </div>
</div>

<?php
      }

      
  }
}
}elseif($page_id_selected) {
  $query1 = "SELECT * FROM `pages` WHERE `visible`=1 AND   `id`=" . $page_id_selected;
  $result1 = mysqli_query($conn, $query1);
  
  if (mysqli_num_rows($result1) > 0) {
    ?>   <div class="card-header bg-secondary"> <?php
    while ($row1 = mysqli_fetch_assoc($result1)) {

      echo htmlentities($row1['page_name']);

  ?>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p> <?php echo nl2br($row1['content']); ?> </p>
      <?php 
          }
        }
    }
      ?>
    </blockquote>
  </div>
</div>
</div>

</div>

</div>


