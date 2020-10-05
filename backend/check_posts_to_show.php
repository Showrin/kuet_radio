<?php
  include './connect_db.php';

  $checked_posts = $_POST['committee_posts'];

  $query = "UPDATE committee_posts SET isChecked = '0'";
  mysqli_query($connection, $query);

  foreach($checked_posts as $post_id){
    $priority_of_post = $_POST['priority_of_post_' . $post_id];
    echo $priority_of_post . '<br />';
    $query = "UPDATE committee_posts SET isChecked = '1', post_priority = '$priority_of_post' where post_id = '$post_id'";
    mysqli_query($connection, $query);
  }

  header("Location: " . $_SERVER['HTTP_REFERER']);
?>