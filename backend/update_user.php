<?php
    session_start();
    
    include "../backend/is_logged_in_check.php";

    $id = $_SESSION['id'];

    include "./connect_db.php";

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birth_date = $_POST['birth_date'];
    $contact = $_POST['contact'];
    $dept_name = $_POST['dept_name'];
    $batch_no = $_POST['batch_no'];
    $roll = $_POST['roll'];
    
    $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', birth_date = '$birth_date', contact = '$contact', dept_name = '$dept_name', batch_no = '$batch_no', roll = '$roll' WHERE id = '$id'";
    mysqli_query($connection, $query);
    
    // --------------- Uploading Image File to destination folder ------------
    if($_FILES['dp']['name'] !== '') {
        $image_name = $_FILES['dp']['name'];
        $extention = substr(strrchr(basename($image_name),'.'),1);
        $dp_name = $id . "." . $extention ;
        $target = "../user_info/dp/" . $dp_name; // Renaming the image with id
        move_uploaded_file($_FILES['dp']['tmp_name'], $target);

        $update_dp_name_query = "UPDATE users SET dp_name = '$dp_name' WHERE id = '$id'";
        mysqli_query($connection, $update_dp_name_query);
    }

    header("Location:../layouts/profile.php");
?>