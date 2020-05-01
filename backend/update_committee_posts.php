<?php
  session_start();

  include "./connect_db.php";

  $id = $_POST['id'];
  $designation = $_POST['designation'];
  $authority_Level = $_POST['authorityLevel'];

  $query = "UPDATE users SET designation = '$designation', authority_Level = '$authority_Level' WHERE id = '$id'";
  mysqli_query($connection, $query);

  header("Location:../layouts/member_management.php");
?>