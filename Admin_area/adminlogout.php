<?php
  session_start();
  session_unset();
  session_destroy();
  echo "<script>window.open('adminLogin.php','_self');</script>";
?>