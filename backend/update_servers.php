<?php
    include "../backend/is_logged_in_check.php";
    include "./connect_db.php";

    $server1_ip = $_GET['server1_ip'];
    $server1_port = $_GET['server1_port'];
    $server2_ip = $_GET['server2_ip'];
    $server2_port = $_GET['server2_port'];

    echo $server1_ip . '<br />';
    echo $server1_port . '<br />';
    echo $server2_ip . '<br />';
    echo $server1_port . '<br />';
    
    $query = "UPDATE servers SET ip='$server1_ip', port='$server1_port' where id=1";
    mysqli_query($connection, $query);
    
    $query = "UPDATE servers SET ip='$server2_ip', port='$server2_port' where id=2";
    mysqli_query($connection, $query);

    header("Location:../layouts/server_settings.php");
?>