<?php
  include './connect_db.php';

  $email = $_GET['email'];

  $password = $_GET['password'];
  $password = md5($password);
  $password = sha1($password);

  $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($connection, $query);

  if(mysqli_num_rows($result)) {
    $user = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['id'] = $user['id'];
    echo "success";

  } else {
    echo "error";
  }
?>