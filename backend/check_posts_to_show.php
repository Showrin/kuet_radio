<?php
  include './connect_db.php';

  $checked_posts = $_POST['committee_posts'];

  $query = "UPDATE committee_posts SET isChecked = '0'";
  $committee_posts_result = mysqli_query($connection, $query);

  foreach($checked_posts as $post_id){
    $query = "UPDATE committee_posts SET isChecked = '1' where post_id = '$post_id'";
    $committee_posts_result = mysqli_query($connection, $query);
  }
  header("Location:../layouts/committee_posts_settings.php");

?>