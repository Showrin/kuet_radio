<?php

  $query = "SELECT * FROM users WHERE isInWorkingCommittee = '1'";
  $team_members = mysqli_query($connection, $query);

?>