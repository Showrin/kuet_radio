<?php
  include './connect_db.php';
  
  $email = $_GET['email'];

  $is_user_existing_check_query = "SELECT * FROM users WHERE email='$email'";
  $existing_user = mysqli_query($connection, $is_user_existing_check_query);

  if(mysqli_num_rows($existing_user)) {
    echo "true";
  } else {
    echo "false";
  }
?>