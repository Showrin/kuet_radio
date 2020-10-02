<?php
  include "./connect_db.php";

  $id = $_GET['show_id'];

  echo $id;

  $delete_scheduled_show = "DELETE FROM scheduled_shows WHERE show_id='$id'";
  mysqli_query($connection, $delete_scheduled_show);
  
  $delete_scheduled_show_rjs = "DELETE FROM scheduled_shows_rjs WHERE show_id='$id'";
  mysqli_query($connection, $delete_scheduled_show_rjs);

  header("Location:../layouts/schedule_settings.php");
?>