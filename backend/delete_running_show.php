<?php
  include "../backend/is_logged_in_check.php";

  $id = $_SESSION['id'];

  include "./connect_db.php";
  include "../backend/find_current_show.php";

  $show_delete_query = "DELETE FROM running_show";
  $guests_delete_query = "DELETE FROM guests_of_running_show";
  $rjs_delete_query = "DELETE FROM rjs_of_running_show";

  mysqli_query($connection, $show_delete_query);
  mysqli_query($connection, $guests_delete_query);
  mysqli_query($connection, $rjs_delete_query);
  
  include "../backend/send_mail_after_starting_show.php";
  
  header("Location: " . $_SERVER['HTTP_REFERER']);
?>