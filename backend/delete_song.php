<?php
    include "./connect_db.php";

    $id = $_GET['id'];

    $get_url_query = "SELECT * FROM songs WHERE id = '$id'";
    $result = mysqli_query($connection, $get_url_query);
    $path = mysqli_fetch_assoc($result);

    echo $path['song_url'];

    unlink("../songs/" . $path['song_url']); //delete file
    
    $query = "DELETE FROM songs WHERE id = '$id'";
    mysqli_query($connection, $query);

    header("Location:../layouts/playlist_settings.php");
?>