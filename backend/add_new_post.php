<?php
  include './connect_db.php';

  $post_name = $_POST['new_post'];

  $query = "INSERT INTO committee_posts VALUES ('', '$post_name', '1')";
  $committee_posts_result = mysqli_query($connection, $query);
  header("Location:../layouts/committee_posts_settings.php");

?>