<?php
  include "../backend/connect_db.php";

  $query = "SELECT song_index FROM last_played_song_tracker WHERE id = 0";
  $lastPlayedSongIndex = mysqli_query($connection, $query);
  $result = mysqli_fetch_all($lastPlayedSongIndex, MYSQLI_ASSOC);

  echo json_encode($result);
?>