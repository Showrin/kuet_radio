<?php

  $query = "SELECT * FROM users INNER JOIN committee_posts ON users.designation = committee_posts.post_name WHERE users.isInWorkingCommittee = '1' ORDER BY committee_posts.post_priority, users.start_year, users.first_name";
  $team_members = mysqli_query($connection, $query);

?>