<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database_name = 'kuet_radio_database';

    $connection = mysqli_connect($host, $user, $password, $database_name);

    if(!$connection) {
        echo "Database not found";
    }
?>