<?php
  session_start();
  session_destroy();
  header("Location:../layouts/sign_in_or_up.php");
?>