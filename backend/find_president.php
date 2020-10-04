<?php

  $query = "SELECT * FROM users WHERE designation = 'President' AND isInWorkingCommittee = 1";
  $result = mysqli_query($connection, $query);
  $president = mysqli_fetch_assoc($result);

?>