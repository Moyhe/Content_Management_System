<?php

define("HOSTNAME", "localhost");
define("USERNAME", "Geni");
define("PASSWORD", "kenkanekiTouka123");
define("DATA_BASE", "CMS");

$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATA_BASE);
if ($conn) {
  // echo "Connected";
}else {

    die("Connection Failed " . mysqli_connect_errno() . "Error No " . mysqli_connect_errno());
}

?>