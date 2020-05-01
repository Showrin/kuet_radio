<?php
  session_start();
  
  if(!isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    header("Location:../layouts/sign_in_or_up.php");
  }
?>