<?php
    include "../backend/is_logged_in_check.php";

    $id = $_SESSION['id'];

    include "./connect_db.php";

    $show_name = $_POST['show_name'];
    $rjs = $_POST['rjs'];
    $guest_amount = $_POST['guest_amount'];

    echo $show_name . '<br />';
    echo $guest_amount . '<br />';
    
    foreach($rjs as $rj) {
      echo $rj . '<br />';
    }
    
    for($i = 1; $i <= $guest_amount; $i++) {
      echo $_POST['guest' . $i . '_name'] . '<br />';
    }
  
    $show_delete_query = "DELETE FROM running_show";
    $guests_delete_query = "DELETE FROM guests_of_running_show";
    $rjs_delete_query = "DELETE FROM rjs_of_running_show";

    mysqli_query($connection, $show_delete_query);
    mysqli_query($connection, $guests_delete_query);
    mysqli_query($connection, $rjs_delete_query);


    $show_insert_query = "INSERT INTO running_show VALUES (1, '$show_name', '$guest_amount')";
    mysqli_query($connection, $show_insert_query);
    
    foreach($rjs as $rj_id) {
      $rjs_insert_query = "INSERT INTO rjs_of_running_show VALUES ('$rj_id')";
      mysqli_query($connection, $rjs_insert_query);
    }
    
    for($i = 1; $i <= $guest_amount; $i++) {
      $guest_name = $_POST['guest' . $i . '_name'];
      $guest_dept = $_POST['guest' . $i . '_dept'];
      $guest_batch = $_POST['guest' . $i . '_batch'];
      $guest_description = $_POST['guest' . $i . '_description'];
      $guest_dp = 'guest' . $i . '_dp';
      
      echo $guest_name . '<br />';
      echo $guest_dept . '<br />';
      echo $guest_batch . '<br />';
      echo $guest_description . '<br />';
      

      $guests_insert_query = "INSERT INTO guests_of_running_show VALUES ('$i', '$guest_name', '$guest_dept', '$guest_batch', '$guest_description', '')";
      mysqli_query($connection, $guests_insert_query);
    
      // --------------- Uploading Image File to destination folder ------------
      if($_FILES[$guest_dp]['name'] !== '') {
        $image_name = $_FILES[$guest_dp]['name'];
        $extention = substr(strrchr(basename($image_name),'.'),1);
        $dp_name = "guest" . $i . "." . $extention;
        $target = "../guest_info/dp/" . $dp_name; // Renaming the image with id
        move_uploaded_file($_FILES[$guest_dp]['tmp_name'], $target);

        $update_guest_dp_name_query = "UPDATE guests_of_running_show SET dp_name = '$dp_name' WHERE id = '$i'";
        mysqli_query($connection, $update_guest_dp_name_query);
      }
    }

    header("Location:../layouts/start_a_show.php");
?>