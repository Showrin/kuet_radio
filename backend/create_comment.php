<?php
  include "./connect_db.php";

  $commentator_name = mysqli_real_escape_string($connection, $_POST['commentator_name']);
  $commentator_batch = mysqli_real_escape_string($connection, $_POST['commentator_batch']);
  $comment = mysqli_real_escape_string($connection, $_POST['comment']);
  $comment_timestamp = time() + (4 * 60 * 60);
  $comment_timestamp = date('e');

  echo $comment_timestamp . '<br />';

  $comment_insert_query = "INSERT INTO comments VALUES ('', '$commentator_name', '$commentator_batch', '$comment', '$comment_timestamp')";
  mysqli_query($connection, $comment_insert_query);

  // header("Location: " . $_SERVER['HTTP_REFERER']);
?>