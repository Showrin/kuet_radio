<?php
  include "../backend/connect_db.php";

  $query = "SELECT * FROM songs ORDER BY id DESC";
  $songs = mysqli_query($connection, $query);
  $result = mysqli_fetch_all($songs, MYSQLI_ASSOC);

  echo json_encode($result);
?>