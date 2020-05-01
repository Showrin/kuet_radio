<?php

  $query = "SELECT * FROM users WHERE isApproved = '1'";
  $result = mysqli_query($connection, $query);

?>