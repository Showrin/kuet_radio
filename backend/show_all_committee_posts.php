<?php

  $query = "SELECT * FROM committee_posts ORDER BY isChecked DESC, post_priority";
  $committee_posts_result = mysqli_query($connection, $query);

?>