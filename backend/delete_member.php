<?php
    session_start();
    
    include "../backend/is_logged_in_check.php";
    include "./connect_db.php";

    $id_to_approve = $_GET['id'];
    
    $query = "DELETE FROM users WHERE id = '$id_to_approve'";
    mysqli_query($connection, $query);

    header("Location:../layouts/member_management.php");
?>