<?php

  $query = "SELECT * FROM users ORDER BY isInWorkingCommittee, start_year";
  $team_members = mysqli_query($connection, $query);

?>