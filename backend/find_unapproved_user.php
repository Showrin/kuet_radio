<?php

  $query = "SELECT * FROM users WHERE isApproved = '0'";
  $result = mysqli_query($connection, $query);

?>