<?php 
    include "./connect_db.php";

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birth_date = $_POST['birth_date'];
    $contact = $_POST['contact'];
    $dept_name = $_POST['dept_name'];
    $batch_no = $_POST['batch_no'];
    $roll = $_POST['roll'];
    $email = $_POST['email'];

    // Encryption
    $password = $_POST['password'];
    $password = md5($password);
    $password = sha1($password);
    
    $query = "INSERT INTO users VALUES ('', '', '$first_name', '$last_name', '$birth_date', '$contact', '$dept_name', '$batch_no', '$roll', '$email', '$password', 'member', 'member', '', '', '0', '0')";
    mysqli_query($connection, $query);

    $id_search_query = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $id_search_query);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
    
    // --------------- Uploading Image File to destination folder ------------
    $image_name = $_FILES['dp']['name'];
    $extention = substr(strrchr(basename($image_name),'.'),1);
    $dp_name = $user_id . "." . $extention ;
    $target = "../user_info/dp/" . $dp_name; // Renaming the image with user_id
    move_uploaded_file($_FILES['dp']['tmp_name'], $target);

    $update_dp_name_query = "UPDATE users SET dp_name = '$dp_name' WHERE id = '$user_id'";
    mysqli_query($connection, $update_dp_name_query);
    
    session_start();
    $_SESSION['id'] = $id;
    header("Location:../layouts/profile.php");
?>