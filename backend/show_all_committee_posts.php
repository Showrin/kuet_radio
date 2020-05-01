<?php

  $query = "SELECT * FROM committee_posts ORDER BY post_name";
  $committee_posts_result = mysqli_query($connection, $query);

?>