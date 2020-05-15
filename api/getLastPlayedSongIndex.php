<?php
  include "../backend/connect_db.php";

  $lastPlayedSongIndex = $_REQUEST['lastPlayedSongIndex'];

  $query = "UPDATE last_played_song_tracker SET song_index = '$lastPlayedSongIndex' WHERE id = 0";
  mysqli_query($connection, $query);

  echo json_encode("true");
?>