<?php
    session_start();
    
    include "../backend/is_logged_in_check.php";
    include "./connect_db.php";

    $id_to_approve = $_GET['id'];
    
    $query = "UPDATE users SET isApproved = '1' WHERE id = '$id_to_approve'";
    mysqli_query($connection, $query);

    header("Location:../layouts/account_requests.php");
?>