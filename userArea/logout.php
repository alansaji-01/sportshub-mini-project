<?php
  session_start();
  session_unset();
  session_destroy();
  #echo "<script>window.open('../mhome.php','_self');</script>";
  echo "<script>window.open('../mhome.php','_self');</script>";
?>