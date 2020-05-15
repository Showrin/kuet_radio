<?php

  $query = "SELECT * FROM users WHERE isApproved = '1' ORDER BY isInWorkingCommittee, start_year";
  $team_members = mysqli_query($connection, $query);

?>