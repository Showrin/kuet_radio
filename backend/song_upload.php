<?php
    include "./connect_db.php";

    $song_name = $_POST['song_name'];
    $singer_name = $_POST['singer_name'];
    $duration = $_POST['duration'];
    
    $query = "INSERT INTO songs VALUES ('', '', '$song_name', '$singer_name', '$duration', '0')";
    mysqli_query($connection, $query);

    $id_search_query = "SELECT id FROM songs WHERE name = '$song_name' AND singer = '$singer_name'";
    $result = mysqli_query($connection, $id_search_query);
    $row = mysqli_fetch_assoc($result);
    $song_id = $row['id'];
    
    // --------------- Uploading song File to destination folder ------------
    if($_FILES['song']['name'] !== '') {
        $song_name = $_FILES['song']['name'];
        $extention = substr(strrchr(basename($song_name),'.'),1);
        $song_url = $song_id . "." . $extention ;
        $target = "../songs/" . $song_url; // Renaming the song with id
        move_uploaded_file($_FILES['song']['tmp_name'], $target);

        $update_song_name_query = "UPDATE songs SET song_url = '$song_url' WHERE id = '$song_id'";
        mysqli_query($connection, $update_song_name_query);
    }

    header("Location:../layouts/playlist_settings.php");
?>