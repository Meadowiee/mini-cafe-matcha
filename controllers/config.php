<?php 
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'mini-matcha-cafe';
    
    $connect = mysqli_connect($server, $username, $password, $database);
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if(session_status() === PHP_SESSION_NONE) session_start();
?>