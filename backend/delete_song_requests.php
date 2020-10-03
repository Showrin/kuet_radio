<?php
  include "./connect_db.php";

  $request_id = $_GET['request_id'];

  $delete_song_request_query = "DELETE FROM song_requests WHERE request_id='$request_id'";
  mysqli_query($connection, $delete_song_request_query);

  header("Location: " . $_SERVER['HTTP_REFERER']);
?>