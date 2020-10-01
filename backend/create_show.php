<?php
    include "../backend/is_logged_in_check.php";

    $id = $_SESSION['id'];

    include "./connect_db.php";

    $show_name = $_POST['show_name'];
    $show_day = $_POST['show_day'];
    $show_time = $_POST['show_time'];
    $rjs = $_POST['rjs'];

    $show_insert_query = "INSERT INTO scheduled_shows VALUES ('', '$show_name', '$show_day', '$show_time')";
    mysqli_query($connection, $show_insert_query);

    $find_inserted_show_query = "SELECT show_id FROM scheduled_shows WHERE show_name='$show_name' AND show_day='$show_day' AND show_time='$show_time'";
    $shows = mysqli_query($connection, $find_inserted_show_query);
    $show_id = mysqli_fetch_assoc($shows)['show_id'];

    foreach($rjs as $rj_id) {
      $rjs_insert_query = "INSERT INTO scheduled_shows_rjs VALUES ('', '$show_id', '$rj_id')";
      mysqli_query($connection, $rjs_insert_query);
    }

    header("Location:../layouts/schedule_settings.php");
?>