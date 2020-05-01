<?php

  $query = "SELECT * FROM committee_posts WHERE isChecked='1' ORDER BY post_name";
  $checked_committee_posts_result = mysqli_query($connection, $query);

?>