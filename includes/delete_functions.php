<?php

function showPages($conn) {

$query = "SELECT * FROM `website_navbar` WHERE  1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
   
   ?>   
   <li class="nav-item">
     <a class="nav-link" aria-current="page" href="delete_menu.php?menu=<?php echo mysqli_real_escape_string($conn, $row['id']);?>"> <h4><?php echo mysqli_real_escape_string($conn, $row['item_name']);?></h4></a>
  </li>

   <?php

$query1 = "SELECT * FROM `pages` WHERE  1 AND `pages`.`item_name_id`=".$row['id'];
$result1 = mysqli_query($conn, $query1);
   
if (mysqli_num_rows($result1) > 0) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
       ?>
    <ul class="navbar-nav justify-content-end flex-grow-1 ms-4">
    <li class="nav-item">
    <a class="nav-link" aria-current="page" href="delete_menu.php?page=<?php echo mysqli_real_escape_string($conn, $row1['id']);?>"><?php echo mysqli_real_escape_string($conn, $row1['page_name']);?></a>
  </li>
    </ul>

     <?php
    }
}
   }

} else {
   echo "No Records";
}

mysqli_free_result($result);

}

showPages($conn);



?>
