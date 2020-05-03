<?php

  $query = "SELECT * FROM users ORDER BY isInWorkingCommittee";
  $team_members = mysqli_query($connection, $query);

?>