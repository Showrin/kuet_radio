<?php
  include "../backend/is_logged_in_check.php";

  $id = $_SESSION['id'];

  include "./connect_db.php";

  $commentator_name = $_POST['commentator_name'];
  $commentator_batch = $_POST['commentator_batch'];
  $comment = $_POST['comment'];
  $comment_timestamp = time() + (4 * 60 * 60);

  $comment_insert_query = "INSERT INTO comments VALUES ('', '$commentator_name', '$commentator_batch', '$comment', '$comment_timestamp')";
  mysqli_query($connection, $comment_insert_query);

  header("Location: " . $_SERVER['HTTP_REFERER']);
?>