<?php
  include "../backend/connect_db.php";

  $query = "UPDATE last_played_song_tracker SET song_index = '$lastPlayedSongIndex' WHERE id = 0";
  $songs = mysqli_query($connection, $query);
  $result = mysqli_fetch_all($songs, MYSQLI_ASSOC);

  echo json_encode($result);
?>