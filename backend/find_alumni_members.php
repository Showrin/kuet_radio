<?php

  $query = "SELECT * FROM users INNER JOIN committee_posts ON users.designation = committee_posts.post_name WHERE users.isApproved = '1' AND users.isInWorkingCommittee = '0' ORDER BY users.start_year, committee_posts.post_priority, users.first_name";
  $team_members = mysqli_query($connection, $query);

?>