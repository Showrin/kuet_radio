<?php

  $query = "SELECT * FROM comments ORDER BY comment_timestamp DESC";
  $comments = mysqli_query($connection, $query);

?>