<?php
  $con = mysqli_connect("localhost", "root", "", "tristarcare");

  if ($con)
  {
    // echo "Done";
  }
  else
  {
    echo "Error connecting to Database";
  }
?>