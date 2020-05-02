<?php
  session_start();

  include "./connect_db.php";

  $id = $_POST['id'];
  $designation = $_POST['designation'];
  $authority_Level = $_POST['authorityLevel'];
  $isInWorkingCommittee = $_POST['isInWorkingCommittee'];
  $start_year = $_POST['start_year'];
  $end_year = $_POST['end_year'];

  $query = "UPDATE users SET designation = '$designation', authority_Level = '$authority_Level', isInWorkingCommittee = '$isInWorkingCommittee', start_year = '$start_year', end_year = '$end_year' WHERE id = '$id'";
  mysqli_query($connection, $query);

  header("Location:../layouts/member_management.php");
?>