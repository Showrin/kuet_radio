<?php
  include './connect_db.php';

  $post_name = $_POST['new_post'];
  $post_priority = $_POST['post_priority'];

  $query = "INSERT INTO committee_posts VALUES ('', '$post_name', '$post_priority', '1')";
  $committee_posts_result = mysqli_query($connection, $query);

  header("Location: " . $_SERVER['HTTP_REFERER']);
?>