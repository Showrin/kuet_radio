<?php

  $query = "SELECT * FROM users WHERE id = '$id'";
  $result = mysqli_query($connection, $query);
  $user = mysqli_fetch_assoc($result);

?>