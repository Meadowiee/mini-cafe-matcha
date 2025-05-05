<?php 
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'db_matcha-cafe';
    
    $connect = mysqli_connect($server, $username, $password, $database);
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    session_start();
?>