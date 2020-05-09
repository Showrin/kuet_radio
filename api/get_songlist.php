<?php
  include "../backend/connect_db.php";
  include "../backend/find_all_songs.php";

  $result = mysqli_fetch_all($songs, MYSQLI_ASSOC);

  echo json_encode($result);

  // while($row = mysqli_fetch_assoc($songs)) {
  //   echo json_encode($row);
  // }
?>