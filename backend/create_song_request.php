<?php
    include "../backend/is_logged_in_check.php";

    $id = $_SESSION['id'];

    include "./connect_db.php";

    $song_name = $_POST['song_name'];
    $singer_name = $_POST['singer_name'];
    $song_url = $_POST['song_url'];

    $song_request_insert_query = "INSERT INTO song_requests VALUES ('', '$song_name', '$singer_name', '$song_url')";
    mysqli_query($connection, $song_request_insert_query);

    header("Location: " . $_SERVER['HTTP_REFERER']);
?>